<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">

			<h3> Welcome Teacher : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			<a href="index1.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%">Add Files</button></a>
			<a href="managefiles.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%">Manage Files</button></a>
			<a href="addvideos.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%">Add Videos</button></a>
			<a href="managevideos.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%">Manage Videos</button></a>
			</div>
	</div>
	<?php include('allfoot.php');  ?>