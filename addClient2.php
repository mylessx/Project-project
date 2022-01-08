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
    <title>Edit Client</title>

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
                        <h1 class="page-head-line">Fill 2nd Shot Information
						</h1>
                    </div>
                </div>
                
                <!-- /. ROW  -->
<?php 

	
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$client_id = $_GET["client_id"];	
	}
	
	//                       checking if agent is authorized to edit or not  
	
	
	$sql = "SELECT * from client where patientID='$client_id'";
	if($result = $conn->query($sql)){
	
	  echo "<div>\n";
	 
	
	while($row = $result->fetch_assoc()) {
		
?>


<form action="insertClient2.php" method="post" enctype="multipart/form-data">


<?php

        echo "<br>";
        echo "<label for=\"fname\">CLIENT ID:</label>";
        echo "<input type=\"text\" client_id=\"fname\" name=\"patientID\" placeholder=\"clients id..\" value=\"$row[patientID]\"readonly>";
        echo "<br>";
        echo "<br>";
        echo "<label for=\"fname\">Date Vaccinated (2nd Shot): </label>";
	    echo "<input type=\"date\" client_id=\"fname\" name=\"dateVaccinated2\" placeholder=\"Vaccination Date (2nd Shot)..\" value=\"$row[dateVaccinated2]\">";
        echo "<br>";
		echo "<br>";
        echo "<label for=\"fname\">Vaccine Brand (2nd Shot): </label>";
		echo "<input type=\"text\" client_id=\"fname\" name=\"brandname2\" placeholder=\"Vaccine brand (2nd Shot)..\" value=\"$row[brandname2]\">";
        echo "<br>";
        echo "<br>";
		echo "<label for=\"fname\">Side Effect/s (2nd Shot): </label>";
		echo "<input type=\"text\" client_id=\"fname\" name=\"side_effects2\" placeholder=\"Side Effect (2nd Shot)..\" value=\"$row[side_effects2]\">";
        echo "<br>";
        echo "<br>";
		echo "<label for=\"fname\">Status (2nd Shot): </label>";
		echo "<input type=\"text\" client_id=\"fname\" name=\"status2\" placeholder=\"clients Status (2nd Shot)..\" value=\"$row[status2]\">";
        echo "<br>";
        echo "<br>";
        echo "<label for=\"fname\">Facility Name (2nd Shot): </label>";
		echo "<input type=\"text\" client_id=\"fname\" name=\"facname2\" placeholder=\"facility name (2nd Shot)...\" value=\"$row[facname2]\">";
        
		
		

		
		
		?>
			<input type="submit" value="UPDATE" name="submit">
			</form>
		<?php

	

echo "</div>\n";
echo "\n";
    }
}
	
	
	
?>
            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


	
</body>
</html>