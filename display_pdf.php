<!-- <?php require_once('database.php');
    // $conn=new PDO('mysql:host=localhost; dbname=demo', 'root', '') or die(mysql_error());
?> 
<?php 
    // $conn=new PDO('mysql:host=localhost; dbname=demo', 'root', '') or die(mysql_error());
    // $id = $_GET['id']; // ID of entry you wish to view.  To use this enter "view.php?id=x" where x is the entry you wish to view. 

    // $query ="SELECT demo, upload FROM file where id = $id"; //Find the file, pull the filecontents and the filetype
    // $result = mysqli_query($query);    // run the query

    // if($row=mysql_fetch_row($result)) // pull the first row of the result into an array(there will only be one)
    // {
    //     $data = $row[0];    // First bit is the data
    //     $type = $row[1];    // second is the filename

    //     Header( "Content-type: $type"); // Send the header of the approptiate file type, if it's' a image you want it to show as one :)
    //     print $data; // Send the data.
    // }
    // else // the id was invalid
    // {
    //     echo "invalid id";
    // }
    // if($row=mysql_fetch_row($result)) // pull the first row of the result into an array(there will only be one)
    // {
    //     $data = $row[0];    // First bit is the data
    //     $type = $row[1];    // second is the filename

    //     Header( "Content-type: $type"); // Send the header of the approptiate file type, if it's' a image you want it to show as one :)
    //     print $data; // Send the data.
    // }
    // else // the id was invalid
    // {
    //     echo "invalid id";
    // }
?> -->

<!-- Display  file logic -->
<?php
				// Delete Files
				$conn=new mysqli('localhost','root','','onlclassroom') or die(mysqli_error($conn));
			if ( isset( $_REQUEST[ 'id' ] ) ) {

				//getting data from another page
				$id = $_GET[ 'id' ];
			    $sql = "SELECT FROM `upload` WHERE id = $id";
				$conn->query("SELECT FROM `upload` WHERE id = '$id'");
                $rs=mysqli_query($conn,$sql);
			// 	
            if($row=mysqli_fetch_row($rs)) // pull the first row of the result into an array(there will only be one)
            {
                $data = $row[0];    // First bit is the data
                $type = $row[1];    // second is the filename

                Header( "Content-type: $type"); // Send the header of the approptiate file type, if it's' a image you want it to show as one :)
                print $data; // Send the data.
            }
            else // the id was invalid
            {
                echo "invalid id";
            }
            }
?>