<?php
class Home extends Controller
{
    
    
    function SayHi()
    {   $check_name='none_login';
        if(isset($_SESSION['phone'])){
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $top_sold_out=$this->model('product_p')->get_top_sold();
        $this->View('/navbar/header1', [
            'check_log'=> $check_name,
            'title' => 'Steed | Steed Official Site',
        ]);
        $this->View('/pages/home', [
            'top_sold_out'=>$top_sold_out,
        ]);
        $this->View('/navbar/footer', []);
        
    }
    
   
}
