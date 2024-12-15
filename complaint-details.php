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
    <title>Complaint Details</title>
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
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
            <?php include('includes/sidebar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row" id="print">

<?php   
$aid=$_SESSION['id'];
$cid=$_GET['cid'];
//$query = "select * from complaints where id=:cid and userId=:aid";
$query = "SELECT ID, COMPLAINNUMBER,COMPLAINTTYPE, COMPLAINTSTATUS, COMPLAINTDOC, COMPLAINTDETAILS,
TO_CHAR(REGISTRATIONDATE, 'dd-MON-yyyy hh:mi:ss AM') AS REGISTRATIONDATE
 FROM complaints where id=:cid and userId=:aid";

$stmt= oci_parse($dbconn, $query);
oci_bind_by_name($stmt, ':cid', $cid);
oci_bind_by_name($stmt, ':aid', $aid);
oci_execute($stmt);
$cnt=1;
while($row=oci_fetch_assoc($stmt))
      {
        ?>
                    <div class="col-md-12">
                        <h2 class="page-title" style="margin-top:3%">#<?php echo $row['COMPLAINNUMBER'];?> Details</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">#<?php echo $row['COMPLAINNUMBER'];?> Details</div>
                            <div class="panel-body">
            <table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1">
                                    
                         <span style="float:left" ><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span>           
                                    <tbody>


<tr>
<td colspan="6" style="text-align:center; color:blue"><h4>Complaint Realted Info</h4></td>
</tr>
<tr>
    <th>Complaint Number </th>
<td><?php echo $row['COMPLAINNUMBER'];?></td>
<th>Registration Date</th>
<td><?php echo $row['REGISTRATIONDATE'];?></td>
</tr>



<tr>
<th>Complaint Type </th>
<td><?php echo $row['COMPLAINTTYPE'];?></td>
<th>File (if any)</th>
<td><?php $cdoc=$row['COMPLAINTDOC'];
if($cdoc==''):
    echo "NA";
else: ?>
<a href="comnplaintdoc/<?php echo $cdoc;?>" target="blank">File</a>

<?php   endif;
?></td>

</tr>

<tr>
<th>Complaint Details</th>
<td colspan="3"><?php echo $row['COMPLAINTDETAILS'];?></td>

</tr>



<tr>
<th>Complaint Status </th>
<td  colspan="3"><?php $cstatus=$row['COMPLAINTSTATUS'];
if($cstatus==''):
    echo "New";
else:
echo $cstatus;
endif;  

?></td>
</tr>



<?php
$cnt=$cnt+1;
} ?>
</tbody>
</table>
<?php 
$query="select ID,COMPLAINTREMARK,COMPALINTSTATUS,TO_CHAR(POSTINGDATE, 'dd-MON-yyyy hh:mi:ss AM') AS POSTINGDATE from complainthistory where complaintid=:cid";
$stmt1= oci_parse($dbconn, $query);
oci_bind_by_name($stmt1, ':cid', $cid);
oci_execute($stmt1);
?>

<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1">

<tr>
    <th colspan="3" style="color:blue; font-size:18px; text-align:center">Complaint History</th>
</tr>
<tr>
    <th>Complaint Remark</th>
    <th>Complaint Status</th>
    <th>Posting Date</th>
</tr>
<?php 
while($row1=oci_fetch_assoc($stmt1))
      { ?>
<tr>

<td><?php echo $row1['COMPLAINTREMARK'];?></td>
<td><?php echo $row1['COMPALINTSTATUS'];?></td>
<td><?php echo $row1['POSTINGDATE'];?></td>
</tr>
<?php } ?>
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
 <script>
$(function () {
$("[data-toggle=tooltip]").tooltip();
    });
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0,menubar=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}
</script>
</body>

</html>
