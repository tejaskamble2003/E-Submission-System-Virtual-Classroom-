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
				// Delete Files
				$conn=new PDO('mysql:host=localhost; dbname=onlclassroom', 'root', '') or die(mysqli_connect_error($conn));
			if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

				//getting data from another page
				$deleteid = $_GET[ 'deleteid' ];
				$sql = "DELETE FROM `upload` WHERE id = $deleteid";
				$conn->query("DELETE FROM `upload` WHERE id = '$deleteid'");
				// $result = mysqli_query($conn, $sql);
				// if($result){
				if ( mysqli_query($conn,$sql ) ) {
					echo "<br><Strong>File Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $conn );
					// echo "
					// 		<br><br>
					// 		<div class='alert alert-success fade in'>
					// 		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					// 		<strong>Success!</strong> File details deleted.
					// 		</div>
					// 		";
				} else {
					//error message if SQL query fails
					// echo "<br><Strong>File Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $conn );
					echo "
							<center>
							<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
							<strong><h3 style='margin-top: 10px;
							margin-bottom: 10px;'> File Deleted Sucessfully.</h3>
							</strong>
							</div>
							</center>
							";
				}
			}
			// mysqli_close( $conn );
			?>
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
				    <!-- <a href="display_pdf.php?id=<?php echo $row['id']; ?>"> <input type="button" Value="View"  class="btn btn-info btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a><br><br> -->
                    <a href="managefiles.php?deleteid=<?php echo $row['id']; ?>"> <input type="button" Value="Delete"  class="btn btn-danger btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a>
				</td>
			</tr>
			<?php }?>
		</table>
	<?php include('allfoot.php');  ?>