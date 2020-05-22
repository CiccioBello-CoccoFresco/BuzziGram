<?php
    include_once './Utils/dbConnection.php';

    if(isset($_GET['id']) && isset($_GET['file'])){
        //echo "HO ID E FILE;";
        $id = $_GET['id'];
        $studente = 1;//da prendere da session
        $sql = "SELECT frase from immagine i left join frequenta f on i.classe = f.classe and i.studente = f.classe where i.studente =".$studente." and i.classe =".$id;
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        $row = $result->fetch_assoc();
        if(isset($row['frase'])) echo "E' stata già inserita una foto per questo studente nella classe indicata";
        else{
            $image = addslashes($_FILES['image']['tmp_name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
            saveImage($image);
            //echo "STO INSERENDO FOTO;";
            //$file = $_GET['file'];
            /*$file = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $insDate = date("Y-m-d");
            $conn = openConn();
            if($_GET['frase']=""){
                //echo "FRASE DEFAULT";
                $query = 'Insert into immagine(file, inserimento, studente, classe) values(?, ?, ?, ?)';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param(1,$file);
                $stmt->bind_param(2,$insDate);
                $stmt->bind_param(3,$studente);
                $stmt->bind_param(4,$id);
            }else{
                //echo "FRASE SUA;";
                $query = 'Insert into immagine values(?, ?, ?, ?, ?)';
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param(1,$_GET['frase']);
                $stmt->bind_param(2,$file);
                $stmt->bind_param(3,$insDate);
                $stmt->bind_param(4,$studente);
                $stmt->bind_param(5,$id);
            }
            

            echo $stmt->execute();
            closeConn($conn);*/
        }

        
    }
    function saveImage($image){
        $conn = openConn();
        $sql = "insert into immagine(file,studente,classe) values('".$image."',1,1)";
        $result = $conn->query($sql);
        if($result) echo 'FATTO';
        else echo $sql;
    }
?>