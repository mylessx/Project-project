<!DOCTYPE html>

<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left:2%;
	display:block;
	float: center;
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
	margin-left:0%;
	font-size:110%;
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
.searchBar {
	float: auto;
	cursor: pointer;
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}
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

.searchBar {
	float: auto;
	cursor: pointer;
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>

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
                        <h1 class="page-head-line">Search Results  			
						</h1>
						
						<div class= "searchBar">
		  <form action="search.php" method="post">
          <input type="text" name="key"><br>
          <input class="searchBtn" type="submit" value="SEARCH">
		  </br>
          </form>
	  </div>
						
						
						
                    </div>
                </div>
                
                <!-- /. ROW  -->
<?php
	
	   $key       = $_POST["key"];

	   ///////    SEARCHES IN CLIENTS
	   
         $sql="SELECT * FROM client WHERE patientID LIKE '%" . $key .  "%' OR age LIKE '%" . $key ."%' OR gender LIKE '%" . $key ."%'
         OR status LIKE '%" . $key ."%' OR brandname LIKE '%" . $key ."%' OR side_effects LIKE '%" . $key ."%' OR facname LIKE '%" . $key ."%'
         OR status2 LIKE '%" . $key ."%' OR brandname2 LIKE '%" . $key ."%' OR side_effects2 LIKE '%" . $key ."%' OR facname2 LIKE '%" . $key ."%'";  
		 $result = $conn->query($sql);
	if ($result->num_rows > 0) {
				
        echo "<table class=\"table\">\n";
        echo "  <tr>\n";
        echo "    <th>ClientID</a></th>\n";
        echo "    <th>Gender</a></th>\n";
        echo "    <th>Age</a></th>\n";
        echo "    <th>Date Vaccinated (1st Shot)</a></th>\n";
        echo "    <th>Vaccine Brand (1st Shot)</a></th>\n";
        echo "    <th>Side Effect/s (1st Shot)</a></th>\n";
        echo "    <th>Status (1st Shot)</a></th>\n";
        echo "    <th>Facility (1st Shot)</a></th>\n";
        echo "    <th>Medical History</a></th>\n";
        echo "    <th>Date Vaccinated (2nd Shot)</a></th>\n";
        echo "    <th>Vaccine Brand (2nd Shot)</a></th>\n";
        echo "    <th>Side Effect/s (2nd Shot)</a></th>\n";
        echo "    <th>Status (2nd Shot)</a></th>\n";
        echo "    <th>Facility (2nd Shot)</a></th>\n";
        echo "  </tr>";
   
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["patientID"]."</td>\n";
		echo "    <td>".$row["gender"]."</td>\n";
		echo "    <td>".$row["age"]."</td>\n";
		echo "    <td>".$row["dateVaccinated"]."</td>\n";
        echo "    <td>".$row["brandname"]."</td>\n";
        echo "    <td>".$row["side_effects"]."</td>\n";
        echo "    <td>".$row["status"]."</td>\n";
		echo "    <td>".$row["facname"]."</td>\n";
        echo "    <td>".$row["medicalhistory"]."</td>\n";
        echo "    <td>".$row["dateVaccinated2"]."</td>\n";
        echo "    <td>".$row["brandname2"]."</td>\n";
        echo "    <td>".$row["side_effects2"]."</td>\n";
        echo "    <td>".$row["status2"]."</td>\n";
		echo "    <td>".$row["facname2"]."</td>\n";
		echo "    <td>"."<a href='addClient2.php?client_id=".$row["patientID"]. "'>2nd Shot</a>"."</td>\n";
        

		if($row["patientID"]== $username){
			echo "<td>"."<a href='editClient.php?client_id=".$row["client_id"]. "'></a>"."</td>\n"; 
		}
	   }	 
	  }else{ echo"Nothing found in Clients Table";echo"<br>";  echo"<br>"; 
	  }
	   
$conn->close();
?>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    
    

	
</body>
</html>
