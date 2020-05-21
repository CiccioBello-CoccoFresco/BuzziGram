<?php
    include_once 'utils/dbConnection.php';
    if(isset($_GET['classe'])){
        $classe = $_GET["classe"];
        
        $sql = 'SELECT studente FROM frequenta WHERE classe ="'. $classe . '"';
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        // output data of each row
        $array = array();
        if($result->num_rows === 0) array_push($array,"norows");;
        while($row = $result->fetch_assoc()) {
            array_push($array,$row);
        }

        echo json_encode($array);
    }
    
?>