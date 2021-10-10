<?php 
  include 'header.php';
 ?>

	<section class="center">
			<!-- div with the image and the brief introduction of the game -->

<?php if(isset($_GET['msg'])){
	echo $_GET['msg'];
}?>
			<!-- this is title of game -->
			<h2>Welcome to Nirajan Game Store</h2>
			<img src="../img/home.jpg" width="500" height="333" class="center home">

	</section>
	

	

	<!-- footer text in the footer tag -->
		<footer class="bottom">© <br/>2020<br/> Nirajan Store<br/> <span>Designed by Nirajan</span></footer>
		</body>
	</html>