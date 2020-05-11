<?php  

class Database 
{
    protected $hostname   = "localhost";
    protected $username   = "root";
    protected $password   = "";
    protected $database   = "db_bs23";  

    public $db;

    public function __construct()
    {
        $conn = new \mysqli(
            $this->hostname, 
            $this->username, 
            $this->password, 
            $this->database
        );

        if ($conn->connect_error) 
        {
            die('Could not connect: ' . mysqli_error());
        }  

        $this->db = $conn; 
    } 

}
 

 