<?php
    include_once 'utils/dbConnection.php';
    if(isset($_GET['classe'])){
        $classe = $_GET["classe"];
        
        $sql = 'SELECT f.studente, cognome, nome, file, frase
        FROM frequenta f join studente s on f.studente = s.matricola left join immagine i on s.matricola = i.studente and i.classe = f.classe
        WHERE f.classe ='.$classe.' 
        order by cognome asc';
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        // output data of each row
        $array = array();
        if($result->num_rows === 0) array_push($array,"norows");;
        while($row = $result->fetch_assoc()) {
            if(isset($row['file'])) {
                //$pathSrc = 'data:image/jpeg;base64,'.base64_encode( $row['file'] );
                $pathSrc = 'data:image;base64,'.$row['file'];
            }else{
                $pathSrc = "../img/Cicciobello.png";
                $row['frase'] = "fg,ndfghkljfdhjdglkj";
            }
            $row['file'] = $pathSrc;
            
            array_push($array,$row);
        }

        echo json_encode($array);
    }
    
?>