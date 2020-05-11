<?php require'database.php'?>
<?php include 'adminHomeContent.php'?>
<?php
session_start();
if(!isset($_SESSION['admin_id'])){
   header("Location:admin.php");
}
$admin_id = $_SESSION['admin_id'];
if(isset($_POST['add_role']))
{
 $username=$_POST['username'];
 $password=$_POST['password'];
$sql=mysqli_query($conn,"SELECT * from admin_users");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con="INSERT INTO admin_users(username,password,role) VALUES('$username','$password','administrator')";
mysqli_query($conn,$con);
}     
}
?>
<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/searchUser.js"></script>
        <style>/*
    DEMO STYLE
*/
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
    font-family: 'Poppins', sans-serif;
   background:  #ccddff;
 
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

i, span {
    display: inline-block;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */
.wrapper {
    display: flex;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7a6079;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    min-width: 80px;
    max-width: 80px;
    text-align: center;
}

#sidebar.active .sidebar-header h3, #sidebar.active .CTAs {
    display: none;
}

#sidebar.active .sidebar-header strong {
    display: block;
}

#sidebar ul li a {
    text-align: left;
}

#sidebar.active ul li a {
    padding: 20px 10px;
    text-align: center;
    font-size: 0.85em;
}

#sidebar.active ul li a i {
    margin-right:  0;
    display: block;
    font-size: 1.8em;
    margin-bottom: 5px;
}

#sidebar.active ul ul a {
    padding: 10px !important;
}

#sidebar.active a[aria-expanded="false"]::before, #sidebar.active a[aria-expanded="true"]::before {
    top: auto;
    bottom: 5px;
    right: 50%;
    -webkit-transform: translateX(50%);
    -ms-transform: translateX(50%);
    transform: translateX(50%);
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #7a6079;
}

#sidebar .sidebar-header strong {
    display: none;
    font-size: 1.8em;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}
#sidebar ul li a i {
    margin-right: 10px;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}


a[data-toggle="collapse"] {
    position: relative;
}

a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
    content: '\e259';
    display: block;
    position: absolute;
    right: 20px;
    font-family: 'Glyphicons Halflings';
    font-size: 0.6em;
}
a[aria-expanded="true"]::before {
    content: '\e260';
}


ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article, a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}



/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */
#content {
    padding:20px ;
    width: 100%;
    min-height: 100vh;
    transition: all 0.3s;
}


/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */
@media (max-width: 768px) {
    #sidebar {
        min-width: 80px;
        max-width: 80px;
        text-align: center;
        margin-left: -80px !important ;
    }
    a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
        top: auto;
        bottom: 5px;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
    }
    #sidebar.active {
        margin-left: 0 !important;
    }

    #sidebar .sidebar-header h3, #sidebar .CTAs {
        display: none;
    }

    #sidebar .sidebar-header strong {
        display: block;
    }

    #sidebar ul li a {
        padding: 20px 10px;
    }
    #sidebar img{
        width: 40px;
        height: 40px;
    }

    #sidebar ul li a span {
        font-size: 0.85em;
    }
    #sidebar ul li a i {
        margin-right:  0;
        display: block;
    }

    #sidebar ul ul a {
        padding: 10px !important;
    }

    #sidebar ul li a i {
        font-size: 1.3em;
    }
    #sidebar {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}
</style>
<script type="text/javascript" src="js/searchUser.js"></script>
    </head>
    <body>



        <div class="wrapper" class="col-md-4">
            
            <nav id="sidebar">
                <div class="sidebar-header">
                     
                    <h3>Admin</h3>
                     
                </div>

                <ul class="list-unstyled components">
                    <li class="">
                     <a data-toggle="tab" data-target="#subjects"><span class="glyphicon glyphicon-book"></span>&emsp;Subjects</a></li>
                   
                 <li class="">
                     <a data-toggle="tab" data-target="#tests"><span class="glyphicon glyphicon-th-list"></span>&emsp;Tests</a></li>
                    <li class="">
                     <a data-toggle="tab" data-target="#new-test"><span class="glyphicon glyphicon-pencil"></span>&emsp;New Test</a></li>
                    <li class="">
                     <a data-toggle="tab" data-target="#search-users"><span class="glyphicon glyphicon-search"></span>&emsp;Search User</a></li>
                    <li class="">
                     <a data-toggle="tab" data-target="#settings"><span class="glyphicon glyphicon-cog"></span>&emsp;Settings</a></li>
                   <li class="">
                     <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&emsp;Logout</a></li>
                   <li class="">
                     <a href="password.php"><span class="glyphicon glyphicon-log-out"></span>&emsp;Password</a></li>
                   
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span >Slider</span>
                            </button>
                        </div>
                           <h4 style="text-align: center;font-family: serif;"><strong>CajobPortal.com</strong></h4>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">

                                
                                
                            </ul>
                            
                        </div>
                         
                    </div>
                </nav>

       <div id="content" class="col-md-8">
            <div class="tab-content">

