<?php
				if(isset($_POST['cCnx'])){
					
					if (isset($_POST['cEmail']) && isset($_POST['cPassword'])) {


                        try 
                          {
                            require('DB.php');
                            $connector= new mysql_connector();
                            $connector->login(); 
                            $mail=$_POST['cEmail'];
                            $passw=$_POST['cPassword'];
                            $query = "SELECT login, password 
                                  FROM USER
                                  WHERE  login like '$mail'
                                  AND    password like '$passw'";
                            $mysql=mysql_query($query) or die ('error requete');
    					              $connector->disconnect();
                            
                            if (mysql_num_rows($mysql) > 0) {
                                header("Location:pages/index.php");
                            } else{
                                echo "login ou mot de passe incorrect";
                            }

                          } catch( Exception $e) { echo 'Couldnt connect to server' ;}

                    }
				}
?>