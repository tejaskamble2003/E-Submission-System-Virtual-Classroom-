<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			<?php 

				include('database.php');
				
				//below query will print the existing record of Assessment
				$sql="SELECT * FROM examdetails";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Take Assessment</h2>";
				echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
				<th>#</th>
				<th>Asses. Name</th>
				<th>Action</th>					
				</tr>";
				$count=1;
				while($row=mysqli_fetch_array($rs))
				{
			?>
			<tr>
				<td>
					<?PHP echo $count;?>
				</td>
				<td>
					<?PHP echo $row['ExamName'];?>
				</td>
				<td>
					<a href="takeassessment2.php?exid=<?php echo $row['ExamID']; ?>"> <button type="submit" class="btn btn-success" style="border-radius:0%">Start</button></a>
				</td>
			</tr>
			<?php
		$count++;	}
			?>
			</table>
			
		</div>

		<div class="col-md-2"></div>
	</div>
	<?php include('allfoot.php'); ?>