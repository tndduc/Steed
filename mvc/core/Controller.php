<?php 
    class Controller{
        public function model($model){
            require_once'./mvc/modals/'.$model.'.php';
            return new $model;
        }
        public function View($view,$data=[]){
            require_once'./mvc/views/'.$view.'.php';
            // return new $view;
        }
        public function Upload_product($data){
            if(!file_exists('./public/images/product/'.$_FILES[''.$data.'']['name'])){
                move_uploaded_file($_FILES[''.$data.'']['tmp_name'],'./public/images/product/'.$_FILES[''.$data.'']['name']);
            }
            $string = '/public/images/product/'.$_FILES[''.$data.'']['name'];
            return $string;
        }
         function to_slug($str) {
            $str = trim(mb_strtolower($str));
            $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
            $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
            $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
            $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
            $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
            $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
            $str = preg_replace('/(đ)/', 'd', $str);
            $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
            $str = preg_replace('/([\s]+)/', '-', $str);
            return $str;
        }
    }
    
?>