<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
}


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Vaccine Information</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Update Vaccine Information
						<button class="btn" align="center"> 
                        <a href="addvaccine.php" class="btn">Add Vaccine Information</a>
                        </button>
						</h1>
                    
                
				

<?php 
	
	$client_id  =$brandID= $name  = $vaccineType = $Efficacy = $profileImage ="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		
		$name            = $_POST["name"];
		$vaccineType      = $_POST["vaccineType"];
		$Efficacy             = $_POST["Efficacy"];
	
        $profileImage = basename($_FILES["fileToUpload"]["name"]);
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a act
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "Cliensts profile picture uploaded- " . $check["mime"] . "."; echo '</br>';
				$uploadOk = 1;
			} else {
				echo "File is not an image."; echo '</br>';
				$uploadOk = 0;
			}
		
		// Check file size
		$uploadOk == 1;
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";  echo '</br>';
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";   echo '</br>';
			}
		}

	}
	$sql = "UPDATE vaccinebrand set brandID='$brandID', name='$name',  vaccineType='$vaccineType', Efficacy='$Efficacy' , profileImage='$profileImage' where brandID='$brandID'";
		
		if ($conn->query($sql) === true) {
			echo "Record updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		
?>

	

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>



