<?php 
    class user_modal extends DB {
        public function get_name_id($id_user) { 
            $sql="SELECT * FROM `user` WHERE id_user= $id_user";
            $rows=mysqli_query($this->con,$sql);
            if(mysqli_num_rows($rows)>0){
                while($row = mysqli_fetch_assoc($rows)) {
                $name_db = $row['firstname'].' '.$row['lastname'];
                }
            }
            return $name_db;
        }
        public function check_admin($phone){
            $sql="SELECT id_user FROM user WHERE phone ='$phone' and level = 5";
            $rows = mysqli_query($this->con,$sql);
            $result = false;
            if(mysqli_num_rows($rows)==1){
                $result=true;
            }
            return $result;
        }
        public function check_admin_log($phone,$password){
            $sql="SELECT * FROM user WHERE phone ='$phone' and level = 5";
            $rows = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($rows)>0){
                while($row = mysqli_fetch_assoc($rows)) {
                    $password_db= $row['password'];
                }
            }
            if (password_verify($password, $password_db)) {
                return true;
            } else {
                return false;
            }
        }
        public function Insert_User($first_name, $last_name, $email, $password ,$phone,$level){
            $sql = "INSERT INTO `user`(`id_user`, `firstname`, `lastname`, `email`, `phone`, `password`, `level`)
             VALUES (null,'$first_name','$last_name','$email','$phone','$password',$level)";
             
             $result = false;
             if(mysqli_query($this->con,$sql)){
                 $result=true;
             }
             return json_encode($result);
        }
        public function Check_phone($number){
            $sql="SELECT id_user FROM user WHERE phone ='$number'";
            $rows = mysqli_query($this->con,$sql);
            $result = false;
            if(mysqli_num_rows($rows)==1){
                $result=true;
            }
            return $result;
        }
        public function check_user($phone,$password){
            $sql="select password from user WHERE phone = '$phone'";
            $rows = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($rows)>0){
                while($row = mysqli_fetch_assoc($rows)) {
                    $password_db= $row['password'];
                }
            }
            if (password_verify($password, $password_db)) {
                return true;
            } else {
                return false;
            }
        }
        public function Get_Name($phone){
                $sql="select * from user WHERE phone = '$phone'";
                $rows = mysqli_query($this->con,$sql);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $name_db = $row['firstname'].' '.$row['lastname'];
                    }
                }
                return $name_db;
        }
        public function Get_user(){
            $sql="SELECT * FROM `user` WHERE 1";
            $rows = mysqli_query($this->con,$sql);
            return $rows;
        }
    }



?>