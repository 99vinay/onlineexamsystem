<?php
//subjects
$subjects_result = mysqli_query($conn,'SELECT * FROM subjects');
$subjects = mysqli_fetch_all($subjects_result, MYSQLI_ASSOC);
	if(isset($_POST['add_subject'])){
		$subject = $_POST['subject'];
		$add_subject = "INSERT INTO subjects(subject) VALUES('$subject')";
		mysqli_query($conn,$add_subject);
		header("Location: adminHome.php");
	}


//tests
$tests_result = mysqli_query($conn,'SELECT * FROM test');
$tests = mysqli_fetch_all($tests_result, MYSQLI_ASSOC);

//new-test
	if(isset($_POST['add_test'])){
		$test_name = $_POST['test_name'];
		$subject = $_POST['subject'];
		$sdatetime = $_POST['sdatetime'];
		$edatetime = $_POST['edatetime'];
		$test_duration = $_POST['test_duration'];
		$attempts = $_POST['attempts'];
		$yes_no = $_POST['yes_no'];
		$add_test = " INSERT INTO test(subject, test_name, sdatetime, edatetime, test_duration, attempts, yes_no) VALUES('$subject','$test_name','$sdatetime','$edatetime','$test_duration','$attempts','$yes_no') ";
		mysqli_query($conn,$add_test);
		header("Location: adminHome.php");
}

//search-users
$searchusers_result = mysqli_query($conn,'SELECT * FROM users');
$usernames = mysqli_fetch_all($searchusers_result, MYSQLI_ASSOC);

//settings

