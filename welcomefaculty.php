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

		<div class="col-md-16 text-center">
			<!--Welcome page for faculty-->
			<h3> Welcome Teacher : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></h3>
			</a> 
			<a href="mydetailsfaculty.php?myfid=<?php echo $userid ?>"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-user"></i> My Profile</button></a>
			<a href="viewstudentdetails.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-graduation-cap"></i> Student Details</button></a>
			<a href="assessment.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-pencil-square"></i> Assessment Section</button></a>
			<a href="examDetails.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-file"></i> Publish Result</button></a>
			<a href="resultdetails.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-indent"></i>Result Sheet</button></a>
			<a href="qureydetails.php"> <button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-question"></i> Student's Query</button>
			<a href="videos.php"> <button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-video-camera"></i> Study Materials</button>
			  
			<a href="logoutfaculty"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%">Logout</button></a>

		</div>



	</div>
	<?php include('allfoot.php');  ?>