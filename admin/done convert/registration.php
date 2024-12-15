<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['submit'])) {
    $roomno = $_POST['room'];
    $seater = $_POST['seater'];
    $feespm = $_POST['fpm'];
    $foodstatus = $_POST['foodstatus'];
    $stayfrom = $_POST['stayf'];
    $duration = $_POST['duration'];
    $course = $_POST['course'];
    $regno = $_POST['regno'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contact'];
    $emailid = $_POST['email'];
    $emcntno = $_POST['econtact'];
    $gurname = $_POST['gname'];
    $gurrelation = $_POST['grelation'];
    $gurcntno = $_POST['gcontact'];
    $caddress = $_POST['address'];
    $ccity = $_POST['city'];
    $cstate = $_POST['state'];
    $cpincode = $_POST['pincode'];
    $paddress = $_POST['address'];
    $pcity = $_POST['city'];
    $pstate = $_POST['state'];
    $ppincode = $_POST['ppincode'];

    $result = "SELECT count(*) FROM userRegistration WHERE email=:email OR regNo=:regno";
    $stmt = oci_parse($dbconn, $result);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':regno', $regno);
    oci_execute($stmt);
    $row = oci_fetch_assoc($stmt);
    $count = $row['COUNT(*)'];
    oci_free_statement($stmt);

    if($count > 0) {
        echo "<script>alert('Registration number or email id already registered.');</script>";
    } else {
        $query = "INSERT INTO registration(roomno, seater, feespm, foodstatus, stayfrom, duration, course, regno, firstName, middleName, 
        lastName, gender, contactno, emailid, egycontactno, guardianName, guardianRelation, guardianContactno, corresAddress, corresCIty, 
        corresState, corresPincode, pmntAddress, pmntCity, pmnatetState, pmntPincode) VALUES 
        (:roomno, :seater, :feespm, :foodstatus, TO_DATE(:stayfrom, 'YYYY-MM-DD'), :duration, :course, :regno, :fname, :mname, 
        :lname, :gender, :contactno, :emailid, :emcntno, :gurname, :gurrelation, :gurcntno, :caddress, :ccity, :cstate, :cpincode, :paddress, :pcity, 
        :pstate, :ppincode)";

        $stmt = oci_parse($dbconn, $query);
        oci_bind_by_name($stmt, ':roomno', $roomno);
        oci_bind_by_name($stmt, ':seater', $seater);
        oci_bind_by_name($stmt, ':feespm', $feespm);
        oci_bind_by_name($stmt, ':foodstatus', $foodstatus);
        oci_bind_by_name($stmt, ':stayfrom', $stayfrom);
        oci_bind_by_name($stmt, ':duration', $duration);
        oci_bind_by_name($stmt, ':course', $course);
        oci_bind_by_name($stmt, ':regno', $regno);
        oci_bind_by_name($stmt, ':fname', $fname);
        oci_bind_by_name($stmt, ':mname', $mname);
        oci_bind_by_name($stmt, ':lname', $lname);
        oci_bind_by_name($stmt, ':gender', $gender);
        oci_bind_by_name($stmt, ':contactno', $contactno);
        oci_bind_by_name($stmt, ':emailid', $emailid);
        oci_bind_by_name($stmt, ':emcntno', $emcntno);
        oci_bind_by_name($stmt, ':gurname', $gurname);
        oci_bind_by_name($stmt, ':gurrelation', $gurrelation);
        oci_bind_by_name($stmt, ':gurcntno', $gurcntno);
        oci_bind_by_name($stmt, ':caddress', $caddress);
        oci_bind_by_name($stmt, ':ccity', $ccity);
        oci_bind_by_name($stmt, ':cstate', $cstate);
        oci_bind_by_name($stmt, ':cpincode', $cpincode);
        oci_bind_by_name($stmt, ':paddress', $paddress);
        oci_bind_by_name($stmt, ':pcity', $pcity);
        oci_bind_by_name($stmt, ':pstate', $pstate);
        oci_bind_by_name($stmt, ':ppincode', $ppincode);
        oci_execute($stmt);
        oci_free_statement($stmt);

        $query1 = "INSERT INTO userregistration(regNo, firstName, middleName, lastName, gender, contactNo, email, password) VALUES (:regno, :fname, :mname, :lname, :gender, :contactno, :emailid, :contactno)";
        $stmt1 = oci_parse($dbconn, $query1);
        oci_bind_by_name($stmt1, ':regno', $regno);
        oci_bind_by_name($stmt1, ':fname', $fname);
        oci_bind_by_name($stmt1, ':mname', $mname);
        oci_bind_by_name($stmt1, ':lname', $lname);
        oci_bind_by_name($stmt1, ':gender', $gender);
        oci_bind_by_name($stmt1, ':contactno', $contactno);
        oci_bind_by_name($stmt1, ':emailid', $emailid);
        oci_execute($stmt1);
        oci_free_statement($stmt1);

        echo "<script>alert('Student Successfully registered');</script>";
    }
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
	<title>Student Hostel Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											

										<div class="form-group">
    <label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Room no. </label>
    <div class="col-sm-8">
        <select name="room" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
            <option value="">Select Room</option>
            <?php 
                $query ="SELECT * FROM rooms";
                $stm = oci_parse($dbconn, $query);
                oci_execute($stm);
                while($row = oci_fetch_assoc($stm)) {
            ?>
            <option value="<?php echo $row['ROOM_NO'];?>"><?php echo $row['ROOM_NO'];?></option>
            <?php } ?>
        </select> 
        <span id="room-availability-status" style="font-size:12px;"></span>
    </div>
