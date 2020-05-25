<?php
    include_once 'utils/dbConnection.php';
    include_once '../php/Utils/session_control.php';
    if(!checkSession()) header("Location: ../dist/login.html");
    else{
        if(isset($_POST['submit']) && isset($_GET['id']) ){
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE) echo 'Inserisci immagine';
            else{
                $name = addslashes($_FILES['image']['name']);
                $whatIWant = substr($name, strpos($name, ".") + 1);
                //echo $whatIWant;
                if($whatIWant !== "jpeg" && $whatIWant !== "jpg") echo 'formato non valido, si prega di inserire un file .jpg o .jpeg';
                else{
                    //query per vedere se ha già inserito foto per la classe
                    $id = $_GET['id'];
                    $studente = $_SESSION['user'];
                    $sql = "SELECT frase from immagine i left join frequenta f on i.classe = f.classe and i.studente = f.studente where i.studente = ? and i.classe = ?";
                    $conn = openConn();
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $studente,$id);
                    $stmt->execute();
                    $result = $stmt->get_result();
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
        }
        
    }
    function saveImage($image){
        $conn = openConn();
        $classe = $_GET['id'];
        $studente = $_SESSION['user'];
        $insDate = date("Y-m-d");
        if($_POST['frase']=="") $frase = "Frase predefinita";
        else $frase = $_POST['frase'];
        
        $sql = "insert into immagine(file,frase,studente,classe,inserimento) values(?,?,?,?,?)";
        $conn = openConn();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiis", $image,$frase,$studente,$classe,$insDate);
        
        //$result = $stmt->get_result();
        //closeConn($conn);
        //$result = $conn->query($sql);
        if ($stmt->execute() === TRUE) {
            echo "FOTO INSERITA CORRETTAMENTE";
        } else {
            echo "Errore :".$conn->error;
            echo "Errore nell'inserimento foto, controlla la classe";
        }
        closeConn($conn);
    }
?>

<html>
    <head>
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript">
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            if(urlParams.has("id")) var classe = urlParams.get("id");
            else window.location.replace("../dist/Classi.html");
        </script>
    </head>
    <body>
        <a id="prova"></a>
        <form id="form" action = "#" method="post" enctype="multipart/form-data">
            <input type="file" name = "image" required>
            <input type="text" name = "frase">
            <input type="submit" id ="subBTN" name="submit" value = "Invia">
        </form>
    </body>
    
</html>