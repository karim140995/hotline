<?php 

require('../controller/DB.php');
public class issues_priority 
{


	  private $order_per_enumeration;
	  private $order_per_duedate;
   
  
      public function __construct()
    	{





        }
    
      public function order_per_enumeration()
       {

       		try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT users.firstname as client_firstName,users.lastname as client_lastName ,issues.subject,issues.description,enumerations.name as type,projects.name as projects_name from issues,users,enumerations,projects where enumerations.id=issues.priority_id and issues.priority_id <=5 and issues.status_id<=2  and projects.id=issues.project_id and users.id=issues.author_id order by issues.priority_id DESC" ;
               
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->order_per_enumeration=mysql_num_rows ( $result );
               return $this->order_per_enumeration;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->order_per_enumeration;


       }       

     public function order_per_duedate()
       {
           try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query= "SELECT users.firstname as client_firstName,users.lastname as client_lastName, issues.subject,issues.description,projects.name as projects_name ,issues.due_date from users,projects, issues where  projects.id=issues.project_id and users.id=issues.author_id order by issues.due_date" ;
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->order_per_duedate=mysql_num_rows ( $result );
               return $this->order_per_duedate;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->issues_new;           
       }

}

?>