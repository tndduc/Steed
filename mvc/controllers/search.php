<?php
class search extends Controller
{
    

    function SayHi()
    {   
        $check_name='none_login';
        if(isset($_SESSION['phone'])){
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $data=$_POST['search'];
         $limit=8;
        if (isset($_POST["page"])) {
            $page = $_POST["page"];
        } else {
            $page = 1;
        };
        
        $start = ($page - 1) *  $limit;
        $products=$this->model('product_p')->search_products_post($data,$start,$limit);
        $totals = $this->model('product_p')->count_products();
        $total_pages = ceil($totals / $limit);
        $this->View('/navbar/header1', [
            'check_log'=> $check_name,
            'title' => 'Steed | Steed Official Site',
        ]);
        $this->View('/pages/search', [
            'total_pages'=>$total_pages,
            'data_search'=>$data,
            'products'=> $products,
            'totals'=>$totals
        ]);
        $this->View('/navbar/footer', []);
        
    }

    function search_ajax(){
        $data=$_POST["search"];
        $products= $this->model('product_p')->search_products($data);
        echo ' <div class="d-flex"> ';
        while ($row =$products-> fetch_assoc()){
            $price_old= $row['price_new']-(($row['price_new']*$row['sale'])/100) ;
           echo  '  
                 <div class="col-md-3 col-sm-6 col-xs-12  mb-4">
                    <div class="card product__card" >
                        <a href="http://localhost/steed/product/detail/' . $row['param_p'] . '"><img src=".' . $row['img_p'] . '" class="card-img-top" alt="' . $row['name_p'] . '"></a>
                        <div class="card-body">
                            <a href="http://localhost/steed/product/detail/' . $row['param_p'] . '" class="card-title"><h5 title="' . $row['name_p'] . '">' . $row['name_p'] . '</h5></a>
                            <div class="price">
                            <p class="card-price-n"> Price :' . $price_old. '$</p>
                            </div>
                            
                            <button  name="id_product" value="' . $row['id_product'] . '" class="add-to-cart btn-add_cart" ><i class="fas fa-shopping-cart pr-2"></i> Add To Card </button> 
                        </div>
                    </div>
                </div>
                 ';
        }
        echo '</div>';
    }
}