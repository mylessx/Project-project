<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 8px 12px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
	
}


input[type=submit]:hover {
    background-color: #45a049;
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
.dis {
	pointer-events: none;
	cursor: default;
	color:#595959;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client's Status</title>
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
$username = $_SESSION["username"];
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
             
                    <div class="col-md-12">
                    
                        <h1 class="page-head-line">Client's Status</h1>
                        
                    
                
                <!-- /. ROW  -->
<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$client_id = $_GET["client_id"];
	}
	            //   PRINTS CLIENT's info
	$sql = "SELECT * from client where patientID='$client_id'";
	$result = $conn->query($sql);
	$policy_id = "";
	$agent_id="";
	   
?>
			
<?php
	while($row = $result->fetch_assoc()) {
?>
<?php
		echo "<label for=\"fname\">CLIENT ID</label>";
	    echo "<input disabled type=\"text\" client_id=\"fname\" name=\"client_id\" placeholder=\"clients id..\" value=\"$row[patientID]\">";

		echo "<label for=\"fname\">GENDER</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"gender\" placeholder=\"clients gender..\" value=\"$row[gender]\">";

        echo "<label for=\"fname\">AGE</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"age\" placeholder=\"clients age..\" value=\"$row[age]\">";

        echo "<label for=\"fname\">DATE VACCINATED (1st Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"dateVaccinated\" placeholder=\"date Vaccinated..\" value=\"$row[dateVaccinated]\">";

		echo "<label for=\"fname\">VACCINE BRAND (1st Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"brandname\" placeholder=\"brand name..\" value=\"$row[brandname]\">";

        echo "<label for=\"fname\">SIDE EFFECTS (1st Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"side_effects\" placeholder=\"side effects..\" value=\"$row[side_effects]\">";

		echo "<label for=\"fname\">STATUS (1st Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"status\" placeholder=\"clients status..\" value=\"$row[status]\">";

        echo "<label for=\"fname\">FACILITY (1st Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"facname\" placeholder=\"facility name..\" value=\"$row[facname]\">";

        echo "<label for=\"fname\">Medical History</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"medicalhistory\" placeholder=\"medical history..\" value=\"$row[medicalhistory]\">";

        echo "<label for=\"fname\">DATE VACCINATED (2nd Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"dateVaccinated2\" placeholder=\"date Vaccinated (2nd Shot)..\" value=\"$row[dateVaccinated2]\">";

		echo "<label for=\"fname\">VACCINE BRAND (2nd Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"brandname2\" placeholder=\"brand name (2nd Shot)..\" value=\"$row[brandname2]\">";

		echo "<label for=\"fname\">SIDE EFFECTS (2nd Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"side_effects2\" placeholder=\"side effects (2nd Shot)..\" value=\"$row[side_effects2]\">";

		echo "<label for=\"fname\">STATUS (2nd Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"status2\" placeholder=\"clients status (2nd Shot)..\" value=\"$row[status2]\">";

        echo "<label for=\"fname\">FACILITY (2nd Shot)</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"facname2\" placeholder=\"facility name (2nd Shot)..\" value=\"$row[facname2]\">";
    }
		echo "<br>\n";
		
	    echo "<br>\n";
	
	
	
	echo "</table>\n";



echo "\n";


	
?>

                </div>
               
            	
        </div>
        <button type=“button”><a href=addClient2.php>Add Second Shot</a></button>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
