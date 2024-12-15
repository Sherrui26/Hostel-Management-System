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
    <title>Access Log</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <?php include('includes/sidebar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title" style="margin-top: 2%">Access Log</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">All Courses Details</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>User Id</th>
                                            <th>User Email</th>
                                            <th>IP</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Login Time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>User Id</th>
                                            <th>User Email</th>
                                            <th>IP</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Login Time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php    
$aid=$_SESSION['id'];

$query2 = "SELECT * FROM userregistration WHERE id = $aid";
$stm2 = oci_parse($dbconn, $query2);
oci_execute($stm2);
if ($row2 = oci_fetch_assoc($stm2)) {
    $myid = $row2['REGNO'];
}
$query = "SELECT USERID, USEREMAIL, USERIP, CITY, COUNTRY, TO_CHAR(LOGINTIME, 'dd-MON-yyyy hh:mi:ss AM') AS LOGINTIME FROM userlog WHERE userId = $myid";
$stm = oci_parse($dbconn, $query);
oci_execute($stm);
$cnt = 1;
while($row = oci_fetch_assoc($stm)) {
?>
    <tr>
        <td><?php echo $cnt++;?></td>
        <td><?php echo $row['USERID'];?></td>
        <td><?php echo $row['USEREMAIL'];?></td>
        <td><?php echo $row['USERIP'];?></td>
        <td><?php echo $row['CITY'];?></td>
        <td><?php echo $row['COUNTRY'];?></td>
        <td><?php echo $row['LOGINTIME'];?></td>
    </tr>
<?php
}
oci_free_statement($stm);
?>
                                    </tbody>
                                </table>
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

</body>

</html>
