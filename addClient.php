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
    <title>Add Client</title>
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
$uniqueId  = time();
$uniqueId2 = time().'-'.mt_rand();

$resultset = $conn->query("SELECT facilityname FROM facility");
$resultset2 = $conn->query("SELECT distinct(name) FROM vaccinebrand");
$resultset3 = $conn->query("SELECT facilityname FROM facility");
$resultset4 = $conn->query("SELECT distinct(name) FROM vaccinebrand");
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Client</h1>
						
                    
                

<form action="insertClient.php" method="post" enctype="multipart/form-data">

<br>Date Vaccinated (1st Shot): <input type="date" name="dateVaccinated" required><br>

<br>Age:            <br><input type="number" name="age" required><br>

<br>Gender:          <input type="text" name="gender" required><br>
</select>

<br>Vaccine Brand (1st Shot): <select name = "vaccinebrand">
<?php
while($row = $resultset2->fetch_assoc()){
    $name = $row['name'];
    echo" <option value = '$name'> $name</option>";
}
?>
</select><br>

<br>Side Effect/s (1st Shot):      <input type="text" name="side_effects" required><br>

<br>Status (1st Shot):  <input type="text" name="status" required><br>

<br>Facility Name (1st Shot): <select name = "facility">
<?php
while($row = $resultset->fetch_assoc()){
    $facilityname = $row['facilityname'];
    echo" <option value = '$facilityname'> $facilityname</option>";
}
?>
</select><br>

<br>Medical History (1st Shot): <input type="text" name="medicalhistory" required><br>

<input type="submit">

</form>
				
				

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
