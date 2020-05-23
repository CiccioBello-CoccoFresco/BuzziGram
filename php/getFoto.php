<?php
include_once 'utils/dbConnection.php';
        $studente = 1; //session
        $conn = openConn();
        $array = array();
        $sql = 'SELECT c.id, anno_scolastico, anno, sezione, file, frase
            from Classe c join Frequenta f on c.id = f.classe left join immagine i on f.classe = i.classe and f.studente = i.studente
            where f.studente ='. $studente;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            if(isset($row['file'])) {
                $pathSrc = 'data:image;base64,'.$row['file'];
            }else{
                $pathSrc = "nofoto";
                $row['frase'] = "Foto non inserita";
            }
            $row['file'] = $pathSrc;
            //var_dump($row);
            array_push($array,$row);
        }
        echo json_encode($array);
?>