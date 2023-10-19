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
				$seno=$_GET['seno'];
				//below query will print the existing record of result
				$sql="SELECT * FROM result WHERE Eno='$seno'";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Result View</h2>";
				echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
				<th>#</th>
				<th>Result ID</th>
				<th>Enrolment Number</th>
				<th>Marks</th>

				</tr>";
				$count=1;
				while($row=mysqli_fetch_array($rs))
				{
				?>
			<tr>
				<td>
					<?php echo $count;?>
				</td>
				<td>
					<?php echo $row['RsID'];?>
				</td>
				<td>
					<?php echo $row['Eno'];?>
				</td>
				
				<td>
					<?php if($row['Marks'] == 'Pass') { echo '<div style="color:green;"><b>'.$row['Marks'];} else { echo '<div style="color:red;"><b>'.$row['Marks'];}?>
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