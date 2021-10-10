<?php 
  
 
  include 'header.php';
  ?>
   <section class="welcome-container">
            <h1>Games</h1>
            <hr>
            <?php 
            if(isset($_GET['search'])){

                $results = simpleSearch(htmlspecialchars($_GET['search']));
               if($results->fetchArray()){
              
           
               
                while($row = $results->fetchArray()){
                  
                    ?>

                    <div class="gameprofile">
                            <div class="center">
                            <img src="../img/<?php echo $row['img']; ?>" height="150">
                            </div>
                            <div class="gamedetails center">
                               <h2> <?php echo $row['title'] ?><br></h2>
                                <?php echo $row['price']; ?><br>
                                
                                
                            </div>
                         
                            <div class="action">
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                    <a href="edit.php?id=<?php echo $row['id'];?>" type="button"> Edit</a>

                                <?php }else{ ?>
                                    <a href="cart.php?action=add&id=<?php echo $row['id'];?>" type="button"> Add to cart</a>
                                <?php }?>
                            </div>
                            
                            
                        
                        </div>
                   
            <?php }  
               }else{
                echo $_GET['search']." not found";
            }?>
                <?php 
            }else{
           
            ?>
            <div class="box">
                <center>Advance Search</center>
                <form method="post" action="search.php" class="search-box"> 
                    <input type="text" placeholder="Search..." name="q"/>
                    <input type="tnumberext"  name="lower" placeholder="Price lower than">
                    <input type="number"  name="higher" placeholder="Price Higher than">
                    <input type="submit" name="advance_search" value="Advance search" >
                </form>
            </div>
            <div class="clear"></div>
           <div class="box">
                <?php
                if(isset( $_POST['advance_search'])){
                    $high_price =htmlspecialchars($_POST['higher']);
                    $low_price =htmlspecialchars($_POST['lower']);
                    $query = $_POST['q'];
                    $sql="select * from games WHERE 1=1";
       
                   if(!empty($query))
                   $sql = $sql." and title like '%".$query."%'";
       
                  

                    if(!empty($low_price)){
                       $sql = $sql." and price < ".$low_price;

                        


                    }
                    elseif(!empty($high_price)){
                        $sql = $sql." and games.price = '".$high_price."'";


                        
                    }
                    
                    
                    
                $result=$db->query($sql);
                  
                       
                    ?>
                    
                    <?php
                    if($result->fetchArray()){

                       
                                while($row = $result->fetchArray()){?>
                                
                                <div class="gameprofile">
                            <div class="center">
                            <img src="../img/<?php echo $row['img']; ?>" height="150">
                            </div>
                            <div class="gamedetails center">
                               <h2> <?php echo $row['title'] ?><br></h2>
                                <?php echo $row['price']; ?><br>
                                
                                
                            </div>
                         
                            <div class="action">
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                    <a href="edit.php?id=<?php echo $row['id'];?>" type="button"> Edit</a>

                                <?php }else{ ?>
                                    <a href="cart.php?action=add&id=<?php echo $row['id'];?>" type="button"> Add to cart</a>
                                <?php }?>
                            </div>
                            
                            
                        
                        </div>
                        
                                <?php }
                                
                    
                   //
                   // echo '</table';
                }else{
                    echo "no result found";
                    }
                }

                    ?>
                    
                

            <?php }?>
           
            
        </section>
        <div class="clear"></div>

        <footer class="bottom">© <br/>2020<br/> Nirajan Store<br/> <span class="center">Designed by Nirajan</span></footer>