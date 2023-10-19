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
			include( "database.php" );
			$deleteid = $_GET[ 'deleteid' ];
			//delete faculty Query
			$sql = "DELETE FROM `facutlytable` WHERE FID = $deleteid";

			if ( mysqli_query( $connect, $sql ) ) {
				echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Teacher Details has been deleted.
					</div>";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Teacher Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
			//close the connection
			mysqli_close( $connect );
		}
		?>
	</div>


	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">HOD</a> </h3>
			<a href="addnewfaculty"><button type="button" value="Add New Faculty" class="btn btn-success btn-sm" style="border-radius:0%">Add New Teacher</button></a>
			<?php
			include( "database.php" );
			$sql = "SELECT * from  facutlytable";
			$result = mysqli_query( $connect, $sql );
			echo "<h3 class='page-header' >Teacher Details</h3>";
			echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
					<th>#</th>
					<th>FullName</th>
					<th>Father Name</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Joining Date</th>
					<th>City</th>
					<th>Phone Number</th>
					<th>Actions</th>
				<tr>";
				$count=1;
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $count;?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['Addrs'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['JDate'];?>
				</td>
				<td>
					<?PHP echo $row['City'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				
				<td><a href="updatefaculty.php?fid=<?php echo $row['FID']; ?>"><input type="button" Value="Edit" style="border-radius:0%" class="btn btn-success btn-sm"></a>
				<a href="facultydetails.php?deleteid=<?php echo $row['FID']; ?>"><input type="button" Value="Delete" style="border-radius:0%" class="btn btn-danger btn-sm"></a>
				</td>
			</tr>
			<?php $count++; } ?>
			</table>
			

		</div>
	</div>

	<?php include('allfoot.php'); ?>