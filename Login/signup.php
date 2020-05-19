<head>
    <?php
        include_once '../utils/dbConnection.php';
    ?>
</head>
<?php
    if(!isset($_POST['nome'])||!isset($_POST['cognome'])||!isset($_POST['classe'])||!isset($_POST['email'])||!isset($_POST['psw'])||!isset($_POST['as'])){
        Header('Location: registrazione.php');
    }else{
        $nome = $_POST['nome'];
        $cognome =  $_POST['cognome'];
        $classe = $_POST['classe'];
        $anno = $classe[0];
        $sezione = $classe[2];
        $email = $_POST['email'];
        $psw = md5($_POST['psw']);
        $as = $_POST['as'];

        /*$conn = openConn();
        $conn->begin_transaction();
        $stmt = $conn->prepare('insert into studente values (?,?,?,?,?,?)');
        $stmt->bind_param("ssssss", $_POST['cf'], $_POST['n_ordine'], $_POST['nome'], $_POST['cognome'], $_POST['citta'], $_POST['sigla']);
        $stmt->execute();
        $stmt = $conn->prepare('insert into utente(cf, email, password, livello) values (?,?,?,?)');
        $psw = md5($_POST['password']);
        $base_level = 1;
        $stmt->bind_param("ssss", $_POST['cf'], $_POST['email'], $psw, $base_level);
        $stmt->execute();
        $app = $conn->commit();
        closeConn($conn);
        if($app){
            echo '<script> alert("Registrazione avvenuta con successo. Stai per essere reindirizzato alla pagina di login"); 
            window.location = "login.html";
            </script>';
        } else {
            echo 'Problema di registrazione, la preghiamo di riprovare!';
            Header("Location: ".$_SERVER['HTTP_REFERER']);
        }*/
    }
?>