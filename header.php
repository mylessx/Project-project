<?php
	session_start();
	include'connection.php';
	$username = $_SESSION["username"];

	$sql = "SELECT agent_id FROM agent WHERE agent_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
     
    }
    else {
	header("Location: clientHome.php");
   }
	
?>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0" style="background-color: #0BE0FD">
	
            <div class="navbar-header">
                	
                <a class="navbar-brand" href="index.php">Vaccine Distribution</a>
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
									if(!isset($_SESSION["username"])){
										header("Location: index.php");
									}else {
										echo "welcome, ".$_SESSION["username"];
									}
								?>
                            <br />
                              
                            </div>
                        </div>

                    </li>


                 <li>
                      <a href="client.php"><i class="fa fa-users "></i>CLIENTS</a >  
                 </li> 
              
                 <li>
                      <a href="viewvaccine.php"><i class="fa fa-pencil-square-o "></i>VACCINE BRAND</a>
                          
                 </li>     
                 <li>
                      <a href="viewfacility.php"><i class="fa fa-heart "></i>FACILITIES</a>
                            
                 </li> 
                 <li>
                      <a href="home.php"><i class="fa fa-square-o "></i>STATISTICS</a>
                            
                 </li> 
           
                    
                     
                </ul>

            </div>
		

        </nav>
		 
		  
	
   