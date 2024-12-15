<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
include('includes/checklogin.php');
check_login();
$id = $_SESSION['id'];
echo $id;
if(isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contactno'];
    $udate = date('d-m-Y H:i', time());
    
    $query = "UPDATE USERREGISTRATION SET FIRSTNAME=:fname, MIDDLENAME=:mname, LASTNAME=:lname, GENDER=:gender, contactno=:contactno, UPDATIONDATE=:udate WHERE ID=:id";
    $query2 = "UPDATE REGISTRATION SET FIRSTNAME=:fname, MIDDLENAME=:mname, LASTNAME=:lname, GENDER=:gender, contactno=:contactno, UPDATIONDATE=:udate WHERE ID=:id";
    
    $stmt = oci_parse($dbconn, $query);
    $stmt2 = oci_parse($dbconn, $query2);

    oci_bind_by_name($stmt, ":fname", $fname);
    oci_bind_by_name($stmt, ":mname", $mname);
    oci_bind_by_name($stmt, ":lname", $lname);
    oci_bind_by_name($stmt, ":gender", $gender);
    oci_bind_by_name($stmt, ":contactno", $contactno);
    oci_bind_by_name($stmt, ":udate", $udate);
    oci_bind_by_name($stmt, ":id", $id);

    oci_bind_by_name($stmt2, ":fname", $fname);
    oci_bind_by_name($stmt2, ":mname", $mname);
    oci_bind_by_name($stmt2, ":lname", $lname);
    oci_bind_by_name($stmt2, ":gender", $gender);
    oci_bind_by_name($stmt2, ":contactno", $contactno);
    oci_bind_by_name($stmt2, ":udate", $udate);
    oci_bind_by_name($stmt2, ":id", $id);

    oci_execute($stmt);
    oci_execute($stmt2);
    echo "<script>alert('Profile updated Successfully');</script>";
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
    <title>Profile Updation</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
    <?php   
    $id = $_SESSION['id'];
    $udate = date('d-m-Y H:i', time());
        $query = "SELECT * FROM userregistration WHERE id=:id";
        $stmt = oci_parse($dbconn, $query);
        oci_bind_by_name($stmt, ":id", $id);
        oci_execute($stmt);
        while($row = oci_fetch_assoc($stmt)) {
    ?>  
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title"><?php echo $row['FIRSTNAME'];?>'s&nbsp;Profile </h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Last Updation date : &nbsp; <?php echo $row['UPDATIONDATE'];?> 
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Registration No : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php echo $row['REGNO'];?>" readonly="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">First Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row['FIRSTNAME'];?>"   required="required" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Middle Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row['MIDDLENAME'];?>"  >
                                                </div>
                                            </div>
											<div class="form-group">
												
    <label class="col-sm-2 control-label">Last Name : </label>
    <div class="col-sm-8">
        <input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row['LASTNAME'];?>" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Gender : </label>
    <div class="col-sm-8">
        <select name="gender" class="form-control" required="required">
            <option value="<?php echo $row['GENDER'];?>"><?php echo $row['GENDER'];?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Contact No : </label>
    <div class="col-sm-8">
        <input type="text" name="contactno" id="contact"  class="form-control" maxlength="10" value="<?php echo $row['CONTACTNO'];?>" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Email id: </label>
    <div class="col-sm-8">
        <input type="email" name="email" id="email"  class="form-control" value="<?php echo $row['EMAIL'];?>" readonly>
        <span id="user-availability-status" style="font-size:12px;"></span>
    </div>
</div>
<?php } ?>

<div class="col-sm-6 col-sm-offset-4">
    <input type="submit" name="update" Value="Update Profile" class="btn btn-primary">
</div>
</form>


									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
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
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</html>