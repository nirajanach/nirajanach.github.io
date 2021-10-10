<?php 
  
  $title = "Welcome to Game Store!";
  $review = "Review";
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error</title>
</head>
<body>
<style>
p {
  color: yellow;
  font-size:100px;
  text-align: center;
} 
</style>
    <p >404 page not found<p><br>
    <a href="index.php"
              class="<?php 
                    if(basename($_SERVER['PHP_SELF'], '.php') == 'cart'){echo 'active'; }
              
              ?> ">
                  Go to index page
              </a>
</body>
</html>