<?php
	function openConn(){
        $servername = "0.tcp.ngrok.io:10023";
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
