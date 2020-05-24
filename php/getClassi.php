<?php
    include_once './Utils/dbConnection.php';
    if(isset($_GET['as'])){
        $as = $_GET["as"];
        if(isset($_GET['anno'])) {
            include_once '../php/Utils/session_control.php';
            $array = array();
            if(!checkSession()) array_push($array,"redirect");
            else{
                $anno = $_GET['anno'];
                $sql = 'SELECT id, anno, sezione FROM classe WHERE anno_scolastico ="'. $as . '" and anno ='.$anno.' ORDER BY anno, sezione ASC';
                $conn = openConn();
                $result = $conn->query($sql);
                closeConn($conn);
                // output data of each row
                //var_dump($conn->error);
                if($result->num_rows == 0){
                    array_push($array, "norows");
                }else{
                    while($row = $result->fetch_assoc()) {
                        array_push($array,$row);
                    }
                }
                //var_dump($array);
            }
            echo json_encode($array);
            
        }else{
            $sql = 'SELECT anno, sezione FROM classe WHERE anno_scolastico ="'. $as . '"ORDER BY anno, sezione ASC';
            $conn = openConn();
            $result = $conn->query($sql);
            closeConn($conn);
            // output data of each row
            $array = array();
            if($result->num_rows === 0) exit("Nessun risultato trovato");
            while($row = $result->fetch_assoc()) {
                array_push($array,$row);

            }

            echo json_encode($array);
        }
        
    }
    
?>