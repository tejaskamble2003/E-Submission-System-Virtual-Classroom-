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
			
			<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			//getting data from another page
			$deleteid = $_GET[ 'deleteid' ];
			$sql = "DELETE FROM `examdetails` WHERE ExamID = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
						<br><br>
						<div class='alert alert-success fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> Assessment details deleted.
						</div>
						";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Assessment Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		//close the connection
		mysqli_close( $connect );
		?>
			
			<?php 
				
				include('database.php');
				$sql="SELECT * FROM examdetails";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Assessment Details</h2>";
				echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Ques.1</th>
					<th>Ques.2</th>
					<th>Ques.3</th>
					<th>Ques.4</th>
					<th>Ques.5</th>
					<th>Actions</th>		
				</tr>";
				$cnt = 1;
				while($row=mysqli_fetch_array($rs))
				{
				?>
			<tr>
				<td>
					<?PHP echo $cnt;?>
				</td>
				<td>
					<?PHP echo $row['ExamName'];?>
				</td>
				<td>
					<?PHP echo $row['Q1'];?>
				</td>
				<td>
					<?PHP echo $row['Q2'];?>
				</td>
				<td>
					<?PHP echo $row['Q3'];?>
				</td>
				<td>
					<?PHP echo $row['Q4'];?>
				</td>
				<td>
					<?PHP echo $row['Q5'];?>
				</td>
				
				<td><a href="manageassessment.php?deleteid=<?php echo $row['ExamID']; ?>"> <input type="button" Value="Delete"  class="btn btn-danger btn-sm" style="border-radius:0%"  data-toggle="modal" data-target="#myModal"></a>
				<a href="manageassessment2.php?editassid=<?php echo $row['ExamID']; ?>"> <input type="button" Value="Edit"  class="btn btn-success btn-sm" style="border-radius:0%"  data-toggle="modal" data-target="#myModal"></a>
				
				</td>
			</tr>
			<?php
		$cnt++;	}
			?>	
			</table>

		
			
		</div>
	</div>
	<?php include('allfoot.php');  ?>