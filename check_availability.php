<?php
require_once("includes/config.php");

// For Email
if (!empty($_POST["emailid"])) {
    $email = $_POST["emailid"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "error : You did not enter a valid email.";
    } else {
        $query = "SELECT count(*) FROM userRegistration WHERE email=:email";
        $stmt = oci_parse($dbconn, $query);
        oci_bind_by_name($stmt, ':email', $email);
        oci_execute($stmt);
        oci_fetch($stmt);
        $count = oci_result($stmt, 1);
        if ($count > 0) {
            echo "<span style='color:red'> Email already exists. Please try again.</span>";
        }
    }
}

// For Registration Number
if (!empty($_POST["regno"])) {
    $regno = $_POST["regno"];

    $query = "SELECT count(*) FROM userRegistration WHERE regNo=:regno";
    $stmt = oci_parse($dbconn, $query);
    oci_bind_by_name($stmt, ':regno', $regno);
    oci_execute($stmt);
    oci_fetch($stmt);
    $count = oci_result($stmt, 1);
    if ($count > 0) {
        echo "<span style='color:red'> Registration number already exists. Please try again.</span>";
    }
}

// For old Password
if (!empty($_POST["oldpassword"])) {
    $pass = $_POST["oldpassword"];
    $query = "SELECT password FROM userregistration WHERE password=:pass";
    $stmt = oci_parse($dbconn, $query);
    oci_bind_by_name($stmt, ':pass', $pass);
    oci_execute($stmt);
    oci_fetch($stmt);
    $opass = oci_result($stmt, 1);
    if ($opass == $pass) {
        echo "<span style='color:green'> Password matched.</span>";
    } else {
        echo "<span style='color:red'> Password Not matched</span>";
    }
}

// For room availability
if (!empty($_POST["roomno"])) {
    $roomno = $_POST["roomno"];
    $query = "SELECT count(*) FROM registration WHERE roomno=:roomno";
    $stmt = oci_parse($dbconn, $query);
    oci_bind_by_name($stmt, ':roomno', $roomno);
    oci_execute($stmt);
    oci_fetch($stmt);
    $count = oci_result($stmt, 1);
    if ($count > 0) {
        echo "<span style='color:red'>$count Seats already full.</span>";
    } else {
        echo "<span style='color:red'>All Seats are Available</span>";
    }
}
?>
