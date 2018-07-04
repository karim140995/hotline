<?php
require('../controller/DB.php');

class users_reporting 
{
   private $users_resolved ; 
  
   public function __construct()
    	{





        }
  
    public function users_resolved ()
    {

    	try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT users.firstname, users.lastname,count(users.id) from issues, users where issues.assigned_to_id=users.id and issues.status_id=3 group by issues.id ";     
               
               $result=mysql_query($query) or die ('Erreur requete resolved');
               $this->=mysql_num_rows ( $result );
               return $this->order_per_enumeration;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->order_per_enumeration;
    } 




}
?>