<?php
    
  
   class mysql_connector

   {

    public $link;

    public function __construct()
    {
  
    }
    
    //Connect to main database
    public function connect() 
    {
		$this->link= @mysql_connect('localhost','root','')or die('Erreur serveur');
		mysql_select_db('bitnami')or die('erreur db');
		return $this->link;
    }
 
    //Connect to issues database
    public function login() 
    {
        $this->link= @mysql_connect('localhost','root','')or die('Erreur serveur');
        mysql_select_db('issuemanager')or die('erreur db');
        return $this->link;
    }

    public function disconnect()
    {
    	if($this->link)
    		{
    			mysql_close();
           }
    }     

    }
?>	