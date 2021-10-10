<?php 
  
  include 'header.php';
  ?>

	<?php
  if(isset($_POST['submit'])) {
    $email =htmlspecialchars($_POST['email']);
    $security_password =htmlspecialchars($_POST['password']);
    $first_name =htmlspecialchars($_POST['first_name']);
    $last_name =htmlspecialchars($_POST['last_name']);
    
  


  $query = "insert into users(first_name,last_name,email,pass) values ('".$first_name."','".$last_name."','".$email."','".$security_password."')";
  $res=addNewUser($query);
  if($res){
    echo "Successfully Registered";
  }else{
    die('Wrong Password');
  }

}
  ?>
        <section class="welcome-container">
            <h1>Register</h1>
            <hr>
            <?php if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
            


            <form id="register_form"  action="register.php"  method="post">	
                        <fieldset>
                            <legend>Register Form</legend>
                                            
                                
                                   <b> <label for="first_name">First Name </label><div id="error-firstname"></div>
                               
                                    <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="Please Enter Your First Name" maxlength="50" required>

                               
                                    <label for="last_name">Last Name </label><div id="error-lastname"></div>
                                    <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="Please Enter Your Last Name" maxlength="50" required>

                                
                                    <label for="your_email">Email </label><div id="error-email"></div>
                                    <input type="email" class="form-control" id="your-email"  name="email" placeholder="Please Enter Your Email ID" required>

                               
                                    <label for="dob">Date of birth </label><div id="error-dob"></div>
                                    <input type="date" class="form-control" id="ÿour-dob"  name="dob" placeholder="Please select or enter your Date of Birth required>


                                
                                
                            
                                    <label for="password">Password</label>	<div id="error-password"></div>
                                    <input type="password" class="form-control" id="your-password"  name="password" placeholder="Choose Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </b>   
                                <br>
                                <input type="submit" name="submit" class="submit btn form-control" value="Submit" />
                        </fieldset>
                        
                    </form>
	
          </section>
	
                    <div class="clear"></div>
	

	<!-- footer text in the footer tag -->
		<footer class="bottom">© <br/>2020<br/> Nirajan Store<br/> <span class="center">Designed by Nirajan</span></footer>
		</body>
	</html>