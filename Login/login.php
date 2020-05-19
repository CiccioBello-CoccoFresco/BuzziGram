<head>
    <?php
        include_once '../utils/dbConnection.php';
    ?>
</head>
<?php
if(!isset($_POST['email'])||!isset($_POST['psw'])){
    Header('Location: login.html');
}
$email = $_POST['email'];
$psw = md5($_POST['psw']);

$conn = openConn();

$sql = $conn->prepare("Select id from utente where email = ? and password = ?");
$sql->bind_param('ss', $email, $psw);
$result = $sql->execute();
closeConn($conn);
if($result->num_rows != 0) echo 'Benvenuto';
else echo 'Credenziali errate';

?>