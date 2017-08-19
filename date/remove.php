<?php

$contentString = file_get_contents("contacte.json"); // citim continut
$contacte = json_decode($contentString, true);       // convert la json. Nu pute lucra cu stringuri

if(isset($_GET["id"])){
                                // add person
    $id = $_GET["id"];          // gassesc un anumit ID

    for($i = 0; $i < count($contacte); $i++){
        if($contacte[$i]["id"] == $id){ // dupa ce am gasit o persona, intrebam ce id are, il comparam(==) cu id-ul pe care il vreau eu. Cand l-am gasit, atunci modific
                                    // unset($contacte[$i]);  stergere nefunctionala . Pentru ca transforma obiectul tip array in json
            array_splice($contacte, $i, 1); // sterg din contacte, incepand cu pozitia i, sterg 1 element
        }
    }
}

$contentString = json_encode($contacte, true);      // enoodez in string
file_put_contents("contacte.json", $contentString); // (nume fisier, apoi continut)

header('Location: ../contacte.html');

?>
