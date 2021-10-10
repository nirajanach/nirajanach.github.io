<?php 
  
  include 'header.php';
 ?>
	<section id="container">
	<?php if(isset($_SESSION['user_id'])){ ?>
<hr>
<br>

                                <?php }?>

	<?php 
	
                $game_resultss=$db->query("SELECT * FROM games order by title desc limit 4");
                    while ($row = $game_resultss->fetchArray()) {
                        ?>
						<div class="gameprofile">
							<div class="center">
							<img src="../img/<?php echo $row['img']; ?>" height="150"></div>
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

                                <?php }else{ ?>
                                    <a href="cart.php?action=add&id=<?php echo $row['id'];?>" type="button"> Add to cart</a>
                                <?php }?>
                            </div>
						</div>
                        <?php 
					}
					?>
					

	</section>
	<div class="clear"></div>

	

	<!-- footer text in the footer tag -->
		<footer class="bottom">© <br/>2020<br/> Nirajan Store<br/> <span class="center">Designed by Nirajan</span></footer>
		</body>
	</html>