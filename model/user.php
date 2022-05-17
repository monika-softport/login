<?php

class user
{
    // table fields
    public $id;
    public $last_name;
    public $first_name;
    // message string
    public $email;
	public $password
    public $password_msg;
    public $name_msg;
    // constructor set default value
    function __construct()
    {
        $id=0;$first_name=$last_name=$password="";
        $id_msg=$name_msg=$password_msg="";
    }
}

?>