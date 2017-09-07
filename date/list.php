<?php
include "connect-db.php";

$sql = "SELECT * FROM agenda";
$result = $conn->query($sql);  // fac conexiunea ?

$contacte = array();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {     // citeste rezultatele si face la fel pentru toate rezultatele
        $contacte[] = array(                    // adauga obiect in array. Obiectul(json) de mai jos.
            "id" => $row["id"],                 // valori copiate in $contacte din rand din baza de date
            "firstName" => $row["first_name"],
            "lastName" => $row["last_name"],
            "phone" => $row["phone"],
        );
    }
}
$conn->close();

echo json_encode($contacte, true);
?>