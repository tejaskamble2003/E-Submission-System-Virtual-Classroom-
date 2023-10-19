
<!-- Main Code -->

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
		<div class="col-md-12">

			<h3> Welcome Teacher : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			<?PHP
		include( "database.php" );

$conn=new PDO('mysql:host=localhost; dbname=onlclassroom', 'root', '') or die(mysqli_error($conn));
// include( "database.php" );
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
 	$query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
	if($query){
		echo "
		<center>
		<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
		<strong><h3 style='margin-top: 10px;
		margin-bottom: 10px;'> File Uploaded Sucessfully.</h3>
		</strong>
		</div>
		</center>
		";
	// header("location:index1.php");
	}
	else{
	die(mysql_error());
	}
 }
}
?>		
			<fieldset>
				<legend>Add Filies</legend>
				<!-- <form action="" method="POST" name="AddAssessment"> -->
				<form enctype="multipart/form-data" action="" name="form" method="post">
					<table class="table table-hover">

						<!-- <tr>
							<td><strong>File Title  </strong>
							</td>
							<td>
								<input type="text" class="form-control" name="videotitle">
							</td>

						</tr> -->
						<tr>
							<td><strong>Select File</strong> </td>
							<td>
								<!-- <textarea name="VideoURL" class="form-control" rows="1" cols="150"></textarea> -->
								<input type="file" name="file" id="file" />
							</td>
						</tr>
						<!-- <tr>
							<td><strong>File Description</strong> </td>
							<td>
								<textarea name="Videoinfo" class="form-control" rows="5" cols="150"></textarea>
							</td>
						</tr> -->
						
						<td>
							<button type="submit" name="submit" class="btn btn-success" style="border-radius:0%">Upload File</button>
							<!-- <button type="submit" name="submit" id="submit" value="Submit" /> -->
						</td>
						
					</table>
				</form>
			</fieldset>
		</div>
	</div>
	
	<?php include('allfoot.php');  ?>