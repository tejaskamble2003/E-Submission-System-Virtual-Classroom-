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
		<div class="col-md-3"></div>

		<div class="col-md-6">


			<h3> Welcome Teacher : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<?php 

			include('database.php');
			$editid=$_GET['editid'];
			//below query will print existing record of result details
			$sql="select * from result where RsID=$editid";
			$result=mysqli_query($connect,$sql);

			while($row=mysqli_fetch_array($result))
			{ 
			?>
			<form action="" method="POST" name="update">
				<fieldset>
					<legend>Update Result Details</legend>
					<div class="form-group">
						Result ID :
						<?php echo $row['RsID']; ?>
					</div>
					<div class="form-group">
						Enrolment Number :
						<?php echo $row['Eno']; ?>
					</div>
					<div class="form-group">
						Marks :
						<select class="form-control" value="" name="marks" required>
							<option value="<?PHP echo $row['Marks'];?>"><?PHP echo $row['Marks'];?> (Current Result)</option>
							<option value="Pass">Pass</option>
							<option value="Fail">Fail</option>
							<option value="Under Progress">Under Progress</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Update Result" name="update" class="btn btn-success" style="border-radius:0%">
					</div>
					<?php
					}
					?>
				</fieldset>
			</form>

			<?php 
if(isset($_POST['update']))		
{
$tempmarks=$_POST['marks'];	

$sql="UPDATE `result` SET Marks='$tempmarks' WHERE RsID=$editid"; 

if (mysqli_query($connect, $sql)) {
echo "
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Result has been updated.
";
} else {
//below statement will print error if SQL query fail.
echo "<br><Strong>Result Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);
}
//for close connection
mysqli_close($connect);

} 


?>

		</div>


		<div class="col-md-3"></div>

	</div>
	<?php include('allfoot.php');  ?>