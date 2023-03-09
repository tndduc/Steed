<?php
class admin_steed extends Controller
{
    
    function SayHi(){   
        if(isset($_SESSION['phone'])){
            $phone= $_SESSION['phone'];
            $admin=$this->model('user_modal')->check_admin($phone);
            if($admin==true){
                $check_name = $this->model('user_modal')->Get_Name($phone);
                $list_user = $this->model('user_modal')->Get_user();
                $list_product = $this->model('product_p')->GetProduct();
                $list_bill = $this->model('product_p')->get_bill();
                $list_type = $this->model('product_p')->get_type();
                $list_category = $this->model('product_p')->get_category();
                $list_category2 = $this->model('product_p')->get_category();
                $list_brand= $this->model('product_p')->get_brand();
                $month_now= date('m');
                $list_data= $this->model('product_p')->get_sum_quantity($month_now);
                
               
                $html='';
                while ($row = $list_category-> fetch_assoc()){
                    $html.='<option value="' . $row['id_category'] . '">' . $row['name_category'] . '</option>';
                }
                $this->View('navbar/header2',[
                    'check_log'=>$check_name,
                ]);
                $this->View('/admin', [
                    'list_user'=>$list_user,
                    'list_product'=>$list_product,
                    'list_bill'=>$list_bill,
                    'list_type'=>$list_type,
                    'list_category'=>$list_category2,
                    'cate'=>$html,
                    'list_brand'=>$list_brand,
                    'list_data'=>$list_data,
                ]);
            }else{
                header("location:/steed/admin_steed/login");
            }
        }else{
            header("location:/steed/admin_steed/login");
            
        }
        
    }
    function view_detail_bill(){
        $id_bill= $_POST['id_bill'];
        $result=$this->model('product_p')->get_bill_id($id_bill);
        $html='';
        while ($row = $result-> fetch_assoc()){
            $id_bill=$row['id_bill'];
            $detail_bill=$this->model('product_p')->get_detail_bill($id_bill);
            $id_user= $row['id_user'];
            $name_user= $this->model('user_modal')->get_name_id($id_user);
            $index=1;
            $total=0;
            $total_all=0;

            $html.='
                <div class="information_bill">
                    <p class="name_user">Name Buyer : '. $name_user.'</p>
                    <p>Date Purchase '.$row['d_purchase'].'</p>
                    <p>Freight forwarder : '.$row['freight'].'</p>
                    <p>Bank payment : '.$row['bank'].'</p>
                </div>
                <div class="table_detail_bill">
                    <table class="table table-dark ">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody >
            ';
          
            while ($rows = $detail_bill-> fetch_assoc()){
                $total=$rows['quantity_product'] * $rows['price_product'] ;
                $total_all+=$total;
               $html.= '
                <tr>
                    <th scope="row">' . $index . '</th>
                    <td>'.$rows['name_product'].'</td>
                    <td>'.$rows['quantity_product'].'</td>
                    <td>' .$rows['price_product']. '</td>
                    <td>'.$total.'</td>
                </tr>';
                $index++;
            }
            $html.=' 
                    </tbody>
                </table>
            </div>';
            $html.='
                <div class="total_all">
                    <h4>ToTal All : '.$total_all.'</h4>
                </div>
            ';
            echo $html;
        }
    }
    
