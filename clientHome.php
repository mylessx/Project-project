<!DOCTYPE html>
<html>
<head>
<?php
	session_start();
	include'connection.php';
	
	$username = $_SESSION["username"];
?>
<style>
input[type=text], select {
    width: 100%;
    padding: 8px 12px;
    margin: 2px 0;
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


<?php 
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "lims";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("User/password is wrong");
  if($conn){
   
  }
?>   

<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['value_occurrence', 'brandname'],
         <?php
         $sql = "SELECT       `brandname`,
         COUNT(`brandname`) AS `value_occurrence` 
FROM     `client`
GROUP BY `brandname`
ORDER BY `value_occurrence` DESC
";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['brandname']."',".$result['value_occurrence']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Most used Vaccines'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['side_effects', 'value_occurrence'],
         <?php
         $sql = "SELECT       `side_effects`,
         COUNT(`side_effects`) AS `value_occurrence` 
FROM     `client`
GROUP BY `side_effects`
ORDER BY `value_occurrence` DESC";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['side_effects']."',".$result['value_occurrence']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Most Recorded Side Effects'
        };

        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
      }
    </script>


  </head>



<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
	
            <div class="navbar-header">
                	
                <a class="navbar-brand" href="index.php">Vaccine Distribution </a>
            </div>

            <div class="header-right">
			
                 <a href="<?php echo "logout.php" ?>" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                
								  <?php
									
										echo "welcome, ".$_SESSION["username"];
									
								?>
								
                            <br />
                              
                            </div>
                        </div>

                    </li>    
                     
                </ul>

            </div>
		

        </nav>
		 
		  
	

                
                <!-- /. ROW  -->

			 <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                    
        <h1 class="page-head-line">Statistics
						
						</h1>


			
		<!-- /. SEARCH  -->


		<!-- /. SEARCH  -->
				
				<br>
				<br>
				
				<!-- /. ROW  -->
                
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <i class="fa fa-user fa-5x""></i>
                                <h5>
								<?php
				                     $sql = "SELECT count(*) AS c FROM client";
	                                 $result = $conn->query($sql);
		
	                                 while($row = $result->fetch_assoc()) {
				                     echo "Clients Vaccinated: ";
	                                 echo $row["c"];
	                                 }
				                     ?>
								</h5>
                            </a>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                               <i class="fa fa-user-md fa-5x"></i>
                                <h5>
								<?php
				                     $sql = "SELECT  distinct(name) AS c FROM vaccinebrand";
	                                 $result = $conn->query($sql);
                                     $sql2 = "SELECT  count(distinct(name)) AS d FROM vaccinebrand";
                                     $result2 = $conn->query($sql2);
                                     
                                     echo "Vaccines: ";
                                     echo " = ";
                                     while($row = $result2->fetch_assoc()) {
                                        echo $row["d"];
                                     }
                                     echo "<br>";
	                                 while($row = $result->fetch_assoc()) {
                                     
                                    
	                                 echo $row["c"];
                                     echo "<br>";
	                                 }
				                     ?>
								</h5>
                            </a>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                               <i class="fa fa-user-md fa-5x"></i>
                                <h5>
								<?php
				                      $sql = "SELECT       `facilityname`,
                                      administered AS `value_occurrence` 
                             FROM     `facility`
                             GROUP BY `facilityname`
                             ORDER BY `value_occurrence` DESC
                             ";
	                                 $result = $conn->query($sql);
                                     echo "Facilities: ";
                                     echo "<br>";
                                     echo "<br>";
	                                 while($row = $result->fetch_assoc()) {
                                        
	                                 echo $row["facilityname"];
                                     echo " = ";
                                     echo $row["value_occurrence"];
                                     echo " Administered <br>";
	                                 }
				                     ?>
								</h5>
                            </a>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                               <i class="fa fa-user-md fa-5x"></i>
                                <h5>
								<?php
				                      $sql = "SELECT       `brandname`,
                                      COUNT(`brandname`) AS `value_occurrence` 
                             FROM     `client`
                             GROUP BY `brandname`
                             ORDER BY `value_occurrence` DESC
                             ";
	                                 $result = $conn->query($sql);
                                     echo "Most Used Vaccine: ";
                                     echo "<br>";
                                     echo "<br>";
	                                 while($row = $result->fetch_assoc()) {
                                        
	                                 echo $row["brandname"];
                                     echo " = ";
                                     echo $row["value_occurrence"];
                                     echo "<br>";
	                                 }
				                     ?>
								</h5>
                            </a>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                               <i class="fa fa-user-md fa-5x"></i>
                                <h5>
								<?php
				                      $sql = "SELECT       `side_effects`,
                                      COUNT(`side_effects`) AS `value_occurrence` 
                             FROM     `client`
                             GROUP BY `side_effects`
                             ORDER BY `value_occurrence` DESC
                             ";
	                                 $result = $conn->query($sql);
                                     echo "MOST RECORDED SIDE EFFECTS: ";
                                     echo "<br>";
                                     echo "<br>";
	                                 while($row = $result->fetch_assoc()) {
                                        
	                                 echo $row["side_effects"];
                                     
                                     
                                     echo " = ";
                                     echo $row["value_occurrence"];
                                    
                                     echo "<br>";
	                                 }
				                     ?>
								</h5>
                            </a>
                        </div>
                    </div>


 <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Graphs
                    
                    </h1>

  <div class="col-md-4">
    <div class="main-box mb-pink">
    <div id="piechart" style="height: 300px;"></div>
    </div>
    <div class="main-box mb-pink">
    <div id="barchart" style="size:auto;"></div>
    </div>
    
            
            
              
                    
              

 
                   
                </div>
		

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
	



</body>
</html>
