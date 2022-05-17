<?php
	
	class userModel
	{
		// set database config for mysql
		function __construct($consetup)
		{
			$this->host = $consetup->host;
			$this->user = $consetup->user;
			$this->pass =  $consetup->pass;
			$this->db = $consetup->db;            					
		}
		// open mysql data base
		public function open_db()
		{
			$this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
			if ($this->condb->connect_error) 
			{
    			die("Erron in connection: " . $this->condb->connect_error);
			}
		}
		// close database
		public function close_db()
		{
			$this->condb->close();
		}	

		
        // select record     
		public function selectRecord($userobj)
		{
			$email=$userobj['email'];
			$password=md5($userobj['password']);
			try
			{
                $this->open_db();
                if($email!='')
				{	
					$query=$this->condb->prepare("SELECT * FROM user WHERE email=? and password=?");
					$query->bind_param("ss",$email,$password);
				}
                
				$query->execute();
				$res=$query->get_result();	
				if ($res->num_rows > 0) {
						$data = $res->fetch_assoc();
					}

				$query->close();				
				$this->close_db();                
                return $data;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}
	}

?>