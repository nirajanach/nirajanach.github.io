<?php 
include 'header.php';
 ?>

	<section class="container">
			<!-- section with the image and the brief introduction of the game store -->


			
			<h2>
			<?php 
                $stores=$db->query("SELECT * FROM stores  limit 20");
                    while ($row = $stores->fetchArray()) {
                        ?>
							
							Store Name:	<?php echo $row['title']; ?>
							
					</br>
									<?php echo $row['description']; ?>
												
							
                         
                         
                         
                        <?php 
					}
					?>

			</h2>
	</section>
	<div class="clear"></div>
	

	

	<!-- footer text in the footer tag -->
		<footer class="bottom" >© <br/>2020<br/> Nirajan Store<br/> <span>Designed by Nirajan</span></footer>
		</body>
	</html>