<!DOCTYPE html>
<html>
<head>
    <?php
        include_once '../utils/dbConnection.php';
    ?>
	<title>registrazione</title>
    <link rel="stylesheet" type="text/css" href="../css/registrazione.css">
    <script src="../js/registrazione.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            $("#as").on("change", function(){
            var annoSelezionato = $(this).children("option:selected").val();
            caricaClassi(annoSelezionato);
        })
    });
    </script>
    <script type="text/javascript">
        mdc.textField.MDCTextField.attachTo(document.querySelector('.mdc-text-field'));
        /*const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
        formField.input = textField;
        const floatingLabel = new MDCFloatingLabel(document.querySelector('.mdc-floating-label'));*/
    </script>    
</head>
	<body>

		<div class="reg">
			<header class="pre_contenitore">
				<p>Registrazione</p>
			</header>
			<form class="contenitore" action="signup.php" method="post"> 
                <mdc-text-field class="mdc-text-field mdc-text-field--filled">
                <input class="mdc-text-field__input" id="text-field-hero-input" name="nome" required>
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Nome</label>
                            </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </mdc-text-field>
                <div class="mdc-form-field">
                    <input class="input" type="text" name="cognome" placeholder="cognome" required>
                </div>
                <div class="mdc-form-field">
                    <label class = "text" for='as'>Anno scolastico</label>
                    <select class="anno" id="as" name="as" required>
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
                </div>
                <div class="mdc-form-field">
                    <select class="classe" id="classe" name="classe" required>
                            <option selected disabled value="">Selezionare anno scolastico...</option>
                    </select>
                </div>
                <div class="mdc-form-field">
                    <input class="input" type="text" name="email" placeholder="email" required>
                </div>
                <div class="mdc-form-field">
                    <input class="input" type="password" name="psw" placeholder="Password" required>
                </div>
                <div class="mdc-form-field">
                    <label class="text" for="btn">Sei rappresentante di classe?</label>
                    <input type="checkbox" id="btn" name="rap">
                </div>
                
				<input type="submit" name="Confirm" value="Confirm">
            </form>
			</div>

							
	</body>
</html>