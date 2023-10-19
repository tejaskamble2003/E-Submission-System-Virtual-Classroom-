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
			<?php
			include( "database.php" );
			if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
				$deleteid = $_GET[ 'deleteid' ];
				//below query will delete result details form result table
				$sql = "DELETE FROM `result` WHERE RsID = $deleteid";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "
	<br><br>
	<div class='alert alert-success fade in'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<strong>Success!</strong> Result details deleted.
	</div>
	";
				} else {
					//error message if SQL query fails
					echo "<br><Strong>Result Details Deletion Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
			}

			mysqli_close( $connect );
			?>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3> Welcome Teacher : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

				<?php 

				include('database.php');
				$sql="SELECT * FROM result";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Result Details</h2>";
				echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
				<th>Result ID</th>
				<th>Enrolment No.</th>
				<th>Result</th>
				<th>Actions</th>		
				</tr>";
				while($row=mysqli_fetch_array($rs))
				{
				?>
				<tr>
		<td>
		<?php echo $row['RsID'];?>
		</td>
		<td>
		<?php echo $row['Eno'];?>
		</td>
		<td>
		<?php if($row['Marks'] == 'Pass') { echo '<div style="color:green;"><b>'.$row['Marks'];} else if($row['Marks'] == 'Fail') { echo '<div style="color:red;"><b>'.$row['Marks'];} else { echo '<b>'.$row['Marks'];}?>
		</td>
		<td><a href="updateresultdetails.php?editid=<?php echo $row['RsID']; ?>"><input type="button" Value="Edit" class="btn btn-success btn-sm" style="border-radius:0%"></a>
		<a href="resultdetails.php?deleteid=<?php echo $row['RsID']; ?>"><input type="button" Value="Delete" class="btn btn-danger btn-sm" style="border-radius:0%"></a>
		</td>
				</tr>

				<?php
				}
				?>



				</table>
			</div>

		</div>

		<?php include('allfoot.php');  ?>