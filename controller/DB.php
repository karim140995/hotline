<?php
    
  
   class mysql_connector

   {

    public $link;

    public function __construct()
    {
  
    }

    public function connect() 
    {
		$this->link= @mysql_connect('localhost','root','')or die('Erreur serveur');
		mysql_select_db('bitnami')or die('erreur db');
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