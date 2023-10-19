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
		

		<div class="col-md-12">
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".				$userfname." ".$userlname."</span>";?> </a></h3>
			
		<?php 
			
			include('database.php');
			$sql="SELECT * FROM video";
			$rs=mysqli_query($connect,$sql);
			echo "<h2 class='page-header'>Videos Details</h2>";
			echo "<table class='table table-striped table-hover' style='width:100%'>
			<tr>
				<th>#</th>
				<th>Video Title</th>
				<th>Description</th>
				<th>View</th>		
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
				<?PHP echo $row['V_Title'];?>
			</td>
			<td>
				<?PHP echo $row['V_Remarks'];?>
			</td>
							
			<td><a href="viewvideos2.php?viewid=<?php echo $row['V_id']; ?>"> <input type="button" Value="View" style="border-radius:0%"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
			</td>
		</tr>
		<?php
		$count++;}
		?>	
		</table>
		
	</div>

		
	</div>
	<?php include('allfoot.php');  ?>