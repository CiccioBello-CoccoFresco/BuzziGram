<?php
    include_once 'utils/dbConnection.php';
    //Query per email, nome, cognome
    $studente = 1;//temporaneo, sostituire con $_SESSION['user'] quando verrà implementata la session
    $sql = 'SELECT email, nome, cognome FROM utente u join studente s on u.id = s.matricola WHERE matricola ='. $studente;
    $conn = openConn();
    $result = $conn->query($sql);
    $array = array();
    //var_dump($result);
    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        array_push($array,$row['email']);
        array_push($array,$row['nome']);
        array_push($array,$row['cognome']);
        if($studente != 2){
            $sql = 'SELECT c.id, anno_scolastico, anno, sezione, file, frase
            from Classe c join Frequenta f on c.id = f.classe left join immagine i on f.classe = i.classe and f.studente = i.studente
            where f.studente ='. $studente;
            $result = $conn->query($sql);
            array_push($array,"foto");
            while($row = $result->fetch_assoc()) {
                if(isset($row['file'])) {
                    $pathSrc = 'data:image/jpeg;base64,'.base64_encode( $row['file'] );
                }else{
                    $pathSrc = "nofoto";
                    $row['frase'] = "Foto non inserita";
                }
                $row['file'] = $pathSrc;
                array_push($array,$row);
            }
        }else array_push($array,"admin");
    }else array_push($array,"norows");
    closeConn($conn);
    echo json_encode($array);
?>