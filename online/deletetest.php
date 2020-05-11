<?php require'database.php' ?>
<?php
	$test_id=$_GET['var'];
	$sql = "DELETE FROM test WHERE test_id='$test_id'";

if ($conn->query($sql) === TRUE) {
   header("Location: adminHome.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
	

