<?php 
require('../controller/DB.php');
class general_issues_reporting 

{

      private $issues_resolved=0;
      private $issues_in_progress=0; 
      private $issues_feedback=0; 
      private $issues_new=0 ; 
      private $issues_rejected=0;
      private $issues_closed=0; 
      
   

      public function __construct()
    	{


        }

	     
	  function issues_new()
	  {
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT id FROM issues WHERE status_id=1" ;
               $result=mysql_query($query) or die ('Erreur requete');
               $this->issues_new=mysql_num_rows ( $result );
               return $this->issues_new;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->issues_new;
  
	  }  

      public function issues_resolved() 
      {
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT id FROM issues WHERE status_id=3 " ;
               $result=mysql_query($query) or die ('Erreur requete');
               $this->issues_resolved=mysql_num_rows ( $result );
               return $this->issues_resolved;
           } catch ( Exception $e) {echo 'Erreur base de données' ;}
 
           return $this->issues_resolved;
      }      

      public function issues_in_progress()
      {
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT id FROM issues WHERE status_id=2 " ;
               $result=mysql_query($query) or die ('Erreur requete');
               $this->issues_in_progress=mysql_num_rows ( $result );
               return $this->issues_in_progress;
           } catch ( Exception $e) {echo 'Erreur base de données' ;}

           return $this->issues_in_progress;

      } 

      public function issues_feedback()
      { 
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT id FROM issues WHERE status_id=4" ; 
               $result=mysql_query($query) or die ('Erreur requete');
               $this->issues_feedback=mysql_num_rows ( $result );
               return $this->issues_feedback;
           } catch ( Exception $e) {echo 'Erreur base de données' ;}

           return $this->issues_feedback;

      } 

      public function issues_closed() 
      {
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT id FROM issues WHERE status_id=5" ;
               $result=mysql_query($query) or die ('Erreur requete');
               $this->issues_closed=mysql_num_rows ( $result );
               return $this->issues_closed;
           } catch ( Exception $e) {echo 'Erreur base de données' ;}

           return $this->issues_closed;

      }  																								
      
      public function issues_rejected()
	  {
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT id FROM issues WHERE status_id=6 " ;
               $result=mysql_query($query) or die ('Erreur requete');
               $this->issues_rejected=mysql_num_rows ( $result );
               return $this->issues_rejected;
           } catch ( Exception $e) {echo 'Erreur base de données' ;}

           return $this->issues_rejected;
  
	  }  


}

?>