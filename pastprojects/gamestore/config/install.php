<?php
    $db = new SQLite3('../db/games.db');
    function init($db) {
        try{
            
           

            $query = "DROP TABLE IF EXISTS users";
            $db->exec($query);
            $query = "CREATE TABLE users (
  				id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  				first_name TEXT,
  				last_name TEXT,
  				DOB TEXT,
                email TEXT,
                pass TEXT
                )";
            $db->exec($query);
            $query = "INSERT INTO users(first_name,last_name,DOB,email,pass)
                        VALUES('Nirajan','Admin','03/01/1994','nirajan@gmail.com','4444');";
                        
            $db->exec($query);

            
            

            // table for devleoper details
            $query = "DROP TABLE IF EXISTS dev";
            $db->exec($query);
            $query = "CREATE TABLE dev(
  				id INTEGER PRIMARY KEY,
  				title TEXT,
  				description TEXT,
                country TEXT,
                contact_number TEXT
          
                )";
            $db->exec($query);
            $query = "INSERT INTO dev(title,description,country,contact_number)
                        VALUES('USQ', 'developer ','Australia','+61 46302323484');";
                        
                      
            $db->exec($query);

           

// table for categories details
$query = "DROP TABLE IF EXISTS categories";
$db->exec($query);
$query = "CREATE TABLE categories (
      id INTEGER PRIMARY KEY,
      title TEXT,
      description TEXT

    )";
$db->exec($query);
$query = 
            "INSERT INTO categories(title,description)
            VALUES('Action', 'Action');".
            "INSERT INTO categories(title,description)
            VALUES('Strategy', 'Strategy');";


$db->exec($query);
            // table for trending games 
            $query = "DROP TABLE IF EXISTS games";
            $db->exec($query);
            $query = "CREATE TABLE games (
  				id INTEGER PRIMARY KEY,
  				title TEXT,
  				description TEXT,                            
                price  REAL,
                img TEXT,
                lang TEXT,             
                dev_id INTEGER NOT NULL,
                category_id INTEGER NOT NULL,
                FOREIGN KEY(dev_id) REFERENCES dev(id),
                FOREIGN KEY(category_id) REFERENCES categories(id)
 
          
                )";
            $db->exec($query);
            $query = "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('GTA', 'GTA is a series of action-adventure games',399,'a.png','English',1,1);".
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('GLOOMHAVEN', 'Gloomhaven is a  tactical combat game.',140,'b.jpg','English',1,1);". 
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('DISCO ELYSIUM', 'Disco Elysium is a role-playing video game',200,'c.jpg','English',1,1);". 
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('FORTNITE', 'Fortnite is an online video game ',123,'d.jpg','English',1,1);". 
                       "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                       VALUES('PES', 'PES is a football simulation video games.',62,'h.jpg','English',1,1);".
                       "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                       VALUES('STORMLAND', 'Stormland is an action-adventure game.',900,'i.jpg','English',1,1);".
                       "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                       VALUES('MINECRAFT', 'Minecraft is a sandbox video game.',563,'j.jpg','English',1,1);". 
                       "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('WORLD ABOVE', 'World Above is latest casual puzzle game.',140,'e.jpg','English',1,1);". 
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('MODERN', 'MODERN is first-person shooter video game',17,'k.jpg','English',1,1);". 
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('BUBBLE FUNCTION ', 'Bubble using dynamic function machines.',92,'f.jpg','English',1,1);". 
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('DESTORY ALL HUMANS', 'Destroy is an action-adventure video game.',59,'g.jpg','English',1,1);".  
                        "INSERT INTO games(title,description,price,img,lang,dev_id,category_id)
                        VALUES('STARDEW', 'Stardew Valley is a role-playing game.',96,'l.jpg','English',1,1);"
                        ;

                        $db->exec($query);



             // table for store details
             $query = "DROP TABLE IF EXISTS stores";
             $db->exec($query);
             $query = "CREATE TABLE stores (
                id INTEGER PRIMARY KEY,
                title TEXT,
                description TEXT,
                suburb TEXT,
                state TEXT,
                street TEXT,
                country TEXT,
                contact_number TEXT
               
           
                 )";
             $db->exec($query);
             $query = "INSERT INTO stores(title,description,country,state,suburb,street,contact_number)
                         VALUES('Nirajan store', 'Welcome to the place where you can find Various of games','Nepal','Kathmandu','Basantapur','Makhan Galli','+977 9804297207');";                     
             $db->exec($query);

                    // table for dynamic order details
           $query = "DROP TABLE IF EXISTS orders";
           $db->exec($query);
           $query = "CREATE TABLE orders (
                 id INTEGER PRIMARY KEY,
                 game_id INTEGER NOT NULL,
                 user_id INTEGER NOT NULL,
               ip TEXT,
               quantity INTEGER,
               price INTEGER,
               status INTEGER,
               FOREIGN KEY(game_id) REFERENCES games(id),
               FOREIGN KEY(user_id) REFERENCES users(id),
                 timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
         
               )";
           $db->exec($query);
           $query = "INSERT INTO orders(game_id,user_id,ip,quantity,price,status)
                       VALUES(1, 1,'192.168.1.43',1,10,1000,0);".
                      "INSERT INTO orders(game_id,ip,user_id,quantity,price,status)
                      VALUES(2, 2,'192.168.1.43',1,10,20,0);";
                       

   
           $db->exec($query);



 // table for dynamic Review details
 $query = "DROP TABLE IF EXISTS tbl_review";
 $db->exec($query);
 $query = "CREATE TABLE tbl_review (
       id INTEGER PRIMARY KEY,
       game_id INTEGER NOT NULL,
       user_id INTEGER NOT NULL,
       comment TEXT,
       rating INTEGER,
       timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY(game_id) REFERENCES tbl_games(id),
       FOREIGN KEY(user_id) REFERENCES tbl_users(id)

     )";
 $db->exec($query);
 $query = "INSERT INTO tbl_review(game_id,user_id,comment,rating)
             VALUES(1,1,'Good',3);".
             "INSERT INTO tbl_review(game_id,user_id,comment,rating)
             VALUES(1,2,'Best',5);";

$db->exec($query);
            header('Location:../php/index.php');          

        }catch(Exception $error){
            throw $error;
          }
    }
    init($db);
    ?>


