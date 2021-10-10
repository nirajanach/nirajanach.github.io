<?php

session_start();
   function getConnection()
   {
  // reading and opening of sqlite db
         return new SQLITE3(dirname(dirname(__FILE__)).'/db/games.db');
         
   }
   function closeDBConnection($dbConn){
    //  closing the db connection
      $dbConn = null;

    }
   function showGame(){
// show the list of game
      $mydb = getConnection();
      $query = "SELECT * from games";
      if ($mydb) {
         $result = $mydb->query($query);
     
         return $result;
     
       } else {
           print "Connection to database failed!\n";
       }
       closeDBConnection();
   }
   function getCategory(){

    $mydb = getConnection();
    $query = "SELECT * from categories";
    if ($mydb) {
       $result = $mydb->query($query);
   
       return $result;
   
     } else {
         print "Connection to database failed!\n";
     }
     closeDBConnection();
 }
 function getDeveloper(){

  $mydb = getConnection();
  $query = "SELECT * from dev";
  if ($mydb) {
     $result = $mydb->query($query);
 
     return $result;
 
   } else {
       print "Connection to database failed!\n";
   }
   closeDBConnection();
}
function getPublisher(){

  $mydb = getConnection();
  $query = "SELECT * from publishers";
  if ($mydb) {
     $result = $mydb->query($query);
 
     return $result;
 
   } else {
       print "Connection to database failed!\n";
   }
   closeDBConnection();
}
   function selectUser($email,$password){
      $mydb = getConnection();
      $query = "SELECT * from users where email='".$email."'  and pass='".$password."' ";
      
      if ($mydb) {
         $result = $mydb->query($query);
         return  $result->fetchArray();
         
       }
   }
 
   function simpleSearch($q){
      $mydb = getConnection();
      $query = "SELECT * FROM games WHERE title like '%".$q."%'";
      if ($mydb) {
         $result = $mydb->query($query);
     
         return $result;
     
       } else {
           print "Connection to database failed!\n";
       }
       closeDBConnection();
   }
   function advanceSearch($q,$high_price,$low_price){
      $mydb = getConnection();
      
     if ($mydb) {
         $result = $mydb->query($query);
     
         return $result;
     
       } else {
           print "Connection to database failed!\n";
       }
       closeDBConnection();
   }
   function advanceSearchByHighPrice($q,$high_price){
      $mydb = getConnection();
      $query = "SELECT * FROM games WHERE title like '%".$q."%' and price >=  $high_price";
      if ($mydb) {
         $result = $mydb->query($query);
     
         return $result;
     
       } else {
           print "Connection to database failed!\n";
       }
       closeDBConnection();
   }
   function advanceSearchByHighPriceOnly($high_price){
    $mydb = getConnection();
    $query = "SELECT * FROM games WHERE price >=  $high_price";
    if ($mydb) {
       $result = $mydb->query($query);
   
       return $result;
   
     } else {
         print "Connection to database failed!\n";
     }
     closeDBConnection();
 }
   function advanceSearchByLowPrice($q,$low_price){
      $mydb = getConnection();
      $query = "SELECT * FROM games WHERE title like '%".$q."%' and price <=  $low_price";
      if ($mydb) {
         $result = $mydb->query($query);
     
         return $result;
     
       } else {
           print "Connection to database failed!\n";
       }
       closeDBConnection();
   }
   function advanceSearchByLowPriceOnly($low_price){
    $mydb = getConnection();
    $query = "SELECT * FROM games WHERE price <=  $low_price";
    if ($mydb) {
       $result = $mydb->query($query);
   
       return $result;
   
     } else {
         print "Connection to database failed!\n";
     }
     closeDBConnection();
 }
   function getGameDetail($id){
      $mydb = getConnection();

 
      $query = "SELECT * from games where id=".$id;
   
        if ($mydb) {
         $result = $mydb->query($query);
     
         return $result->fetchArray();
     
       } else {
           print "Connection to database failed!\n";
       }
       closeDBConnection();
    
    
      
    }
    
   function updateCart($action,$id){
      switch ($action) {
        case 'add':
        
          if(!empty($id)) {
            $game_detail = getGameDetail($id);
              $itemArray = array($game_detail["id"]=>array('id'=>$game_detail["id"],'title'=>$game_detail["title"],'category_id'=>$game_detail['category_id'],'quantity'=>1,'price'=>$game_detail["price"],'img'=>$game_detail['img']));
              
            if(!empty($_SESSION["cart"])) {
                 if(in_array($game_detail["id"],array_keys($_SESSION["cart"]))) {
    
                    foreach($_SESSION["cart"] as $k => $v) {
                        if($game_detail["id"] == $k) {
                           if(empty($_SESSION["cart"][$k]["quantity"])) {
                              $_SESSION["cart"][$k]["quantity"] = 0;
                           }
                          $_SESSION["cart"][$k]["quantity"]++;
                        }
                    }
                  
                 } else {
                $_SESSION["cart"] = $_SESSION["cart"]+$itemArray;
                 
                 }
              } else {
         
            
                 $_SESSION["cart"] = $itemArray;
                 
              }
        }
        break;
        case 'remove':
          if(!empty($id)) {
            foreach($_SESSION["cart"] as $k => $v) {
    
                 if($id == $k)
                    unset($_SESSION["cart"][$k]);
                 if(empty($_SESSION["cart"]))
                    unset($_SESSION["cart"]);
              }
    
        }
        break;
    
        default:
          // code...
          break;
      }
    }

    function addNewUser($sql){
     

      $myPDO = getConnection();
   
      if ($myPDO) {
        $myPDO->exec($sql);
        $id = $myPDO->lastInsertRowID();
        return $id;
      } else {
          print "Connection to database failed!\n";
      }
      closeDBConnection();
    }
    function addNewGame($sql){
     

      $myPDO = getConnection();
   
      if ($myPDO) {
         
        $myPDO->exec($sql);
        $id = $myPDO->lastInsertRowID();
        return $id;
      } else {
          print "Connection to database failed!\n";
      }
      closeDBConnection();
    }
    
    function updateUser($sql){
      $myPDO = getConnection();
      $query = $sql;
      if ($myPDO) {
        $myPDO->exec($query);
        return;
      } else {
          print "Connection to database failed!\n";
      }
      closeDBConnection();
    }
    function updateGame($sql){
      $myPDO = getConnection();
 
      if ($myPDO) {
       
        $myPDO->exec($sql);
        
        return;
      } else {
          print "Connection to database failed!\n";
      }
      closeDBConnection();
    }

?>

