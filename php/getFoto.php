<?php
    include_once 'utils/dbConnection.php';
    include_once '../php/Utils/session_control.php';
    $array = array();
    if(!checkSession()) array_push($array,"redirect");
    else{
        $studente = $_SESSION['user'];
        $conn = openConn();
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
            array_push($array,$row);
        }
    }
    echo json_encode($array);
?>