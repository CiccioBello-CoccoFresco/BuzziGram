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
$sql = "Select id from utente where email = ? and password = ?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $email, $psw);
$stmt->execute();
$result = $stmt->get_result();
closeConn($conn);
if($result->num_rows != 0) echo 'Benvenuto';
else echo 'Credenziali errate';

?>