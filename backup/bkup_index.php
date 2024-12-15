<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

	$email2 = $_POST['email'];
    $password2 = $_POST['password'];

	$aid99 = $_POST['email'];

    $query = "SELECT email, password, id FROM userregistration WHERE (email = :email OR regNo = :email) AND password = :password";
	$query99 = "SELECT EMAIL FROM userregistration WHERE (email = :email OR regNo = :email) AND password = :password";
    $stm = oci_parse($dbconn, $query);
    oci_bind_by_name($stm, ":email", $email);
    oci_bind_by_name($stm, ":password", $password);
    oci_execute($stm);
    $row = oci_fetch_assoc($stm);

	
	$stm99 = oci_parse($dbconn, $query99);
    oci_bind_by_name($stm99, ":email", $email2);
    oci_bind_by_name($stm99, ":password", $password2);
	oci_execute($stm99);
	
	$email99 = null;
	$regno99 = null;
		if ($row99 = oci_fetch_assoc($stm99)) {
			$email99 = $row99['EMAIL'];
			$regno99 = $row99['REGNO'];
			echo "<script>alert($email99);</script>";
		}

   if($row){
        // If user is found, set session variables
        //$_SESSION['id'] = $_POST['email'];
		$_SESSION['id'] = $row['ID'];
        $_SESSION['login'] = $email;

        // Get user IP and location details
        $uip = $_SERVER['REMOTE_ADDR'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'];
        $country = $addrDetailsArr['geoplugin_countryName'];

		//Because running on local, cannot log ip address :(
		$ipmock = '102.165.3.0';
		$citymock = 'Kuala Lumpur';
		$countrymock = 'Malaysia';
		
        // Prepare and execute the query to log user activity
        $log = "INSERT INTO userlog (userId,useremail,userip,city,country,logintime) VALUES ('$aid99','$email99','$ipmock','$citymock','$countrymock',SYSTIMESTAMP)";
        $stm = oci_parse($dbconn, $log);
        oci_execute($stm);

        // Redirect to dashboard if logging is successful
        if ($stm) {
            header("location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Error logging user activity');</script>";
        }
   	} else {
        echo "<script>alert('Invalid Username/Email or password');</script>";
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
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
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
					
						<h2 class="page-title">User Login </h2>

						<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Registration Number</label>
									<input type="text" placeholder="Registration Number" name="email" class="form-control mb" required="true">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" required="true">
									

									<input type="submit" name="login" class="btn btn-primary btn-block" value="login" >
								</form>
							</div>
						</div>
						<div class="text-center text-light" style="color:black;">
							<a href="forgot-password.php" style="color:black;">Forgot password?</a>
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

</html>