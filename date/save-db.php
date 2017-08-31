<?php
include "connect-db.php";

$first_name = $_GET["firstName"];
$last_name = $_GET["lastName"];
$phone = $_GET["phone"];

// SQL modify
if(isset($_GET["id"]) && $_GET["id"] != '') {     // Daca 1. id este dat si ($$=true pentru ambele) 2. inclusiv  id obilgatoriu diferit(!=) de valoarea nimic ('')
    //sql to update person
    $id = $_GET["id"];       // cer un ID. Citim id-ul si vedem daca e id-ul nostru.
    $sql = "UPDATE agenda SET first_name='$first_name', last_name='$last_name', phone='$phone' WHERE id=$id";  // construiesc SQL
    $conn->query($sql);     // fac solicitare pe SQL creat

} else {
    // sql to add person
    $sql = "INSERT INTO agenda (first_name, last_name, phone) VALUES ('$first_name', '$last_name', '$phone')";  // construiesc SQL\
    $conn->query($sql);     // fac solicitare pe SQL creat
}

$conn->close();         // inchid conexiunea

header('Location: ../contacte.html');
?>

////// START LIST.PHP //////////////////////////
//$sql = "SELECT * FROM agenda";
//$result = $conn->query($sql);  // fac conexiunea ?
//
//$contacte = array();
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while ($row = $result->fetch_assoc()) {     // citeste rezultatele si face la fel pentru toate rezultatele
//        $contacte[] = array(                    // adauga obiect in array. Obiectul(json) de mai jos.
//            "id" => $row["id"],                 // valori copiate in $contacte din rand din baza de date
//            "firstName" => $row["first_name"],
//            "lastName" => $row["last_name"],
//            "phone" => $row["phone"],
//        );
//    }
//}
//// $conn->close();  // inutil
//
//echo json_encode($contacte, true);
//
////// END LIST.PHP //////////////////////////

////// START SAVE.PHP //////////////////////////
//function getNextId(){
//    $idString = file_get_contents("last.contact.id");   //citim numar dintr-un fisier
//    $id = intval($idString);                            // convertesc in numar
//    $id++;                                              // incrementez
//    file_put_contents("last.contact.id", $id);          // punem noul numar in fisier
//    return $id;
//}
//
//if(isset($_GET["id"])) {     // transmit un ID. Daca transmit un anumit id in link, se face update-ul
//    //update person
//    $id = $_GET["id"];       // cer un ID. Citim id-ul si vedem daca e id-ul nostru. Daca l-am gasit, facem un for pentru toate persoanele
//
//    for($i = 0; $i < count($contacte); $i++){
//        $contact = &$contacte[$i]; // cautam persoana. luam cate unul la rand. "&"face ca sa iti permita sa modifici contactul dupa ce ti l-a dat.
//        if($contact["id"] == $id){  // dupa ce am gasit o persona, intrebam ce id are, il comparam(==) cu id-ul pe care il vreau eu. Cand l-am gasit, atunci modific
//            $contact["first_name"] = $_GET["firstName"]; // modific cu noua valoare venita din url/browser
//            $contact["last_name"] = $_GET["lastName"];   // modific cu noua valoare venita din url/browser
//            $contact["phone"] = $_GET["phone"];         // modific cu noua valoare venita din url/browser
//        }
//    }
//} else {
//    // add person
//    $id = getNextId();
//    $newPerson = array(                     //pregatesc/creez noua persoana - un singur json
//        "id"=> $id,                         // aray de tip cheie valoare
//        "firstName" => $_GET["firstName"],
//        "lastName" => $_GET["lastName"],
//        "phone" => $_GET["phone"]           // nu este necesar a se pune virgula
//    );
//    $contacte[] = $newPerson;               // add new person into array
//}
////// END SAVE.PHP //////////////////////////

//    // sql to delete a record
//    $sql = "DELETE FROM agenda WHERE id=$id"; // construiesc SQL
//    $conn->query($sql);                         // fac conexiunea
//    $conn->close();                             // inchid conexiunea

