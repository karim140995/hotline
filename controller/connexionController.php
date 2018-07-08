<?php
				if(isset($_POST['cCnx'])){
					
					if (isset($_POST['cEmail']) && isset($_POST['cPassword'])) {


                        try 
                          {
                            require('DB.php');
                            $connector= new mysql_connector();
                            $connector->connect(); 
                            $mail=$_POST['cEmail'];
                            $passw=$_POST['cPassword'];
                            $query = "SELECT address, hashed_password 
                                  FROM USERS,email_addresses
                                  WHERE  address like '$mail'
                                  AND  hashed_password like '$passw'
                                  and USERS.id= email_addresses.user_id ";
                            $mysql=mysql_query($query) or die ('error requete');
    					              $connector->disconnect();
                            
                            if (mysql_num_rows($mysql) > 0) {
                                header("Location:pages/index.html");
                            } else{
                                echo "login ou mot de passe incorrect";
                            }

                          } catch( Exception $e) { echo 'Couldnt connect to server' ;}

                    }
				}
?>