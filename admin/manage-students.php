<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
    $id=intval($_GET['del']);
    $adn="DELETE FROM registration WHERE regNo=$id";
    $adn2="DELETE from userregistration where regno=$id";
    $stmt= oci_parse($dbconn, $adn);
    $stmt2= oci_parse($dbconn, $adn2);
    oci_bind_by_name($stmt, ':id', $id);
    //oci_bind_by_name($stmt2, ':id', $id);
    oci_execute($stmt);
    oci_execute($stmt2);
    oci_free_statement($stmt);
    oci_free_statement($stmt2);
    echo '<script>alert("Data had been deleted successfully.")</script>'; 
}
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
    <title>Manage Registred Students</title>
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
                        <h2 class="page-title" style="margin-top: 4%">Manage Registered Students</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">All Room Details</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Student Name</th>
                                            <th>Reg no</th>
                                            <th>Contact no </th>
                                            <th>Room no </th>
                                            <th>Seater </th>
                                            <th>Staying From </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Student Name</th>
                                            <th>Reg no</th>
                                            <th>Contact no </th>
                                            <th>Room no </th>
                                            <th>Seater </th>
                                            <th>Staying From </th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php   
$aid=$_SESSION['id'];
$query="select * from registration";
$stm= oci_parse($dbconn, $query);
oci_execute($stm);

$cnt=1;
while($row = oci_fetch_assoc($stm)) {
?>
                                        <tr>
                                            <td><?php echo $cnt++;?></td>
                                            <td><?php echo $row['FIRSTNAME']." ".$row['MIDDLENAME']." ".$row['LASTNAME'];?></td>
                                            <td><?php echo $row['REGNO'];?></td>
                                            <td><?php echo $row['CONTACTNO'];?></td>
                                            <td><?php echo $row['ROOMNO'];?></td>
                                            <td><?php echo $row['SEATER'];?></td>
                                            <td><?php echo $row['STAYFROM'];?></td>
                                            <td>
                                                <a href="student-details.php?regno=<?php echo $row['REGNO'];?>"
                                                    title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
                                                <a href="manage-students.php?del=<?php echo $row['REGNO'];?>"
                                                    title="Delete Record"
                                                    onclick="return confirm('Do you want to delete');"><i
                                                        class="fa fa-close"></i></a>
                                            </td>
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
