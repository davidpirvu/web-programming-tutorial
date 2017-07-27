<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="refresh" content="2; url=../contacte.html">-->
    <title>Removed</title>
</head>
<body>

<?php
$contentString = file_get_contents("contacte.json"); // citim continut
$contacte = json_decode($contentString, true);         // convert la json

$newPerson = array(                     //pregatesc noua persoana
    "id"=> 5,
    "firstName"=> $_GET["firstName"],
    "lastName"=> $_GET["lastName"],
    "phone"=> $_GET["phone"],
);

$contacte[] = $newPerson;                  // add new person into array
$contentString = json_encode($contacte, true);
file_put_contents("contacte.json", $contentString);

?>

contact added (<div id="contact-id"></div>)

<script>
    var parameters = location.search.substr(1);  // search luam tot cem am transmis catre pagina cu semnul ?(inclusiv ?). substr1 - elimina 1caracter din strig

    var paramArray = parameters.split('&');  //
    console.info(paramArray);

//  document.getElementById('contact-id').innerHTML = parameters;
    document.getElementById('contact-id').innerHTML = paramArray.join('; <br>') + ';';

</script>

</body>
</html>