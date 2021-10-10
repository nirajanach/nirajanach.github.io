<?php 
  
  $app = "Welcome to Game Store!";
  
  include ("../config/libcommon.php");
  $db = new SQLite3("../db/games.db");
 ?>
<html>
<head>
	<!--for multiple devices responsiveness -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!--character set specification for website -->
		<meta charset="utf-8"/>
		<!--page title-->
		<title>Game Store</title>
		
		
	<LINK href="../css/css.css" rel="stylesheet" type="text/css">


</head>
		
		<!-- setting id on body to apply properties from css -->
<body>
	<header>
		<h2>Game Store </h2>

		<!-- navigation with the ul within it -->
		<nav>
				<ul>
						<li class="home"><a href="index.php"> Home </a> </li>
						<li class="home"><a href="search.php"> Advanced Search </a> </li>
						<li class="newgames"><a href="trending_games.php">Trending Games </a> </li>
						<li class="populargames"><a href="popular_games.php">Popular games</a> </li>
						<li class="about"><a href="about.php">About US</a> </li>
						<li class="cart"><a href="cart.php">Cart</a> </li>
						<?php if(isset($_SESSION['user_id'])){?>
						<li class="home"><a href="addgames.php"> Add Games </a> </li>

                            <li class="Register"><a href="logout.php">Logout</a></li>
              <?php }else{?>
                &nbsp;&nbsp;&nbsp;
                <li><a href="register.php" 
                class="<?php 
                    if(basename($_SERVER['PHP_SELF'], '.php') == 'register'){echo 'active'; }
              
              ?> ">
                    Register
                </a> </li>
                <li class="login">
                <a href="login.php" class="<?php 
                    if(basename($_SERVER['PHP_SELF'], '.php') == 'login'){echo 'active'; }
              
              ?> ">
                   Login
						
               
                </a></li>

              <?php }?>
							<form   action="search.php" method="get">
						<input class="search" type="text" placeholder="Search..." name="search"/>
						<input type="submit" value="search" class="search-button" >
					</form>
	
						
						


				</ul>
				
		</nav>

	</header>