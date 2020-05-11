<?php require'database.php' ?>
<?php
  session_start();
  if(!isset($_SESSION['user_id'])){
  	header("Location: index.php");
  }
  $test_id = $_GET['var'];
  //session_start();
  $_SESSION['test_id'] = $test_id;
  $query = mysqli_query($conn,"SELECT * FROM test WHERE test_id='$test_id' ");
  $result = mysqli_fetch_array($query);
  $test_name=$result['test_name'];
  $test_duration=$result['test_duration'];
  $q_query=mysqli_query($conn,"SELECT * FROM questions WHERE test_id='$test_id' ");
  $q_result=mysqli_fetch_all($q_query, MYSQLI_ASSOC);
  $desc_query=mysqli_query($conn,"SELECT * FROM questions_desc WHERE test_id='$test_id' ");
  $desc_result=mysqli_fetch_all($desc_query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Online Exam Portal - Endeavor</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/solveTest.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/JavaScript">
//courtesy of BoogieJack.com
function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
document.onkeydown = function() {    
    switch (event.keyCode) { 
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false; 
        case 82 : //R button
            if (event.ctrlKey) { 
              
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            } 
    }
}

</script>
    <script>

    
    </script>
    
	</head>
  <body onLoad="timeout()">
    <div class="container">
    	<script type="text/javascript">
    	var timeLeft = 60 * <?php echo $test_duration; ?>;
    	</script><br>
    	<nav class="navbar navbar navbar-fixed-top" style="border:1px solid black;">
    		<div class="col-lg-8"><h1><?php echo $test_name; ?></h1></div>
    		<div class="col-lg-2"><h2 id="time" style="float:right";></h2></div>
    		<div class="col-lg-2"><h2>Minutes Left</h2></div>
    	</nav><br>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" data-target="#mcq">Multiple Choice Questions</a></li>
        
      </ul>
      <form id="quiz" method="post" action="showResult.php">
        <div class="tab-content">
          <div id="mcq" class="tab-pane in fade active">
          	<?php foreach ($q_result as $q_res): ?>
          	<table class="table table-striped">
          	    <thead>
          	      <tr>
          	        <th><?php echo $q_res['question'] ?></th>
          	      </tr>
          	    </thead>
          	    <tbody>
                  <tr>
                    <?php
                      if(strlen($q_res['image'])>10){ ?>
                        <img src="<?php echo $q_res['image'] ?>" style="max-height:500px;max-width:500px;"></img><br>
                    <?php  }?>
                  </tr>
          	      <tr>
          	        <td><input type="radio" value="a" name="<?php echo $q_res['question_id'] ?>">
          	        <?php echo $q_res['option_a'] ?></td>
          	      </tr>
          	      <tr>
          	        <td><input type="radio" value="b" name="<?php echo $q_res['question_id'] ?>">
          	        <?php echo $q_res['option_b'] ?></td>
          	      </tr>
          	      <tr>
          	        <td><input type="radio" value="c" name="<?php echo $q_res['question_id'] ?>">
          	        <?php echo $q_res['option_c'] ?></td>
          	      </tr>
          	      <tr>
          	        <td><input type="radio" value="d" name="<?php echo $q_res['question_id'] ?>">
          	        <?php echo $q_res['option_d'] ?></td>
                  </tr>
                  <tr>
          	        <td><input type="radio" hidden checked="checked" value="none" name="<?php echo $q_res['question_id'] ?>">
          	        </td>
          	      </tr>
          	    </tbody>
            	</table>
            	<hr>
          	<?php endforeach; ?>
          </div>
          <div id="desc" class="tab-pane fade">
            <?php foreach ($desc_result as $desc_res): ?>
              <h2><?php echo $desc_res['question'] ?></h2>
              <?php
                if(strlen($desc_res['image'])>10){ ?>
                  <img src="<?php echo $desc_res['image'] ?>" style="max-height:300px;max-width:400px;"></img><br>
              <?php  }?>
              <textarea class="form-control" name="<?php echo $desc_res['question_id'] ?>" placeholder="Write you code or answer here"></textarea>
              <hr>
            <?php endforeach; ?>
          </div>
        </div>
        <center>
          <input type="submit" name="submitTest" value="Submit Test" class="btn btn-danger" style="height: 40px; width:300px;">
        </center>
      </form>
    </div>
    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ATTENTION!!!!!!!!!</h4>
            </div>
            <div class="modal-body">
        <p>PLz submit the test otherwise your reasponses will not be recorded</p>
                <button onclick="openFullscreen();">Attempt</button>
                  
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#myModal").modal('show');
  });
var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
</script>
    
    <script type>function IsNewTab() {
  return $.cookie('TabOpen');
}

$(function() {
  if (!IsNewTab()) {
    $.cookie('TabOpen', "YES", {
      path: '/'
    });
    $(window).unload(function() {
      $.removeCookie('TabOpen', {
        path: '/'
      });
    });
  } else {
    alert('already some tab open')
      //OR
      //window.close()
  }
});
$(document).ready(function(){  
      $('input[type="radio"]').click(function(){  
           var question_id = $(this).data('question_id');  
           $.ajax({  
                url:"showResult.php",  
                method:"POST",  
                data:{question_id:question_id},  
                success:function(data){  
                      
                }  
           });  
      }); 
       setInterval(function(){   
           autoSave();   
           }, 1000);   
 });  
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
