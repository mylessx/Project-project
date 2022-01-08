<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 10px 13px;
    margin: 3px 0;
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
    <title>Edit Vaccine Brand</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
	   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php include 'header.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Vaccine Brand Information  
						<button class="btn" align="center"> 
						<a href="addvacc.php" class="btn">Add Vaccine Brand</a>
						</button>
						</h1>
                    </div>
                </div>
                
                <!-- /. ROW  -->
                <form action="updatevaccine.php" method="post" enctype="multipart/form-data">
				
<?php 

   include'connection.php';
	
   if($_SERVER["REQUEST_METHOD"] == "GET"){
		
    $client_id = $_GET["client_id"];	
}
	
	
	$sql = "SELECT * from vaccinebrand where brandID='$client_id'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updatevaccine.php" method="post">';
	   
	while($row = $result->fetch_assoc()) {
		
		echo "<label for=\"brandID\">Vaccine Brand ID</label>";
	    echo "<input type=\"text\"  value=\"$row[brandID]\"readonly>";
		echo "<input type=\"text\" client_id=\"fname\" name=\"name\" placeholder=\"clients id..\" value=\"$row[name]\">";
		//echo "<label for=\"name\">NAME</label>";
	    //echo "<input type=\"text\" value=\"$row[name]\">";
		echo "<label for=\"vaccineType\">Vaccine Type</label>";
		echo "<input type=\"text\" value=\"$row[vaccineType]\">";
		echo "<label for=\"efficacy\">Efficacy Rate</label>";
		echo "<input type=\"text\" value=\"$row[efficacy]\">";
        echo "<label for=\"profileImage\">Select Image</label>\n";
        echo "<td><img src='uploads/".$row['profileImage']. "  'width='150' height='150'></td>";
        ?>
        <input class="img" type="file" name="fileToUpload"/ required> </br>
		<?php

    }
	
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
    echo "<a href='deleteVaccine.php?client_id=".$client_id."'>Delete Vaccine Brand</a>";

	echo "</form>\n";
	
	
	
	
echo "</div>\n";
echo "\n";

	
?>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
   
	
</body>
</html>
