<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="refresh" content="2; url=../contacte.html">-->
    <title>Added</title>
</head>
<body>

<?php

/**
 * create new number (auto increment)
 * 1. read form last.contact.id
 * 1.2 convert string to number
 * 2. +1 (increment)  - for
 * 3. use of the last increment number
 * 4. save it in the last.contact.id
 * @return int
 */

$contentString = file_get_contents("contacte.json"); // citim continut
$contacte = json_decode($contentString, true);       // convert la json



function getNextId(){
    $idString = file_get_contents("last.contact.id"); //citim numar dintr-un fisier
    $id = intval($idString);  // convertesc in numar
    $id++; // incrementez
    file_put_contents("last.contact.id", $id); // punem noul numar in fisier
    return $id;
}

$id = getNextId();

$newPerson = array(                     //pregatesc/creez noua persoana - un singur json
    "id"=> $id,                           // aray de tip cheie valoare
    "firstName"=> $_GET["firstName"],
    "lastName"=> $_GET["lastName"],
    "phone"=> $_GET["phone"],
);

$contacte[] = $newPerson;                  // add new person into array
$contentString = json_encode($contacte, true);   // enoodez in string
file_put_contents("contacte.json", $contentString); // (nume fisier, apoi continut)

header('location: ../contacte.html');

?>

contact added

(<div id="contact-id"></div>)

<script>
    var parameters = location.search.substr(1);  // search luam tot cem am transmis catre pagina cu semnul ?(inclusiv ?). substr1 - elimina 1caracter din strig

    var paramArray = parameters.split('&');  //
    console.info(paramArray);

//  document.getElementById('contact-id').innerHTML = parameters;
    document.getElementById('contact-id').innerHTML = paramArray.join('; <br>') + ';';

</script>

</body>
</html>