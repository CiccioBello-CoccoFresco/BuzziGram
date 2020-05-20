<html>
    <head>
        <title>Classi</title>
        <?php
            include_once '../utils/dbConnection.php';
        ?>
        <script src="../js/classi.js"></script>
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript">
            function calcolaAnnoScolastico() {
                var d = new Date();
                var y = d.getFullYear() - 2000;
                var m = d.getMonth() + 1;
                if (m >= 9) {
                    var y2 = y+1;
                    var as = y + "/" + y2;
                }else{
                    var y2 = y-1;
                    var as = y2 + "/" + y;
                }
                return as;
            }
            $(document).ready(() => {
                var mode = "biennio";
                $("#as").on("change", function(){
                    var annoSelezionato = $(this).children("option:selected").val();
                    caricaClassiAnnuario(annoSelezionato, mode);
                });

                $(function() {
                    var temp=calcolaAnnoScolastico(); 
                    $("#as").val(temp);
                });

                $("#biennio").on("click", function(){
                    var annoSelezionato = $("#as").children("option:selected").val();
                    var mode = "biennio";
                    caricaClassiAnnuario(annoSelezionato, mode);
                });
                $("#triennio").on("click", function(){
                    var annoSelezionato = $("#as").children("option:selected").val();
                    var mode = "triennio";
                    caricaClassiAnnuario(annoSelezionato, mode);
                });
            });
            

        </script>
    </head>

    <body>
        <select id="as" name="as">
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
        <button id="biennio">BIENNIO</button> <button id="triennio">TRIENNIO</button>
        <div id = "annuario">
            
        </div>
    </body>
</html>