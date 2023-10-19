<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}

$userid = $_SESSION[ "umail" ];
?>
<?php include('adminhead.php'); ?>
<div class="container">
	<div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
			$deleteid = $_GET[ 'deleteid' ];
			//below will delete a particular student
			$sql = "DELETE FROM `studenttable` WHERE Eno = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
				<br><br>
				<div class='alert alert-success fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Student details deleted.
				</div>
				";
			} else {
				echo "<br><Strong>Student Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		mysqli_close( $connect );
		?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">HOD</a> </h3>
			<a href="addnewstudent"><button type="button" value="AddNewStudent" class="btn btn-success btn-sm" style="border-radius:0%">Add New Student</button></a>
			<?php
			include( "database.php" );
			$sql = "SELECT * from  studenttable";
			$result = mysqli_query( $connect, $sql );
			echo "<h2 class='page-header'>Student Details</h2>";
			
			//below will print all student details to admin
			echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
				<th>#</th>
				<th>Enrolment</th>
				<th>Name</th>
				<th>Father's Name</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Course</th>
				<th>DOB</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Action</th>		
				</tr>";
				$count=1;
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?php echo $count;?>
				</td>
				<td>
					<?php echo $row['Eno'];?>
				</td>
				<td>
					<?php echo $row['FName'];?> <?php echo $row['LName'];?>
				</td>
			
				<td>
					<?php echo $row['FaName'];?>
				</td>
				<td>
					<?php echo $row['Addrs'];?>
				</td>
				<td>
					<?php echo $row['Gender'];?>
				</td>
				<td>
					<?php echo $row['Course'];?>
				</td>
				<td>
					<?php echo $row['DOB'];?>
				</td>
				<td>
					<?php echo $row['PhNo'];?>
				</td>
				<td>
					<?php echo $row['Eid'];?>
				</td>
				
				<td><a href="updatestudent.php?eno=<?php echo $row['Eno']; ?>"><input type="button" Value="Edit" class="btn btn-success btn-sm" style="border-radius:0%"></a>
				<a href="studentdetails.php?deleteid=<?php echo $row['Eno']; ?>"><input type="submit" Value="Delete" name="delete" class="btn btn-danger btn-sm" style="border-radius:0%"></a>
				</td>
			</tr>
			<?php $count++; } ?>
			</table>
			
		</div>
	</div>
	<?php include('allfoot.php'); ?>