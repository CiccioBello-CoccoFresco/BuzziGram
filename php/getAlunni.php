<?php
    include_once 'utils/dbConnection.php';
    include_once '../php/Utils/session_control.php';
    $array = array();
    if(!checkSession()) array_push($array,"redirect");
    else{
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
            
            if($result->num_rows === 0) array_push($array,"norows");
            else{
                
                while($row = $result->fetch_assoc()) {
                    if(isset($row['studente'])){
                        if(isset($row['file'])) {
                            //$pathSrc = 'data:image/jpeg;base64,'.base64_encode( $row['file'] );
                            $pathSrc = 'data:image;base64,'.$row['file'];
                        }else{
                            $pathSrc = "../img/Cicciobello.png";
                            $row['frase'] = "Frase non inserita";
                        }
                        $row['file'] = $pathSrc;
                        
                        array_push($array,$row);
                    }else array_push($array,"norows");
                }
            }
        }
    }
    echo json_encode($array);
    
?>