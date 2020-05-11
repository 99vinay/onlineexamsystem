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
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
			body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #9e9e9e8f;
}

.hero-image {
  background-image: url("images/exam.jpg");
  background-color: #cccccc;
  height: 400px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: black;
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
		<nav class="navbar navbar-inverse navbar-fixed-top">
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
     <div class="hero-image">
  <div class="hero-text">
    <p><strong>CajobPortal.COM</strong></p>
    <p><strong>Advanced Examination System</strong></p>
    
  </div>
</div>

                       
                    </div>
                    </div>
                </div>
            </div>
            <div class="container" style="padding-top: 20px;">
  <div class="jumbotron col-sm-4">
    <h1>Cajobportal</h1>      
    <p>cajobportal - India's first recruitment website exclusively for CA, CS, CMA and MBA(Finance) launched by a group of Chartered Accountants and IIM Ahmedabad ...
</p>
  </div>
  <div class="jumbotron col-sm-4">
    <h1>Cajobportal</h1>      
    <p>cajobportal - India's first recruitment website exclusively for CA, CS, CMA and MBA(Finance) launched by a group of Chartered Accountants and IIM Ahmedabad ...
</p>
  </div>
  <div class="jumbotron col-sm-4">
    <h1>Cajobportal</h1>      
    <p>cajobportal - India's first recruitment website exclusively for CA, CS, CMA and MBA(Finance) launched by a group of Chartered Accountants and IIM Ahmedabad ...
</p>
  </div>
  
       
</div>
    <div class="container">
  
  
  <!-- Left-aligned media object -->
  <div class="media">
    <div class="media-left">
      <img src="images/anu.jpg" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Left-aligned</h4>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
    </div>
  </div>
  <hr>
  
  <!-- Right-aligned media object -->
  <div class="media">
    <div class="media-body">
      <h4 class="media-heading">Right-aligned</h4>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
    </div>
    <div class="media-right">
      <img src="images/anu.jpg" class="media-object" style="width:60px">
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
