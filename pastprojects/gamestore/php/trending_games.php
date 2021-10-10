<?php 
  
  include 'header.php';
  if(isset($_GET['id'])){
	  $sql=$db->query("delete from games where id=".$_GET['id']);
  }
 ?>

	<section id="container">
	<?php 
                $game_resultss=$db->query("SELECT * FROM games  limit 12");
                    while ($row = $game_resultss->fetchArray()) {
                        ?>
						<div class="gameprofile">
							<div class="center">
							<img src="../img/<?php echo $row['img']; ?>" height="150"> </div>
							<h2> <?php echo $row['title'] ?></h2>

							<div class="gamedetails">
								
							<p>
							<b>Price: </b><?php echo $row['price']; ?><br>
								<?php echo $row['description']; ?>
								</p>			
							</div>
							<div class="action">
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                    <a href="edit.php?id=<?php echo $row['id'];?>" type="button"> Edit</a>
                                    <a href="trending_games.php?id=<?php echo $row['id'];?>" type="button"> Delete</a>

                                <?php }else{ ?>
                                    <a href="cart.php?action=add&id=<?php echo $row['id'];?>" type="button" class="addto"> Add to cart</a>
                                <?php }?>
                            </div>
						</div>
                        <?php 
					}
					?>

	</section>
	<div class="clear"></div>
	

	
	<!-- footer text in the footer tag -->
	<footer class="sticky">© <br/>2020<br/> Nirajan Store<br/> <span class="center">Designed by Nirajan</span></footer>
		

	
		</body>
	</html>