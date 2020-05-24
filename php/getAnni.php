<?php
    include_once 'utils/dbConnection.php';
    include_once '../php/Utils/session_control.php';
    $array = array();
    if(!checkSession()) array_push($array,"redirect");
    else{
        $sql = 'SELECT DISTINCT anno_scolastico FROM classe order by anno_scolastico desc';
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        // output data of each row
        if($result->num_rows === 0){
            array_push($array, "norows");
        }else{
            while($row = $result->fetch_assoc()) {
                array_push($array,$row);
            }
        }
    }
    echo json_encode($array);
?>