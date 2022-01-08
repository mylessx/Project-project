<?php
	session_start();
	include 'connection.php';
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["username"];
		$password = $_POST["password"];
	}
	
	$sql = "SELECT agent_password from agent where agent_id='$username'";
	$result = $conn->query($sql);        

    while($row = $result->fetch_assoc()) {
	if($password == $row["agent_password"]){
			echo "welcome you have successfully logeed in";
			$_SESSION["username"] = $username;
			header("Location: home.php");
		}
    }
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
  
		$query = "INSERT INTO users (username, email, password) 
				  VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}
  
  
  // ... 
  if (isset($_POST['login_user'])) {
	  $username = mysqli_real_escape_string($db, $_POST['username']);
	  $password = mysqli_real_escape_string($db, $_POST['password']);
	
	  if (empty($username)) {
		  array_push($errors, "Username is required");
	  }
	  if (empty($password)) {
		  array_push($errors, "Password is required");
	  }
	
	  if (count($errors) == 0) {
		  $password = md5($password);
		  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		  $results = mysqli_query($db, $query);
		  if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		  }else {
			  array_push($errors, "Wrong username/password combination");
		  }
	  }
	
  }
	?>