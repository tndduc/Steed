<?php 
    class cart extends Controller {
        
        function SayHi()
        {   $check_name='none_login';
            if(isset($_SESSION['phone'])){
                $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
           
                $this->View('/navbar/header1', [
                    'check_log'=> $check_name,
                    'title' => 'Steed | Steed Official Site',
                ]);
                $phone_cookie=$_SESSION['phone'];
                $list_products = $this->model('product_p')->load_cart($phone_cookie);
                
                $this->View('/pages/cart', [
                    'check_log'=> $check_name,
                    'list_product'=>$list_products,
                ]);
                $this->View('/navbar/footer', []);
            }else{
                header('location: http://localhost/steed/login');
            }
            
        }
        function view_check_out(){
                
                $phone_cookie=$_SESSION['phone'];
                $list_products = $this->model('product_p')->load_cart($phone_cookie);
                $stt=1;
                $all_total=0;
                echo'
                    <div class="table-check-out">
                    <table class="table table-dark ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody >
                ';
                while ($row =$list_products-> fetch_assoc())  {
                    echo '

                            <tr>
                                <th scope="row">'.$stt.'</th>
                                <td id="name_check_out">'.$row['name_p'].'</td>
                                <td>'.$row['price_new'].'</td>
                                <td>'.$row['quantity_product'].'</td>
                                <td>'.$row['total'].'</td>
                            </tr>';
                           $stt++;
                           

                        
                    $all_total+=$row['total'];
                }
                echo' </tbody>
                </table>
                </div>
                <div class="total_check_out"> <h4> Total price : $ '.$all_total.'</h4> </div> ';


        }
        function add_cart(){
            if(isset($_POST['size_product'])){
                $size_product=$_POST['size_product'];
            }else{

                $size_product = '\'\'';
            }
            if(isset($_POST['$quantity_product'])){
                $quantity_product=$_POST['quantity_product'];
            }else{

                $quantity_product = 1;
            }
            
            if(isset($_SESSION['phone'])){
                $phone_cookie = $_SESSION['phone'];
                $id_product = $_POST['id_product'];
            //     $result = $this->model('product_p')->add__cart($id_product,$phone_cookie,$size_product,$quantity_product);
            //    echo $result;
            $add_cart = $this->model('product_p')->add__cart($id_product,$phone_cookie,$size_product,$quantity_product);
            echo $add_cart;
            }
        }
        function delete_cart(){
            if(isset($_SESSION['phone'])){
                $phone_cookie = $_SESSION['phone'];
                $id_product = $_POST['id_product'];
            }
            $delete_cart = $this->model('product_p')->minus_cart($id_product,$phone_cookie);
            echo $delete_cart;
        }
        function delete_cart_all(){
            if(isset($_SESSION['phone'])){
                $phone_cookie = $_SESSION['phone'];
                $id_product = $_POST['id_product'];
            }
            $delete_cart = $this->model('product_p')-> delete_all($id_product,$phone_cookie);
            echo $delete_cart;
        }
        function check_out(){
            if(isset($_SESSION['phone'])){
                $phone_cookie = $_SESSION['phone'];
                $bank = $_POST['bank_payment'];
                $freight = $_POST['freight_type'];
                $pay_all= $this->model('product_p')->add_to_bill($bank,$freight,$phone_cookie);
                echo $pay_all;
                
            }
            header('location: http://localhost/steed/cart');
        }
    }
?>