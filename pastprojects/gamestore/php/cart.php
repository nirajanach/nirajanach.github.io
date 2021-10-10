<?php 
  include 'header.php';
  
 

      
if(!empty($_GET["action"])){

    updateCart($_GET["action"],$_GET["id"]);
  }
  if(!empty($_POST["action"])){
    updateCart($_POST["action"],$_POST["id"]);
  }

  //Check if Items exists in Cart
  if(!empty($_SESSION["cart"])) {
  // inistialise item total and shipping variable
  $item_total=0;
  $shipping = 0;


 ?>
        <?php ?>

        <section class="container">
            <h1>Cart Item</h1>
            <hr>
            <?php if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
            <?php 
    // echo count($_SESSION["cart"])."hello";
  
               foreach ($_SESSION["cart"] as $item){
                 $item_price = $item["quantity"]*$item["price"];
                 $item_total = $item_total + $item_price;
               
              
            ?>
            <div class="box-body box row">
                <img src="../img/<?=$item['img'];?>"/>

              <form method="post" action="cart.php">
                <div style="padding:15px">
                    <div class="item">
                      <p class="message"><h3><?=$item['title'];?></h3></p>
                    </div>
                  
                 
                    <div class="item">
                      <p class="message"><b>Amount: </b><?=$item_price;?></p>
                    </div>
                        <input type="hidden" name="id" id="id" value="<?=$item['id'];?>"/>
                        <input type="hidden" name="action" id="action" value="remove"/>
                  <div class="item">
                      <p><input type="submit" class="btn btn-warning" value="Remove from Cart"/></p>
                  </div>
                </div>
              </form>
            </div>
          <?php }?>
          
        
        </section><?php
      }
            else{
              ?>
              
              <p class="empty">Your Cart is Empty ! Add games to continue</p>
              
              <?php
              }
              
              
               ?>
	<div class="clear"></div>
  <footer class="bottom">© <br/>2020<br/> Nirajan Store<br/> <span >Designed by Nirajan</span></footer>
		</body>
	</html>