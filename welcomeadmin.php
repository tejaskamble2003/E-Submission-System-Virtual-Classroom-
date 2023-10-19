<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}
$userid = $_SESSION[ "umail" ];
?>
<!DOCTYPE  HTML>
<?php include('adminhead.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<!--Welcome page for admin-->
			<h3> Welcome <a href="welcomeadmin">HOD</a></h3>
			
			<a href="studentdetails"><button  href="" type="submit" class="btn btn-success" style="border-radius:0%"><i class="fa fa-graduation-cap"></i> Student Details</button></a>

			<a href="facultydetails"><button  href="" type="submit" class="btn btn-success" style="border-radius:0%"><i class="fa fa-users"></i> Teacher Details</button></a>

			<a href="guestdetails"><button  href="" type="submit" class="btn btn-success" style="border-radius:0%"><i class="fa fa-user"></i> Guest Details</button></a>

			<a href="logoutadmin"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%">Logout</button></a>

		</div>
	</div>
	<?php include('allfoot.php'); ?>