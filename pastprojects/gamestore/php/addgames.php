<?php 
  include 'header.php';

if(isset($_POST['submit'])){
    
 
    
    if(empty($_FILES["image"]["name"])){
        $to_be_uploaded_path = "images/unknown_movie.png";
      
      }
      else{
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
        $to_be_uploaded_path = "../img/".strtolower(str_replace(" ","_",$_POST["title"])).".".$imageFileType;
        // Check if file already exists

        
        if (file_exists($to_be_uploaded_path)) {
          unlink($to_be_uploaded_path);
        }

        //Upload File to Server
        move_uploaded_file($_FILES["image"]["tmp_name"], $to_be_uploaded_path);
      }
    
      
      $query="INSERT INTO games(title,price,img,dev_id,category_id)
      values('".$_POST['title']."','".$_POST['price']."','".$to_be_uploaded_path."','".$_POST['dev_id']."','".$_POST['category_id']."')";
      
      $res=addNewGame($query);
     
      header('location: popular_games.php?msg=successfully added game');
     
  }
  
   ?>
          <?php 
          
          ?>
  
          <section class="welcome-container">
              <h1>Add Games</h1>
              <hr>
              <?php if(isset($_GET['msg'])){
                  echo $_GET['msg'];
              }
             
                 ?>
                      <form class="form_body" action="addgames.php" method="post" enctype="multipart/form-data">
                  Title: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text" name="title" class="form-control" placeholder="title..." required><br>
                   
                   price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text" name="price" class="form-control" placeholder="price..." ><br>
                   <div class="col-id-12 ">
                                      <label for="image">Image </label><div id=""></div>
                                      <input type="file" class="form-control" id="image"  name="image" placeholder="image">
  
                                  </div>
                  
                                  <?php 
                    $categories=getCategory();?>

                    <label for="category_id">category_id </label>
                    <select name="category_id" class="form-control">
                        <?php while( $category=$categories->fetchArray()){ ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                <?php 
                    $developer=getDeveloper();?>

                    <label for="category_id">category_id </label><div id=""></div>
                    <select name="dev_id" class="form-control">
                        <?php while( $row=$developer->fetchArray()){ ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                  </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="submit" name="submit" class="login-btn form-control" type="submit" name="submit">
              </form>
             
             
  
             
              <br>
              <br>
              <hr>
          </section>