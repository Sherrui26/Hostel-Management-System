<?php
$dbuser="hms_user";
$dbpass="hms";
$host="localhost:1521/XEPDB1";
$dbconn = oci_connect($dbuser, $dbpass, $host);

if(!$dbconn) {
    $e = oci_error(0); trigger_error((htmlentities($e["message"])), E_USER_ERROR);
}   else {
//echo "CONNECTED SUCCESSFULLY!";
}
?>