<head>
    <?php
        include_once '../utils/dbConnection.php';
    ?>
</head>
<?php
    if(!isset($_POST['nome'])||!isset($_POST['cognome'])||!isset($_POST['classe'])||!isset($_POST['email'])||!isset($_POST['psw'])||!isset($_POST['as'])||!isset($_POST['rap'])){
        Header('Location: registrazione.php');
    }else{
        $nome = $_POST['nome'];
        $cognome =  $_POST['cognome'];
        $classe = $_POST['classe'];
        $anno = $classe[0];
        $sezione = $classe[1];
        if(strlen($classe) === 3) $sezione = $sezione . $classe[2];
        $email = $_POST['email'];
        $psw = md5($_POST['psw']);
        $as = $_POST['as'];
        $_POST['rap'] === '1' ? $rap = 1 : $rap = 0;
        $conn = openConn();
        $conn->begin_transaction();
        $stmt = $conn->prepare('insert into studente(nome, cognome) values (?,?)');
        $stmt->bind_param("ss", $nome, $cognome);
        $stmt->execute();
        $idStudente = $stmt->insert_id;
        $stmt = $conn->prepare('insert into utente(id, email, password) values (?,?,?)');
        $stmt->bind_param("iss", $idStudente, $email, $psw);
        $stmt->execute();
        $stmt = $conn->prepare('select id from classe where anno = ? and sezione = ? and anno_scolastico = ?');
        $stmt->bind_param("iss", $anno, $sezione, $as);
        $stmt->execute();
        $idClasse = $stmt->get_result()->fetch_row()[0];
        $stmt = $conn->prepare('insert into frequenta values (?,?,?)');
        $stmt->bind_param("iii", $idStudente, $idClasse, $rap);
        $stmt->execute();
        $app = $conn->commit();
        closeConn($conn);
        if($app){
            echo '<script> alert("Registrazione avvenuta con successo. Stai per essere reindirizzato alla pagina di login"); 
            '// window.location = "login.html";
            .'</script>';
        } else {
            echo '<script> alert("Problema di registrazione, la preghiamo di riprovare!"); 
            window.location = "#";
            </script>';
        }
    }
?>