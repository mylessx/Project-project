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
.searchBox{
    
    cursor: pointer;
	font-size: 85%;
	
}

</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clients</title>

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
                        <h1 class="page-head-line">Clients Information
                      
						
						
		  
				
					
				     
						   
						<button class="btn" align="center"> 
						<a href="addClient.php" class="btn">Add Client</a>
						</button>
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
<?php
    
    
    if(isset($_GET['order'])){
        $order = $_GET['order'];
    }else{
        $order = 'patientID';
    }

    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
    }else{
        $sort = 'ASC';
    }

	$result = $conn->query($sql = "SELECT DISTINCT * 
    FROM client ORDER BY $order $sort " );
	
    if ($result->num_rows > 0) {
    $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th><a href='?order=patientID&&sort=$sort'>ClientID</a></th>\n";
    echo "    <th><a href='?order=gender&&sort=$sort'>Gender</a></th>\n";
    echo "    <th><a href='?order=age&&sort=$sort'>Age</a></th>\n";
    echo "    <th><a href='?order=dateVaccinated&&sort=$sort'>Date Vaccinated (1st shot)</a></th>\n";
    echo "    <th><a href='?order=brandname&&sort=$sort'>Vaccine Brand (1st shot)</a></th>\n";
    echo "    <th><a href='?order=side_effects&&sort=$sort'>Side Effect/s (1st shot)</a></th>\n";
    echo "    <th><a href='?order=status&&sort=$sort'>Status (1st shot)</a></th>\n";
    echo "    <th><a href='?order=facname&&sort=$sort'>Facility (1st shot)</a></th>\n";
    echo "    <th><a href='?order=medicalhistory&&sort=$sort'>Medical History</a></th>\n";
    echo "    <th><a href='?order=dateVaccinated2&&sort=$sort'>Date Vaccinated (2nd shot)</a></th>\n";
    echo "    <th><a href='?order=brandname2&&sort=$sort'>Vaccine Brand (2nd shot)</a></th>\n";
    echo "    <th><a href='?order=side_effects2&&sort=$sort'>Side Effect/s (2nd shot)</a></th>\n";
    echo "    <th><a href='?order=status2&&sort=$sort'>Status (2nd shot)</a></th>\n";
    echo "    <th><a href='?order=facname2&&sort=$sort'>Facility (2nd shot)</a></th>\n";
    echo "  </tr>";
	
    // output data of each row
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
		echo "<td>"."<a href='editClient.php?client_id=".$row["patientID"]. "'>Edit</a>"."</td>\n";
		

	}
	}
?>

    <!-- /. SEARCH  -->
    <div class= "searchBar">
		  <form action="search.php" method="post">
          <input type="text" name="key"><br>
          <input class="searchBtn" type="submit" value="SEARCH">
		  </br>
          </form>
	  </div>
            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>
