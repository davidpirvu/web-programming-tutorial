<?php
/**
 * create new number (auto increment)
 * 1. read from last.contact.id
 * 1.2 convert string to number
 * 2. +1 (increment)  - for
 * 3. use of the last incremented number
 * 4. save it in last.contact.id
 * @return int
 */
function getNextId(){
    $idString = file_get_contents("last.contact.id");   //citim numar dintr-un fisier
    $id = intval($idString);                            // convertesc in numar
    $id++;                                              // incrementez
    file_put_contents("last.contact.id", $id);          // punem noul numar in fisier
    return $id;
}
$contentString = file_get_contents("contacte.json");    // citim continut
$contacte = json_decode($contentString, true);          // convert la json
if(isset($_GET["id"])){                                 // daca transmit un anumit id in link, se face update-ul
                                                        // update person
    $id = $_GET["id"];                                  // citim id-ul si vedem daca e id-ul nostru. Daca l-am gasit, facem un for pentru toate persoanele
    for($i = 0; $i < count($contacte); $i++){
        $contact = &$contacte[$i]; // cautam persoana. luam cate unul la rand. "&"face ca sa iti permita sa modifici contactul dupa ce ti l-a dat.
        if($contact["id"] == $id){  // dupa ce am gasit o persona, intrebam ce id are, il comparam(==) cu id-ul pe care il vreau eu. Cand l-am gasit, atunci modific
            $contact["firstName"] = $_GET["firstName"]; // modific cu noua valoare venita din url/browser
            $contact["lastName"] = $_GET["lastName"];   // modific cu noua valoare venita din url/browser
            $contact["phone"] = $_GET["phone"];         // modific cu noua valoare venita din url/browser
        }
    }
} else {
    // add person
    $id = getNextId();
    $newPerson = array(                     //pregatesc/creez noua persoana - un singur json
        "id"=> $id,                         // aray de tip cheie valoare
        "firstName" => $_GET["firstName"],
        "lastName" => $_GET["lastName"],
        "phone" => $_GET["phone"]           // nu este necesar a se pune virgula
    );
    $contacte[] = $newPerson;               // add new person into array
}
$contentString = json_encode($contacte, true);      // enoodez in string
file_put_contents("contacte.json", $contentString); // (nume fisier, apoi continut)
header('Location: ../contacte.html');
?>