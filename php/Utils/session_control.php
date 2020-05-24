<?php

    include_once "dbConnection.php";

    $TOKEN_DURATION = 60*10;

    function checkSession(){
        session_start();

        if(!empty($_COOKIE['PHPSESSID'])) {
            try{
                if(!isset($_SESSION['time'])){
                    return false;
                } else if($_SESSION['time'] + $GLOBALS['TOKEN_DURATION'] < time()) {
                    regenerateToken();
                    return true;
                } else {
                    $conn = openConn();
                    $stmt = $conn->prepare('Select token from utente where token = ?');
                    $token = $_COOKIE['PHPSESSID'];
                    $stmt->bind_param("s", $token);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    closeConn($conn);
                    if($result->num_rows != 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['token'] === $token) {
                            return true;
                        }
                    }
                } else return false;
                }
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
            // Header('Location: ../');
        } else {
            // session_start();
            echo 'Cookie Scaduto';
            //var_dump($_SESSION);
            return false;
        }
    }

    function registerSession() {
        session_start();

        $token = $_COOKIE['PHPSESSID'];
        try{
            $conn = openConn();
            $stmt = $conn->prepare('Update utente set token = ? where email = ? and password = ?');
            $psw = md5($_POST['psw']);
            $stmt->bind_param("sss", $token, $_POST['email'], $psw);
            $stmt->execute();
            closeConn($conn);
        } catch(PDOException $e){
			echo "Error: " . $e->getMessage();
        }
        //if(!isset($_SESSION['nome'])){
            $conn = openConn();
            $stmt = $conn->prepare('Select s.nome, s.cognome, u.id from studente s join utente u on u.id = s.matricola where u.token = ?');
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $_SESSION['user'] = $row['id'];
            $_SESSION['nome'] = "".$row['nome'][0].". ".$row['cognome']; 
            closeConn($conn);
        //}
        $_SESSION['token'] = $token;
        $_SESSION['time'] = time();
        //$_SESSION['ricordami'] = $remeberMe;
        //var_dump($_SESSION);
        // setcookie('PHPSESSID', $token, time()+60*60*24*30, "/", "", false, true);
    }

    function regenerateToken(){
        //session_start();
        $old_token = $_COOKIE['PHPSESSID'];
        session_regenerate_id();
        //var_dump($_SESSION);
        try{
            $token = session_id();
            $conn = openConn();
            $stmt = $conn->prepare('Update utente set token = ? where email = ?');
            $stmt->bind_param("ss", $token, $_SESSION['user']);
            $stmt->execute();
            closeConn($conn);
            //setcookie('PHPSESSID', $token, time()+60*60*24*30, "/", "", true, true);
        } catch(PDOException $e){
			echo "Error: " . $e->getMessage();
        }
        $_SESSION['token'] = $token;
        $_SESSION['time'] = time();
        
    }

    function deconnect(){
        session_start();
        try{
            $conn = openConn();
            $stmt = $conn->prepare('Update utente set token = NULL where token = ?');
            $stmt->bind_param("s", $_SESSION['token']);
            $stmt->execute();
            closeConn($conn);
        } catch(PDOException $e){
			echo "Error: " . $e->getMessage();
        }
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
    }
?>