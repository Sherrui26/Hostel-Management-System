<?php
include('includes/config.php');

if(!empty($_POST["roomid"])) 
{
    $id = $_POST["roomid"];
    $query = "SELECT * FROM rooms WHERE room_no = :id";
    $stm = oci_parse($dbconn, $query);
    oci_bind_by_name($stm, ":id", $id);
    oci_execute($stm);

    while($row = oci_fetch_assoc($stm)) {
        echo htmlentities($row['SEATER']);
    }
}

if(!empty($_POST["rid"])) 
{
    $id = $_POST["rid"];
    $query = "SELECT * FROM rooms WHERE room_no = :id";
    $stm = oci_parse($dbconn, $query);
    oci_bind_by_name($stm, ":id", $id);
    oci_execute($stm);

    while($row = oci_fetch_assoc($stm)) {
        echo htmlentities($row['FEES']);
    }
}
?>
