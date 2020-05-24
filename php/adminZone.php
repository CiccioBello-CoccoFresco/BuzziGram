<?php
    include_once '../php/Utils/session_control.php';
    if(!checkSession()) echo 'redirect';
    else{
        if(isset($_GET['as'])){
            include_once './Utils/dbConnection.php';
            $as = $_GET["as"];
            $sql = "Select id from classe where anno_scolastico = '".$as."'";
            $conn = openConn();
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(isset($row['id'])) echo '1';
            else echo '0';
        }
    }
?>