<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}
$query = mysqli_query($conn,"SELECT * FROM test");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
		<title>Online Exam Portal - Endeavor</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<script type="text/javascript"></script>
</head>
<body>
	<h3 class="text-center">"INSTRUCTIONS FOR THE TEST"</h3>
	<p class="text-center"> * If u don't <strong> submit your test then your answers will not be recorded and it will get  you a 0.</strong> </p>
    <p class="text-center"> * The timing of the test will be calculated in   <strong>minutes and seconds format.</strong></p>
	<p class="text-center"> * Attempt all questions in <strong>given period of time.</strong></p>
	<p class="text-center">* All questions are Compulsory</p>
	
<div class="container">
            <h1>TESTS</h1>
            <div class="row">
                <div class="col-lg-7">
                    <div id="active_test" class="well">
                        <h3>Active Tests</h3>
                        <table class="table">
                                <thead>
                                  <tr>
                                    <th>Test Name</th>
                                    <th>Subject</th>
                                    <th>Ends on</th>
                                    <th>Start Test</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $result):
                                        if((strtotime($result['sdatetime']) <= strtotime(date("Y-m-d h:i:sa")))  && (strtotime($result['edatetime']) > strtotime(date("Y-m-d h:i:sa")))  ){ ?>
                                              <tr>
                                                <td><?php echo $result['test_name'];?></td>
                                                <td><?php echo $result['subject']; ?></td>
                                                <td><?php echo $result['edatetime']; ?></td>
                                                <td><a href="solveTest.php?var=<?php echo $result['test_id'];?>" class="btn btn-primary">Start Test</a></td>
                                              </tr>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
</body>
</html>