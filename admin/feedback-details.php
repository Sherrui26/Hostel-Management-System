<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Feedback Details</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 510 + ',height=' + 430 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row" id="print">


                    <div class="col-md-12">
                        <h2 class="page-title" style="margin-top:4%">Rooms and Feedback Details</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">Rooms and Feedback Details</div>
                            <div class="panel-body">
                                <table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1">

                                    <span style="float:left"><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span>
                                    <tbody>
                                        <?php
                                        $aid = intval($_GET['regno']);
                                        $ret = "select registration.*,TO_CHAR(POSTINGDATE, 'dd-MON-yyyy hh:mi:ss AM') 
                                        AS POSTINGDATE from registration where regno = :aid";
                                        $stmt = oci_parse($dbconn, $ret);
                                        oci_bind_by_name($stmt, ':aid', $aid);
                                        oci_execute($stmt);

                                        while ($row = oci_fetch_array($stmt)) {
                                        ?>

                                            <tr>
                                                <td colspan="6" style="text-align:center; color:blue">
                                                    <h4>Room Related Info</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Registration Number :</th>
                                                <td><?php echo $row['REGNO']; ?></td>
                                                <th>Apply Date :</th>
                                                <td colspan="3"><?php echo $row['POSTINGDATE']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Room no :</b></td>
                                                <td><?php echo $row['ROOMNO']; ?></td>
                                                <td><b>Seater :</b></td>
                                                <td><?php echo $row['SEATER']; ?></td>
                                                <td><b>Fees PM :</b></td>
                                                <td><?php echo $fpm = $row['FEESPM']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Food Status:</b></td>
                                                <td>
                                                    <?php echo $row['FOODSTATUS'] == 0 ? "Without Food" : "With Food"; ?>
                                                </td>
                                                <td><b>Stay From :</b></td>
                                                <td><?php echo $row['STAYFROM']; ?></td>
                                                <td><b>Duration:</b></td>
                                                <td><?php echo $dr = $row['DURATION']; ?> Months</td>
                                            </tr>

                                            <tr>
                                                <th>Hostel Fee:</th>
                                                <td><?php echo $hf = $dr * $fpm ?></td>
                                                <th>Food Fee:</th>
                                                <td colspan="3">
                                                    <?php
                                                    if ($row['FOODSTATUS'] == 1) {
                                                        echo $ff = (2000 * $dr);
                                                    } else {
                                                        echo $ff = 0;
                                                        echo "<span style='padding-left:2%; color:red;'>(You booked hostel without food).<span>";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Fee :</th>
                                                <th colspan="5"><?php echo $hf + $ff; ?></th>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="color:red">
                                                    <h4>Personal Info</h4>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>Reg No. :</b></td>
                                                <td><?php echo $row['REGNO']; ?></td>
                                                <td><b>Full Name :</b></td>
                                                <td><?php echo $row['FIRSTNAME'] . ' ' . $row['MIDDLENAME'] . ' ' . $row['LASTNAME']; ?></td>
                                                <td><b>Email :</b></td>
                                                <td><?php echo $row['EMAILID']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Contact No. :</b></td>
                                                <td><?php echo $row['CONTACTNO']; ?></td>
                                                <td><b>Gender :</b></td>
                                                <td><?php echo $row['GENDER']; ?></td>
                                                <td><b>Course :</b></td>
                                                <td><?php echo $row['COURSE']; ?></td>
                                            </tr>
											<tr>
    <td><b>Emergency Contact No. :</b></td>
    <td><?php echo $row['EGYCONTACTNO']; ?></td>
    <td><b>Guardian Name :</b></td>
    <td><?php echo $row['GUARDIANNAME']; ?></td>
    <td><b>Guardian Relation :</b></td>
    <td><?php echo $row['GUARDIANRELATION']; ?></td>
</tr>

<tr>
<td><b>Guardian Contact No. :</b></td>
<td colspan="6"><?php echo $row['GUARDIANCONTACTNO']; ?></td>
</tr>

<tr>
<td colspan="6" style="color:blue"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Correspondence Address</b></td>
<td colspan="2">
    <?php echo $row['CORRESADDRESS']; ?><br />
    <?php echo $row['CORRESCITY']; ?>, <?php echo $row['CORRESPINCODE']; ?><br />
    <?php echo $row['CORRESSTATE']; ?>
</td>
<td><b>Permanent Address</b></td>
<td colspan="2">
    <?php echo $row['PMNTADDRESS']; ?><br />
    <?php echo $row['PMNTCITY']; ?>, <?php echo $row['PMNTPINCODE']; ?><br />
    <?php echo $row['PMNATETSTATE']; ?>
</td>
</tr>
<?php
$cnt = 1;
$cnt = $cnt + 1;
} ?>
</tbody>
</table>
<?php

$uid = $_GET['uid'];
$ret = "select feedback.*,TO_CHAR(POSTINGDATE, 'dd-MON-yyyy hh:mi:ss AM') 
AS POSTINGDATE from feedback where USERID = $uid";
$stmt = oci_parse($dbconn, $ret);

oci_execute($stmt);

while ($row = oci_fetch_array($stmt)) {
?>


<table id="zctb" class="table table-bordered" cellspacing="0" width="100%" border="1">
    <tr>
        <td colspan="6" style="text-align:center; color:blue"><h4>Feedback Details</h4></td>
    </tr>
    <tr>
        <th>Feedback Registration Date</th>
        <td><?php echo $row['POSTINGDATE']; ?></td>
    </tr>
    <tr>
        <th>Accessibility to Warden </th>
        <td><?php echo $row['ACCESSIBILITYWARDEN']; ?></td>
    </tr>
    <tr>
        <th>Accessibility to Hostel Committee members </th>
        <td><?php echo $row['ACCESSIBILITYMEMBER']; ?></td>
    </tr>
    <tr>
        <th>Redressal of Problem </th>
        <td><?php echo $row['REDRESSALPROBLEM']; ?></td>
    </tr>
    <tr>
        <th>Room </th>
        <td><?php echo $row['ROOM']; ?></td>
    </tr>
    <tr>
        <th>Mess </th>
        <td><?php echo $row['MESS']; ?></td>
    </tr>
    <tr>
        <th>Hostel Surroundings (eg Lawn etc.) </th>
        <td><?php echo $row['HOSTELSURROUNDINGS']; ?></td>
    </tr>
    <tr>
        <th>Overall Rating </th>
        <td><?php echo $row['OVERALLRATING']; ?></td>
    </tr>
    <tr>
        <th>Feedback Message</th>
        <td><?php echo $row['FEEDBACKMESSAGE']; ?></td>
    </tr>
</table>

<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Loading Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>
<script>
    $(function () {
        $("[data-toggle=tooltip]").tooltip();
    });

    function CallPrint(strid) {
        var prtContent = document.getElementById("print");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
</body>

</html>
