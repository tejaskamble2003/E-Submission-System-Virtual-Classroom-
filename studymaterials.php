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
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			
		<h2 class='page-header'>Files Details</h2>
		<table class='table table-striped table-hover' style='width:100%'>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
            $conn=new PDO('mysql:host=localhost; dbname=onlclassroom', 'root', '') or die(mysqli_error($conn));
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<!-- <button  class="btn btn-success btn-sm" value="Download" style="border-radius:0%" data-toggle="modal" data-target="#myModal"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>"></a></button><br><br> -->
                    <a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>"><input type="button" Value="Download"  class="btn btn-success btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a><br><br>
                    <!-- <a href="#.php?deleteid=<?php echo $row['V_id']; ?>"> <input type="button" Value="View"  class="btn btn-info btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a><br><br> -->
				    <!-- <a href="managevideos2.php?editassid=<?php echo $row['V_id']; ?>"> <input type="button" Value="Edit"  class="btn btn-success btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a><br> -->
				</td>
			</tr>
			<?php }?>
		</table>
	<?php include('allfoot.php');  ?>