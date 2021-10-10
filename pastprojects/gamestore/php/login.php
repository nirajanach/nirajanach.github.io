<?php 
  
  include 'header.php';
 ?>

	<?php
  if(isset($_POST['submit'])) {
    $email =htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['pass']);
  
  $res =selectUser($email,$password);
  if(empty($res)){
    header("Location: login.php?msg= Invalid Login, Please Try Again!");

  }else{
  
    //Sets session and redirects to home page
    $_SESSION['user_id']= $res['id'];
    header("Location: index.php?msg=User Logged in Successfully");

  }
  }
  ?>
    <section class="container">
        <h1>Login</h1>
        <hr>
        <?php if(isset($_GET['msg'])){?>

          <p class="danger"> <?php  echo $_GET['msg']; ?></p><?php
        }
        ?>
        <form class="box" action="login.php" method="post">
            
           <b> Enter E-mail: <input type="text" name="email" class="formfield" placeholder="first name"><br>

            Enter Password: <input type="password" name="pass" class="formfield" placeholder="Password..."><br> </b>

           <input type="submit" name="submit" class="formfield" value="Login">
        </form>
        
        <hr>
    </section>
	

    <div class="clear"></div>
	

	<!-- footer text in the footer tag -->
		<footer class="bottom">© <br/>2020<br/> Nirajan Store<br/> <span class="center">Designed by Nirajan</span></footer>
		</body>
	</html>