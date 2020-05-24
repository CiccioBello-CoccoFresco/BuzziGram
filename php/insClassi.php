<?php
    include_once 'utils/dbConnection.php';
    include_once '../php/Utils/session_control.php';
    if(!checkSession()) header('Location: ../dist/login.html');
    function startsWith ($string, $startString) { 
        $len = strlen($startString); 
        return (substr($string, 0, $len) === $startString); 
    } 
    if(isset($_GET['as'])&&isset($_POST['classi'])){
        $as = $_GET['as'];
        $classi = $_POST['classi'];
        if($classi !== ""){
            $esito = 1;
            //$arrClas = array();
            $arrClas = explode(',',$classi);
            foreach($arrClas as $classe){
                $anno = $classe[0];
                $sezione = $classe[1];
                if(strlen($classe) == 3) $sezione = $sezione ."". $classe[2];
                strtoupper($sezione);
                $sql = "Insert into classe(anno, sezione, anno_scolastico) values(?,?,?)";
                $conn = openConn();
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $anno, $sezione, $as);
                $app = $stmt->execute();
                if(!$app) {
                    if(startsWith($stmt->error, "Duplicate")) $esito = 2;
                    else $esito = 0;
                }
            }
            switch($esito){
                case 1:
                    echo 'Classi inserite';
                    break;
                case 2:
                    echo 'Classi già presenti';
                    break;
                case 0:
                    echo 'Errore in inserimento';
                    break;
            }
            echo "<br><a href='../dist/areaPersonale.html'>Torna nell'area personale</a>";
        }else header('location: ../dist/areaPersonale.html');
    }else header('location: ../dist/areaPersonale.html');
?>