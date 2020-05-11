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
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Online Exam Portal - Endeavor</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<style>
			body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #9e9e9e8f;
}

		</style>
		<script type="text/javascript">
function OpenWindow() {
    window.open('start1.php',
                'newwindow',
                config='height=670,width=1400,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');
}
</script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="StudentHome.php"><strong>CajobPortal.com


      </strong></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="StudentHome.php">Home</a></li>
        
        
        <li><a href="exam1.php">Exam</a></li>
        <li><a href="studentProfile.php">Profile</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
        
      </ul>
    </div>
  </div>
</nav>
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
										        <td><a onclick="OpenWindow()" class="btn btn-primary">enter</a></td>
										      </tr>
										<?php } ?>
									<?php endforeach; ?>
							    </tbody>
							</table>
					</div>
					<div id="active_test" class="well">
						<h3>Upcoming Tests</h3>
							<table class="table">
							    <thead>
							      <tr>
							        <th>Test Name</th>
							        <th>Subject</th>
							        <th>Starts on</th>
							      </tr>
							    </thead>
							    <tbody>
							    	<?php foreach ($results as $result):
										if(strtotime($result['sdatetime']) > strtotime(date("Y-m-d h:i:sa"))){ ?>
										      <tr>
										        <td><?php echo $result['test_name'];?></td>
										        <td><?php echo $result['subject']; ?></td>
										        <td><?php echo $result['sdatetime']; ?></td>
										      </tr>
										<?php } ?>
									<?php endforeach; ?>
							    </tbody>
							</table>
					</div>
				</div>
				<div class="col-lg-5">
					<div id="active_test" class="well">
						<h3>Past Tests</h3>
						<table class="table">
							    <thead>
							      <tr>
							        <th>Test Name</th>
							        <th>Subject</th>
							        <th>Ended on</th>
							        <th>Check Results</th>
							      </tr>
							    </thead>
							    <tbody>
							    	<?php foreach ($results as $result):
										if((strtotime($result['edatetime']) < strtotime(date("Y-m-d h:i:sa")))){ ?>
										      <tr>
										        <td><?php echo $result['test_name'];?></td>
										        <td><?php echo $result['subject']; ?></td>
										        <td><?php echo $result['edatetime']; ?></td>
										        
										      </tr>
										<?php } ?>
									<?php endforeach; ?>
							    </tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="background-color:  #333;">
    <hr />
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">About us</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">Product for Mac</a></li>
          <li><a href="#">Product for Windows</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">Web analytics</a></li>
          <li><a href="#">Presentations</a></li>          
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">Product Help</a></li>
          <li><a href="#">Developer API</a></li>
        </ul>
      </div>  
    </div>
  </div>
  <hr>
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills nav-justified">
                <li><a href="/">© 2013 Company Name.</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
    </div>
</div>
	</body>
</html>


