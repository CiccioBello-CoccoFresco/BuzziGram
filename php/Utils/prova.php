<?php
    include_once 'dbConnection.php';
    if(isset($_POST['submit'])){
        if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
            echo 'igfdjsi';
        }else{
            $image = addslashes($_FILES['image']['tmp_name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
            saveImage($image);
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

<html>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name = "image">
        <input type="submit" name="submit">
    </form>
</html>