</div>
											
<div class="form-group">
    <label class="col-sm-2 control-label">Seater</label>
    <div class="col-sm-8">
        <input type="text" name="seater" id="seater"  class="form-control" readonly="true"  >
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Fees Per Month</label>
    <div class="col-sm-8">
        <input type="text" name="fpm" id="fpm"  class="form-control" readonly="true">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Food Status</label>
    <div class="col-sm-8">
        <input type="radio" value="0" name="foodstatus" checked="checked"> Without Food
        <input type="radio" value="1" name="foodstatus"> With Food(RM150.00 Per Month Extra)
    </div>
</div>	

<div class="form-group">
    <label class="col-sm-2 control-label">Stay From</label>
    <div class="col-sm-8">
        <input type="date" name="stayf" id="stayf"  class="form-control" >
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Duration</label>
    <div class="col-sm-8">
        <select name="duration" id="duration" class="form-control">
            <option value="">Select Duration in Month</option>
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label"><h4 style="color: green" align="left">Personal info </h4> </label>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">course </label>
    <div class="col-sm-8">
        <select name="course" id="course" class="form-control" required> 
            <option value="">Select Course</option>
            <?php 
                $query ="SELECT * FROM courses";
                $stm = oci_parse($dbconn, $query);
                oci_execute($stm);
                while($row = oci_fetch_assoc($stm)) {
            ?>
            <option value="<?php echo $row['COURSE_FN'];?>"><?php echo $row['COURSE_FN'];?>&nbsp;&nbsp;(<?php echo $row['COURSE_SN'];?>)</option>
            <?php } ?>
        </select> 
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Registration No : </label>
    <div class="col-sm-8">
        <input type="text" name="regno" id="regno"  class="form-control" required="required"  onBlur="checkRegnoAvailability()">
        <span id="user-reg-availability" style="font-size:12px;"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">First Name : </label>
    <div class="col-sm-8">
        <input type="text" name="fname" id="fname" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Middle Name : </label>
    <div class="col-sm-8">
        <input type="text" name="mname" id="mname" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Last Name : </label>
    <div class="col-sm-8">
        <input type="text" name="lname" id="lname" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Gender : </label>
    <div class="col-sm-8">
        <select name="gender" class="form-control" required="required">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Contact No : </label>
    <div class="col-sm-8">
        <input type="text" name="contact" id="contact" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Email id : </label>
    <div class="col-sm-8">
        <input type="email" name="email" id="email" class="form-control" onBlur="checkAvailability()" required="required">
        <span id="user-availability-status" style="font-size:12px;"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Emergency Contact: </label>
    <div class="col-sm-8">
        <input type="text" name="econtact" id="econtact" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Guardian  Name : </label>
    <div class="col-sm-8">
        <input type="text" name="gname" id="gname" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Guardian  Relation : </label>
    <div class="col-sm-8">
        <input type="text" name="grelation" id="grelation" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Guardian Contact no : </label>
    <div class="col-sm-8">
        <input type="text" name="gcontact" id="gcontact" class="form-control" required="required">
    </div>
</div>  

<div class="form-group">
    <label class="col-sm-3 control-label"><h4 style="color: green" align="left">Correspondence Address </h4></label>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Address : </label>
    <div class="col-sm-8">
        <textarea rows="5" name="address" id="address" class="form-control" required="required"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">City : </label>
    <div class="col-sm-8">
        <input type="text" name="city" id="city" class="form-control" required="required">
    </div>
</div>  

<div class="form-group">
    <label class="col-sm-2 control-label">State </label>
    <div class="col-sm-8">
        <select name="state" id="state" class="form-control" required> 
            <option value="">Select State</option>
            <?php
            $query = "SELECT * FROM states";
            $stm = oci_parse($dbconn, $query);
            oci_execute($stm);

            while($row = oci_fetch_assoc($stm)) {
            ?>
            <option value="<?php echo $row['STATE'];?>"><?php echo $row['STATE'];?></option>
            <?php
            }
            oci_free_statement($stm);
            ?>
        </select>
    </div>
</div>

			

<div class="form-group">
<label class="col-sm-2 control-label">Pincode : </label>
<div class="col-sm-8">
<input type="text" name="ppincode" id="ppincode"  class="form-control" required="required">
</div>
</div>	


<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
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
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
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
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
	<script>
function checkRegnoAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'regno='+$("#regno").val(),
type: "POST",
success:function(data){
$("#user-reg-availability").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>