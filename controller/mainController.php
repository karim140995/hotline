<?php 
require('../model/dao/general_issues_reporting.php');
require('../model/dao/issues_priority.php');
class mainController 

{

     

    //General issues reporting
    private $dao;
	public  $issues_resolved=0;
    public  $issues_in_progress=0; 
    public  $issues_feedback=0; 
    public  $issues_closed=0; 
    public  $issues_new=0 ; 
    public  $issues_rejected=0;
    
    //Due date tables
    private $priorityDao;
    public  $order_per_enumeration;
    public  $order_per_duedate;
    


    public function __construct($dao,$priorityDao)
    {
             
            //General issues reporting
    		$this->dao=$dao;
        	$this->issues_resolved=$dao->issues_resolved();
		    $this->issues_in_progress=$dao->issues_in_progress(); 
		    $this->issues_feedback=$dao->issues_feedback(); 
		    $this->issues_closed=$dao->issues_closed(); 
		    $this->issues_new=$dao->issues_new() ; 
		    $this->issues_rejected=$dao->issues_rejected();

            //Due date tables
            $this->priorityDao=$priorityDao;
            $this->order_per_enumeration=$priorityDao->order_per_enumeration() ;
            $this->$order_per_duedate=$priorityDao->order_per_duedate();      

    }






}


?>