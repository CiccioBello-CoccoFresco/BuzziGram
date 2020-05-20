<?php

    include_once "../utils/dbConnection.php";

    $TOKEN_DURATION = 60*0.1;

    function checkSession(){
        session_start();

        if(!empty($_COOKIE['PHPSESSID'])) {
            try{
                if($_SESSION['time'] + $GLOBALS['TOKEN_DURATION'] < time()) {
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
            var_dump($_SESSION);
            return false;
        }
    }

    function registerSession($remeberMe) {
        session_start();

        $token = $_COOKIE['PHPSESSID'];
        try{
            $conn = openConn();
            $stmt = $conn->prepare('Update utente set token = ? where email = ? and password = ?');
            $psw = md5($_POST['password']);
            $stmt->bind_param("sss", $token, $_POST['email'], $psw);
            $stmt->execute();
            echo "OLLU";
            closeConn($conn);
        } catch(PDOException $e){
			echo "Error: " . $e->getMessage();
        }
        if($remeberMe){
            $params = session_get_cookie_params();
            setcookie(session_name(), $_COOKIE[session_name()], time() + 60*60*24*30, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
        if(!isset($_SESSION['nome'])){
            $conn = openConn();
            $stmt = $conn->prepare('Select m.nome, m.cognome from medico m join utente u on m.cf=u.cf where u.token = ?');
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $_SESSION['nome'] = "".$row['nome'][0].". ".$row['cognome'];
            echo $_SESSION['nome']; 
            closeConn($conn);
        }
        $_SESSION['token'] = $token;
        $_SESSION['time'] = time();
        $_SESSION['user'] = $_POST['email'];
        $_SESSION['ricordami'] = $remeberMe;
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
        
        unset($_SESSION);
    }
?>