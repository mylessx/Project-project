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
    <title>Insert Client</title>
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
                        <h1 class="page-head-line">Insert Client
						<button class="btn" align="center"> 
                        <a href="addclient.php" class="btn">Add Client</a>
                        </button>
						</h1>
                    
                
				
				
<?php
   		$gender             = $_POST["gender"];
        $status             = $_POST["status"];
        $age                = $_POST["age"];
        $dateVaccinated     = $_POST["dateVaccinated"];
        $side_effects       = $_POST["side_effects"];
        $brandname          = $_POST["vaccinebrand"];
        $facname            = $_POST["facility"];
        $facility           = $_POST["facility"];
        $medicalhistory     = $_POST["medicalhistory"];
 
        
        
		

	$sql = "INSERT INTO client "."VALUES('', '$gender', '$status', '$age', '$dateVaccinated', '$side_effects', '$brandname', '$facname', 
    '$medicalhistory' ,'' ,'','','','')";
    


	if ($conn->query($sql) === true) {
			echo "New Client ADDED";  echo '</br>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;  echo '</br>';
		}


        $sql2 = "UPDATE facility SET administered = administered + 1 WHERE facilityname = '$facility' ";
    


        if ($conn->query($sql2) === true) {
                echo "Facility completed";  echo '</br>';
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;  echo '</br>';
            }
     

?>



			

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
