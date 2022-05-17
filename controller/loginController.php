<?php
    require 'model/userModel.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class loginController 
	{

 		function __construct() 
		{    
			$this->objconfig = new config();
			$this->objsm =  new userModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'login' :                    
					$this->login();
					break;	
				case 'logout' :
					$this->logout();
				default:
                    $this->loginform();
			}
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($login_obj)
        {    $noerror=true;
            // Validate category        
            if(empty($login_obj['email'])){
                $login_obj['username_msg'] = "Field is empty.";$noerror=false;
            } else{$login_obj['username_msg'] ="";}            
            // Validate name            
            if(empty($login_obj['password'])){
                $login_obj['password_msg'] = "Field is empty.";$noerror=false;     
            } else{$login_obj['password_msg'] ="";}
            return $noerror;
        }
        // add new record
		public function login()
		{
            try{
				$login_obj;
                if (isset($_POST['addbtn'])) 
                {   
					// read form value
					
                    $login_obj['email'] = trim($_POST['email']);
                    $login_obj['password'] = trim($_POST['password']);
                    //call validation
                    $chk=$this->checkValidation($login_obj);  
                    if($chk)
                    {   
                        //call insert record            
                        $response = $this -> objsm ->selectRecord($login_obj);
						//print_r($response); die;
                        if($response>0){	
								//fill the result to session variable
								$_SESSION['MEMBER_ID'] = $response['id'];
								$_SESSION['FIRST_NAME'] = $response['first_name'];
								$_SESSION['LAST_NAME'] = $response['last_name'];
								//print_r($_SESSION);die;
							$this->pageRedirect("view/login/dashboard.php");                
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {    
                        $_SESSION['loginbl0']=serialize($login_obj);//add session obj           
                        $this->pageRedirect("view/login/index.php");                
                    }
                }
            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
        
        public function loginform(){
            include "view/login/index.php";                                        
        }
		
		public function logout(){
			unset($_SESSION['MEMBER_ID']);
			unset($_SESSION['FIRST_NAME']);
			unset($_SESSION['LAST_NAME']);
			$this->pageRedirect("/");                			
		}
		
    }
		
	
?>