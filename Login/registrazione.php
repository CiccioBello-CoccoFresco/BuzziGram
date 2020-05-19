<!DOCTYPE html>
<html>
<head>
	<title>registrazione</title>
	<link rel="stylesheet" type="text/css" href="../css/registrazione.css">
    <script>$(document).ready(() => {
                            $("#as").on("change", function(){
                            var annoSelezionato = $(this).children("option:selected").val();
                            caricaClasi(annoSelezionato);
                        })
                    });</script>
</head>
	<body>

		<div class="reg">
			<header class="pre_contenitore">
				<p>Register</p>
			</header>
			<form class="contenitore" action="login.php" method="post"> 
            
               <input class="input" type="text" name="nome" placeholder="nome" required>
                <input class="input" type="text" name="cognome" placeholder="cognome" required>
                
                <select class="" id="classe" name="classe" required>
                        <option selected disabled value="">Selezioanre anno scolastico...</option>
                    </select>
                <input class="input" type="text" name="email" placeholder="email" required>
                <input class="input" type="password" name="psw" placeholder="Password" required>

                <label class = "text">Anno scolastico</label>
                <select class="" id="as" name="as" required>
                    <option selected disabled value="">Scegli...</option>
                    <?php
                        $conn = openConn();
                        $sql = "SELECT DISTINCT anno_scolastico FROM classe";
                        $result = $conn->query($sql);
                        closeConn($conn);
                        if ($result->num_rows > 0) {
                
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["anno_scolastico"] . '">' . $row["anno_scolastico"] . '</option>';
                            }
                        }
                    ?>
                </select>
                
                
				<button class="btn" type="submit"></button>
            </form>
			</div>

							
	</body>
</html>