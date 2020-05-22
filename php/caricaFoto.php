<?php
    include_once 'utils/dbConnection.php';
    if(isset($_POST['submit']) && isset($_GET['id']) ){
        if(getimagesize($_FILES['image']['tmp_name']) == FALSE) echo 'Inserisci immagine';
        else{
            //query per vedere se ha già inserito foto per la classe
            $id = $_GET['id'];
            $studente = 1;//da prendere da session
            $sql = "SELECT frase from immagine i left join frequenta f on i.classe = f.classe and i.studente = f.studente where i.studente =".$studente." and i.classe =".$id;
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
            }
        }
        
    }
    function saveImage($image){
        $conn = openConn();
        $classe = $_GET['id']; 
        $studente = 1;//prendi da sessione
        if($_POST['frase']=="") $frase = "Frase predefinita";
        else $frase = $_POST['frase'];
        
        $sql = "insert into immagine(file,frase,studente,classe) values('".$image."','".$frase."',".$studente.",".$classe.")";
        $result = $conn->query($sql);
        if($result) echo 'Foto caricata';
        else echo $sql;
        closeConn($conn);
    }
?>

<html>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name = "image" required>
        <input type="text" name = "frase">
        <input type="submit" name="submit">
    </form>
</html>