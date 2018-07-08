<?php 

class charts {
 

     private $IssuesTrackers;
     private $TopUsers;
     private $getIssuesPerMonth;
     private $getIssuesPerYear;
     private $getEnumeration;
     private $getNonResolvedIssuesPerMonth;
     private $getResolvedIssuesPerMonth;

     public function __construct()
    	{



      }
    
   
    public function getEnumeration()
    {

              try {
               $connector= new mysql_connector();
               $connector->connect(); 
               $query=" SELECT trackers.name, count(issues.id) from issues, trackers where issues.tracker_id=trackers.id group by trackers.id ";
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->getEnumeration = $result; 
               return $this->getEnumeration;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->getEnumeration; 

    }
    public function getIssuesTrackers() 
      {
      	      try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query=" SELECT trackers.name, count(issues.id) from issues, trackers where issues.tracker_id=trackers.id group by trackers.id ";
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->IssuesTrackers = $result; 
               return $this->IssuesTrackers;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->IssuesTrackers;           
       }
    public function getIssuesTrackersPerMonth($month) 
      {
              try {
               $connector= new mysql_connector();
               $connector->connect(); 
               $query=" SELECT trackers.name, count(issues.id) from issues, trackers where issues.tracker_id=trackers.id and year(issues.created_on)='$year' group by trackers.id ";
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->IssuesTrackers = $result; 
               return $this->IssuesTrackers;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->IssuesTrackers;           
       }
    

     public function getTopUsers() 
     {
           
             try {
           	   $connector= new mysql_connector();
               $connector->connect(); 
               $query="SELECT users.firstname, users.lastname,count(users.id) as count from issues, users where issues.assigned_to_id=users.id and issues.status_id=3 group by users.id order by  count desc LIMIT 10"; 
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->TopUsers= $result; 
               return $this->TopUsers;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->TopUsers;           
       }     
     public function getNonResolvedIssuesPerMonth($year,$month)
     {
        {
           
             try {
               $connector= new mysql_connector();
               $connector->connect(); 
               $query="SELECT month(i.created_on) AS month,ROUND(count(*)) as Quantity from ISSUES as i , projects as p 
                      where ((month(i.closed_on)>='$month' and year(i.closed_on)>='$year') or (i.closed_on is null)) and  (month(i.created_on)<'$month' and year(i.created_on)<'$year')"; 
               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->getNonResolvedIssuesTotal= $result; 
               return $this->getNonResolvedIssuesTotal;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->getNonResolvedIssuesTotal;           
       }

     }

     public function getResolvedIssuesPerMonth($year,$month)
     {
         {
           
             try {
               $connector= new mysql_connector();
               $connector->connect(); 
               $query="SELECT month(i.created_on) AS month,ROUND(count(*)) as Quantity from ISSUES as i , projects as p 
                      where (month(i.closed_on)='$month') and (year(i.closed_on)='$year')" ;

               $result=mysql_query($query) or die ('Erreur requete priorité');
               $this->getResolvedIssuesPerMonth= $result; 
               return $this->getResolvedIssuesPerMonth;
           } catch ( Exception $e)   {echo 'Erreur base de données' ;}

           return $this->getResolvedIssuesPerMonth;           
       }
      
     }


        
}



?> 