<div id="subjects" class="tab-pane in fade active">
    <h3>Subjects</h3><br><br>
    <ul class="list-group">
    <?php foreach($subjects as $subject) : ?>
        <li class="list-group-item"><?php echo $subject['subject']; ?></li>
    <?php endforeach; ?>
    </ul>
    <br><br><br><br>
    <form method="post" action="">
        <input class="form-control" type="text" name="subject" placeholder="Add New Subject" required><br>
        <input type="submit" name="add_subject" value="Add" class="btn btn-danger btn-block">
    </form>
</div>

<div id="tests" class="tab-pane fade" class="col-md-8">
    <h3>Tests</h3>
    <div class="table-responsive">  
    <table class="table">
        <thead>
            <tr>
                <th>Test Name</th>
                <th>Subject</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Add Questions</th>
                                <th>Participants</th>
                                <th>Delete Test</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $test): ?>
                    <tr>
                        <td><?php echo $test['test_name'];?></td>
                        <td><?php echo $test['subject']; ?></td>
                        <td><?php echo $test['sdatetime']; ?></td>
                        <td><?php echo $test['edatetime']; ?></td>
                        <td><a href='editTest.php?var=<?php echo $test['test_id']; ?> ' class="btn btn-primary">Add Question</a></td>
                            <td><a href='Participants.php?var=<?php echo $test['test_id']; ?> ' class="btn btn-info">Participants</a></td>
                            <td><a href='deletetest.php?var=<?php  echo $test['test_id']; ?> ' class="btn btn-danger">Delete</a></td>
                      </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<div id="new-test" class="tab-pane fade">
<h3>Create Test</h3>
<form method="post" action="">
        <div class="form-group">
            <input class="form-control" type="text" name="test_name" required placeholder="Test Name" style="width: 300px;border-radius: 44px;">
        </div>
        <div class="form-group">
            <select name="subject" class="form-control" id="sel1" style="width: 300px;border-radius: 44px;">
                <option>Select Subject</option>
                <?php foreach($subjects as $subject) : ?>
                    <option value="<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-inline form-group">
            <input class="form-control" type="datetime-local" name="sdatetime" style="width: 300px;border-radius: 44px;">
            Start Date and Time
        </div>
        <div class="form-inline form-group">
            <input class="form-control" type="datetime-local" name="edatetime" style="width: 300px;border-radius: 44px;">
            End Date and Time
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="test_duration" placeholder="Duration in Minutes" style="width: 300px;border-radius: 44px;">
        </div>
        <!--------
        <div class="form-group">
            <input class="form-control" type="number" name="attempts" placeholder="No of attempts allowed" style="width: 300px;">
        </div>
        <div class="form-group">
            <select name="yes_no" class="form-control" id="sel1" style="width: 300px;">
                <option disabled>Show Immediate Results</option>
                <option>Yes</option>
                <option>No</option>
          </select>
        </div>------------->
        <br>
        <input type="submit" name="add_test" value="Create Test" class="btn btn-danger" style="height: 40px; width:300px;">
</form>
<p>* Note: After creating test go to Tests to add questions.</p>
</div>

<div id="search-users" class="tab-pane fade">
    <h3>Search User</h3>
    <div class="search-box">
         <input class="form-control"  style="width: 70%; border-radius: 44px;" id="myInput" type="text" placeholder="Search..">
            
    </div>
    
    <br>
             <div class="table-responsive">
            <table class="table table-bordered" style="width: 70%;">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>View Test Results</th>
                        <th>Delete User</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php $i=1; foreach($usernames as $username) : ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $username['username']; ?></td>
                            <td><?php echo $username['email']; ?></td>
                            <td><a class="btn btn-info" href='viewProfile.php?user_id= <?php echo $username['user_id']; ?> ' >View Results<a></td>
                            <td><a href='deleteUser.php?user_id= <?php echo $username['user_id']; ?> ' class="btn btn-danger">Delete User</a></td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
        </table>
</div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div id="settings" class="tab-pane fade">
    <h3>Settings</h3><br>
      
        <br><hr>
        <form class="form-inline" method="post" action="">
            <div class="form-group">Add new role:&emsp;<input class="form-control" type="text" name="username" placeholder="Name....."  required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><select class="form-control" name="role"><option>Admin</option><option>Instructor</option></select></div>
            <input class="btn btn-success" type="submit" name="add_role" value="Save" >
        </form>

</div>


            </div>

        </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <script src="jquery-3.4.1.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>




