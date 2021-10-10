<?php 
  
  include 'header.php';


  if(isset($_POST['submit'])){
    echo "i am here";
    $query="update games set title='".$_POST['title']."',description='".$_POST['description']."',dev_id='".$_POST['dev_id']."',lang='".$_POST['lang']."',price='".$_POST['price']."' where id='".$_POST['id']."'";
    $res=updateGame($query);
    header('location: popular_games.php?msg=successfully updated');
   
}

 ?>

        <?php 
        
        ?>

        <section class="container">
            <h1>Edit Games</h1>
            <hr>
            <?php if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
            if(isset($_GET['id'])){
                $row=getGameDetail($_GET['id']);?>
                    <form class="form_body" action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                Title: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $row['title'];?>"><br>
                
                 description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="description" class="form-control" placeholder="Full name..." value="<?php echo $row['description'];?>"><br>
                 price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="price" class="form-control" placeholder="Full name..." value="<?php echo $row['price'];?>"><br>
                 
                 language : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="lang" class="form-control" placeholder="Full name..." value="<?php echo $row['lang'];?>"><br>
                Developer
                 <select name="dev_id" class="form-control">
                    <?php $row=getDeveloper();
                    while( $result=$row->fetchArray()){ ?>
                    <option value="<?php echo $result['id'] ?>"><?php echo $result['title'] ?></option>
                    <?php } ?>
                </select>

               

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
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit" class="login-btn form-control" type="submit" name="submit">
            </form>
            <?php

            }
        ?>  
            <br>
            <br>
            <hr>
        </section>
        <div class="clear"></div>
	<!-- footer text in the footer tag -->
	<footer class="sticky">© <br/>2020<br/> Nirajan Store<br/> <span class="center">Designed by Nirajan</span></footer>
		

	
		</body>
	</html>
        