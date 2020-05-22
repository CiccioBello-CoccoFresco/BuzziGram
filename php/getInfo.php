<?php
    include_once 'utils/dbConnection.php';
    //Query per email, nome, cognome
    $studente = 2;//temporaneo, sostituire con $_SESSION['user'] quando verrà implementata la session
    $sql = 'SELECT email, nome, cognome FROM utente u join studente s on u.id = s.matricola WHERE studente ='. $studente;
    $conn = openConn();
    $result = $conn->query($sql);
    $array = array();
    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        array_push($array,$row['email']);
        array_push($array,$row['nome']);
        array_push($array,$row['cognome']);
        if($studente != 1){
            $sql = 'SELECT anno_scolastico, anno, sezione, file, frase
            from Classe c join Frequenta f on c.id = f.classe left join immagine i on f.classe = i.classe and f.studente = i.studente
            where f.studente ='. $studente;
            $result = $conn->query($sql);
            array_push($array,"foto");
            while($row = $result->fetch_assoc()) {
                array_push($array,$row);
            }
        }else array_push($array,"admin");
    }else array_push($array,"norows");
    closeConn($conn);
    echo json_encode($array);
?>