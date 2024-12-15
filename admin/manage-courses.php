<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from courses where id=:id";
	$stmt= oci_parse($dbconn, $adn);
	oci_bind_by_name($stmt, ':id', $id);
    oci_execute($stmt);
    oci_free_statement($stmt);	   
    echo "<script>alert('Data Deleted');</script>" ;
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
	<title>Manage Courses</title>
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
						<h2 class="page-title" style="margin-top:4%">Manage Course</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Courses Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Course Code</th>
											<th>Course Name(Short)</th>
											<th>Course Name(Full)</th>
											<th>Reg Date </th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sl No</th>
											<th>Course Code</th>
											<th>Course Name(Short)</th>
											<th>Course Name(Full)</th>
											<th>Regd Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$query="select ID,COURSE_CODE,COURSE_SN,COURSE_FN,TO_CHAR(POSTING_DATE, 'dd-MON-yyyy hh:mi:ss AM') AS POSTING_DATE from courses";
$stm= oci_parse($dbconn, $query);
oci_execute($stm);

$cnt=1;
while($row = oci_fetch_assoc($stm)) {
?>
    <tr>
        <td><?php echo $cnt++;?></td>
        <td><?php echo $row['COURSE_CODE'];?></td>
        <td><?php echo $row['COURSE_SN'];?></td>
        <td><?php echo $row['COURSE_FN'];?></td>
        <td><?php echo $row['POSTING_DATE'];?></td>
        <td>
            <a href="edit-course.php?id=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
            <a href="manage-courses.php?del=<?php echo $row['ID'];?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
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
