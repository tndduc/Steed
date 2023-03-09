<?php 
    class DB{
        public $con;
        public $servername = 'localhost';
        public $username = 'root';
        public $password = '';
        public $database = 'steed';

        function __construct(){
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con,$this->database);
            mysqli_query($this->con,"SET NAMES 'utf8'");
        }

         
        // Lấy tổng số sản phẩm
        

    }
