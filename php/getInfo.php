<?php
    include_once 'utils/dbConnection.php';
    include_once '../php/Utils/session_control.php';
    $array = array();
    if(!checkSession()) array_push($array,"redirect");
    else{
        //array_push($array,'USER:'.$_SESSION['user'].'NOME:'.$_SESSION['nome']);
        //Query per email, nome, cognome
        $studente = $_SESSION['user'];
        //var_dump($studente);
        $sql = 'SELECT email, nome, cognome FROM utente u join studente s on u.id = s.matricola WHERE matricola ='. $studente;
        $conn = openConn();
        $result = $conn->query($sql);
        
        //var_dump($result);
        if($result->num_rows != 0){
            $row = $result->fetch_assoc();
            array_push($array,$row['email']);
            array_push($array,$row['nome']);
            array_push($array,$row['cognome']);
            if($studente != 1) array_push($array,"foto");
            else array_push($array,"admin");
        }else array_push($array,"norows");
        closeConn($conn);
    }
    echo json_encode($array);

?>