    function product($category){
        $result=$this->model('product_p')->get_product_category($category);
        $this->View('navbar/header2',[]);
        $this->View('admin/product',[
            'list_product'=>$result,
        ]);
    }
    function get_category_id(){
        $id_category= $_POST['id_category'];
        $list_category = $this->model('product_p')->get_category_id($id_category);
        while ($row = $list_category-> fetch_assoc()){
            echo '
            <h2>Edit Category</h2>
            <form action="./admin_steed/edit_category" method="post">
                <div >Old Name
                    <input type="text" id="old_category" value="'.$row['name_category'].'" disabled>
                </div>
                <input type="hidden" name="id_category" value="'.$row['id_category'].'">
                <input type="text" name="name_category">
                <button type="submit">Edit Category</button>
            </form>
            ';
        }
    }
    function delete_category(){
        $id_category= $_POST['id_category'];
        $result=$this->model('product_p')->delete_category($id_category);
        header("location:/steed/admin_steed");
    }
    function edit_category(){
        $id_category = $_POST['id_category'];
        $name_category = $_POST['name_category'];
        $result=$this->model('product_p')->edit_category($id_category,$name_category);
        header("location:/steed/admin_steed");
    }
    function add_category(){
        if(isset($_SESSION['phone'])){
            $phone= $_SESSION['phone'];
            $admin=$this->model('user_modal')->check_admin($phone);
            if($admin==true){
               $name_category = $_POST['name_category'];
               $add_category =$this->model('product_p')->add_category($name_category);
               header("location:/steed/admin_steed");
            }else{
                header("location:/steed/admin_steed/login");
            }
        }else{
            header("location:/steed/admin_steed/login");
        }
    }
    function register(){
        if(isset($_SESSION['phone'])){
            $phone= $_SESSION['phone'];
            $admin=$this->model('user_modal')->check_admin($phone);
            $check_name = $this->model('user_modal')->Get_Name($phone);
            if($admin==true){
                $this->View('navbar/header2',[
                    'check_log'=>$check_name,
                ]);
                $this->View('/admin/register', [
                    
                ]);
            }
        }else{
            
            header("location:/steed/admin_steed/login");
        }
    }
    function sign_up(){
        if (isset($_POST['submit_register'])) {
            $level = $_POST['level'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $kq = $this->model('user_modal')->Insert_User($first_name, $last_name, $email, $password, $phone, $level);
            $this->View('pages/register', [
                'kq' => $kq,
            ]);
        }
    }
    function logout(){
        unset ($_SESSION['phone']);
        header("location:/steed/admin_steed/login");
    }
    function login(){
        unset ($_SESSION['phone']);
        $this->View('admin/login',[
           
        ]);
    }
    function check_login(){
        $phone= $_POST['phone'];
        $password= $_POST['password'];
        $result=$this->model('user_modal')->check_admin_log($phone,$password);
        if($result==true){
            $_SESSION['phone']=$phone;
            header('location:http://localhost/steed/admin_steed');
        }else{
            header('location:http://localhost/steed/admin_steed/login');
        }
    }
    function update_product($id){
        if(isset($_SESSION['phone'])){
            $phone= $_SESSION['phone'];
            $admin=$this->model('user_modal')->check_admin($phone);
            if($admin==true){
                $check_name = $this->model('user_modal')->Get_Name($phone);
                $list_user = $this->model('user_modal')->Get_user();
                $product=$this->model('product_p')->GetProduct_id($id);
                $list_bill = $this->model('product_p')->get_bill();
                $list_type = $this->model('product_p')->get_type();
                $list_category = $this->model('product_p')->get_category();
                $list_brand= $this->model('product_p')->get_brand();
                $this->View('navbar/header2',[
                    'check_log'=>$check_name,
                ]);
                $this->View('admin/update', [
                    'list_user'=>$list_user,
                    'product'=>$product,
                    'list_bill'=>$list_bill,
                    'list_type'=>$list_type,
                    'list_category'=>$list_category,
                    'list_brand'=>$list_brand,
                    'id_product'=>$id,
                ]);
            }else{
                header("location:/steed/admin_steed/login");
            }
        }else{
            header("location:/steed/admin_steed/login");
        }
    }
    function edit(){
        echo $_POST['old_img_p'];
        $id_product= $_POST['id_product'];
        $name_product= $_POST['name_product'];
        $slug=$this->to_slug($name_product);
        $img_p=$this->Upload_product('img_p');
        if($img_p=='/public/images/product/'){
            $img_p=$_POST['old_img_p'];
        };
        $img_p_1=$this->Upload_product('img_p-1');
        if($img_p_1=='/public/images/product/'){
            $img_p_1=$_POST['old_img_p-1'];
        };
        $img_p_2=$this->Upload_product('img_p-2');
        if($img_p_2=='/public/images/product/'){
            $img_p_2=$_POST['old_img_p-2'];
        };
        $img_p_3=$this->Upload_product('img_p-3');
        if($img_p_3=='/public/images/product/'){
            $img_p_3=$_POST['old_img_p-3'];
        };
        $img_p_4=$this->Upload_product('img_p-4');
        if($img_p_4=='/public/images/product/'){
            $img_p_4=$_POST['old_img_p-4'];
        };
        $price_new= $_POST['price_new'];
        $sale=$_POST['sale'];
        $description= $_POST['description'];
        $type_p= $_POST['type_p'];
        $brand= $_POST['brand'];
        $size_p= $_POST['size_p'];
        $day= date("Y-m-d");
        $quantity= $_POST['quantity'];
        $sold= $_POST['sold'];
        $gender=$_POST['gender'];
        $id_category =$_POST['id_category'];
        $edit=$this->model('product_p')->editProduct($id_product,$name_product,$slug, $img_p, $img_p_1, $img_p_2, 
        $img_p_3, $img_p_4, $price_new, $sale, $description,$gender, $type_p,  $id_category,$brand, $size_p,$day, $quantity, $sold);
        echo $edit;
         header('location: http://localhost/steed/admin_steed');
    }
    function upload(){
        $name_product= $_POST['name_product'];
        $slug=$this->to_slug($name_product);
        $img_p=$this->Upload_product('img_p');
        $img_p_1=$this->Upload_product('img_p-1');
        $img_p_2=$this->Upload_product('img_p-2');
        $img_p_3=$this->Upload_product('img_p-3');
        $img_p_4=$this->Upload_product('img_p-4');
        $price_new= $_POST['price_new'];
        $sale= $_POST['sale'];
        $description= $_POST['description'];
        $type_p= $_POST['type_p'];
        $brand= $_POST['brand'];
        $size_p= $_POST['size_p'];
        $day= date("Y-m-d");
        $quantity= $_POST['quantity'];
        $gender=$_POST['gender'];
        $id_category =$_POST['id_category'];
        $upload=$this->model('product_p')->upload_product($name_product,$slug, $img_p, $img_p_1, $img_p_2, 
        $img_p_3, $img_p_4, $price_new,$sale, $description,$gender, $type_p,$id_category,$brand,$size_p,$day, $quantity);
        echo $upload;

    }
    function delete_product(){
        $id_product=$_POST['id_product'];
        $delete_product = $this->model('product_p')->delete_product($id_product);
        echo $delete_product;
    }
}
?>