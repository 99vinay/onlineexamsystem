<?php require'database.php' ?>
<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['admin_id'])){
	header("Location: adminHome.php");
}
$test_id=$_GET['var'];

$query = mysqli_query($conn,"SELECT user_id,score,time FROM test_result WHERE test_id='$test_id' ");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
$query_test = mysqli_query($conn,"SELECT user_id,username,email FROM users ");
$results_test = mysqli_fetch_all($query_test, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Online Exam</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<a href="adminHome.php" class="scroll" style="left:10px;top:10px;position:fixed;"><i class="fa fa-close fa-2x"></i></a>
		<br><br><br><br>
		<button onclick="window.print()">Print this page</button>
    <div class="container-fluid">
    	<div class="table-responsive">
			<table class="table">
        <thead>
          <tr>
						<th>Sr No.</th>
						<th>Name</th>
						<th>E-mail</th>
						<th>Marks</th>
						<th>Date nd Time</th>
            
          </tr>
        </thead>
        <tbody>
					<?php foreach ($results as $res): ?>
          <tr>
						<td>***</td>
						<?php foreach ($results_test as $result_test): ?>
							<?php if($res['user_id']==$result_test['user_id']){
									echo '<td>'.$result_test['username'].'</td>';
									echo '<td>'.$result_test['email'].'</td>';
								}
							?>
						<?php endforeach; ?>
            
            <td><?php echo number_format((float) $res['score'],2, '.', '').' %'; ?></td>
            <td><?php echo $res['time']; ?></td>
          </tr>
				<?php endforeach; ?>
        </tbody>
      </table>
		</div></div>
	</body>
</html>
