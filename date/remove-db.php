<?php
include "connect-db.php";

if(isset($_GET["id"])) {     // transmit un ID
    $id = $_GET["id"];          // cer un ID

    // sql to delete a record
    $sql = "DELETE FROM agenda WHERE id=$id"; // construiesc SQL
    $conn->query($sql);                         // TODO: fac conexiunea?
    $conn->close();                             // inchid conexiunea
}

header('Location: ../contacte.html');
?>
