<?php
	function openConn(){
        $servername = "localhost";
        $username = "root";
        $password = "";
		$db = "buzzigram";

		$conn = new mysqli($servername, $username, $password,$db) or die("Connect failed: %s\n". $conn -> error);

		return $conn;
	}

	function closeConn($conn){
		$conn->close();
		$conn = null;
	}

?>
