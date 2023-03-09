<?php
class product extends Controller
{
    function SayHi()
    {

        $check_name = 'none_login';
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $list_categories = $this->model('product_p')->get_category();
        $list_brand = $this->model('product_p')->get_brand();
        $this->View('/navbar/header1', [
            'check_log' => $check_name,
            'title' => 'Steed | Steed Official Site',
        ]);
        $this->View('/pages/product', [
            'list_categories' => $list_categories,
            'list_brand' => $list_brand,
        ]);
    }

    function product_man()
    {
        $check_name = 'none_login';
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $list_categories = $this->model('product_p')->get_category();
        $list_brand = $this->model('product_p')->get_brand();
        $this->View('/navbar/header1', [
            'check_log' => $check_name,
            'title' => 'Steed | Steed Official Site',
        ]);
        $this->View('/pages/product', [
            'list_categories' => $list_categories,
            'list_brand' => $list_brand,
        ]);
        echo '<script type="text/javascript">
        $("#man").prop("checked", true);
        </script>';
    }
    function product_woman()
    {
        $check_name = 'none_login';
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $list_categories = $this->model('product_p')->get_category();
        $list_brand = $this->model('product_p')->get_brand();
        $this->View('/navbar/header1', [
            'check_log' => $check_name,
            'title' => 'Steed | Steed Official Site',
        ]);
        $this->View('/pages/product', [
            'list_categories' => $list_categories,
            'list_brand' => $list_brand,
        ]);
        echo '<script type="text/javascript">
        $("#woman").prop("checked", true);
        </script>';
    }
    function list_product()
    {
        $limit = $_POST['limit_number'];
        $category = $_POST['cate'];
        $brand = $_POST['brand'];
        $genders = $_POST['gender'];
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $limit;
        $result = $this->model('product_p')->get_all_product($genders, $brand, $category, $limit, $start);
        echo ' <div class="row"> ';
        while ($row = $result->fetch_assoc()) {
            $price_old = $row['price_new'] - (($row['price_new'] * $row['sale']) / 100);
            echo  '  
                 <div class="col-md-3 col-sm-6 col-xs-12  mb-4">
                    <div class="card product__card" >
                        <a href="http://localhost/steed/product/detail/' . $row['param_p'] . '"><img src="http://localhost/steed' . $row['img_p'] . '" class="card-img-top" alt="' . $row['name_p'] . '"></a>
                        <div class="card-body">
                            <a href="http://localhost/steed/product/detail/' . $row['param_p'] . '" class="card-title"><h5 title="' . $row['name_p'] . '">' . $row['name_p'] . '</h5></a>
                            <div class="price">
                            <p class="card-price-n"> Price :' . $price_old . '$</p>
                            </div>
                            
                            <button  name="id_product" value="' . $row['id_product'] . '" class="add-to-cart btn-add_cart" ><i class="fas fa-shopping-cart pr-2"></i> Add To Card </button> 
                        </div>
                    </div>
                </div>
                 ';
        }
        echo '</div>';
        $totals = $this->model('product_p')->count_products();
        $total_pages = ceil($totals / $limit);
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<span class='pagination_product' 
           style='cursor:pointer; padding:6px;
            border:1px solid #ccc;' id='" . $i . "'>" . $i . "</span>";
        }
        echo '</div><br /><br />';
    }
    function detail($n_product)
    {
        $product = $this->model('product_p');
        $detail_p = $product->GetDetail($n_product);
        $check_name = 'none_login';
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $this->View('/navbar/header1', [
            'check_log' => $check_name,
            'title' => 'Steed | Steed Official Site',

        ]);
        $this->View('/pages/detail', [
            'check_log' => $check_name,
            'detail_p' => $product->GetDetail($n_product),
        ]);
        $this->View('/navbar/footer', []);
    }
    function add_cmt()
    {
        $id_product = $_POST['id_product'];
        $content = $_POST['content'];
        $phone_cookie = $_SESSION['phone'];
        $check_name = $this->model('user_modal')->Get_Name($phone_cookie);
        $date = date("Y-m-d");
        if (isset($_POST['star'])) {
            $review_star = $_POST['star'];
        } else {
            $review_star = '';
        };
        $id_review = $this->model('product_p')->add_cmt($id_product, $content, $phone_cookie, $date, $review_star);

        echo '
            <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> 
                            <i class="fas fa-user" width="30" style="margin:10px;"></i> 
                            <span><small class="font-weight-bold text-primary">'.$check_name.'</small> 
                            <small class="font-weight-bold"> : '.$content.'</small></span>
                            </div> <small>0 day ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center before_rep">
                        <div class="reply px-4">
                            <small>Remove</small>
                            <span class="dots"></span> 
                            <small><button class="reply_cmt" value="'.$id_review.'">Reply</button></small> 
                            <span class="dots"></span> 
                            <small>Translate</small> 
                        </div>
                        <div class="icons align-items-center">
                            <div class="rating" style="position: relative;right: 0; ">
                            
                            </div>
                        </div>
                    </div>
                <div class="content_to_rep"></div>
            </div>
        ';
    }
    function load_rep_input()
    {
        $id_review = $_POST['id_review'];
        $check_name = 'none_login';
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        if ($check_name !== 'none_login') {
            echo '<div class=" d-flex justify-content-between align-items-center mb-3 comment-rep ">
            <div class="avatar_cmt d-flex justify-content-between align-items-center ">
                <i class="fas fa-user"></i>
                <p class="name_cmt">' . $check_name . '</p>
            </div>
            <input class="content_cmt_rep flex-grow-1" type="text"  placeholder="Comment in here">
            <button class="send_cmt_reply" value="' . $id_review . '" ><i class="fas fa-paper-plane"></i></button>
        </div>';
        } else {
            echo '<div class="none_login"><h4>Login to use comment</h4></div>';
        }
    }
    function add_reply_to_comment()
    {
        $id_review = $_POST['id_review'];
        $content = $_POST['content'];
        $id_product = $_POST['id_product'];
        $phone_cookie = $_SESSION['phone'];
        $date = date("Y-m-d");
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $result = $this->model('product_p')->add_cmt_reply($id_product, $content, $phone_cookie, $date, $id_review);
        echo '<script type="text/javascript">' . $result . '</script>';
        echo '
        <div class="d-flex justify-content-between align-items-center " style="margin-left:30px;">
        <div class="user d-flex flex-row align-items-center ml-3">
            - 
            <i class="fas fa-user" width="30" class="user-img rounded-circle mr-2" style="margin:10px;"></i> 
            <span><small class="font-weight-bold text-primary">' . $check_name . '</small></> 
            <small class="font-weight-bold">' . ' : ' . $content . '</small></span>
            </div><small>some minus day ago' . '</small>
         
    </div>
    
        ';
    }
    function load_Review()
    {
        $check_name = 'none_login';
        if (isset($_SESSION['phone'])) {
            $check_name = $this->model('user_modal')->Get_Name($_SESSION['phone']);
        }
        $slug = $_POST['slug'];
        $list_reviews = $this->model('product_p')->load_Review($slug);
        while ($row = mysqli_fetch_array($list_reviews)) {
            echo '<div class="card p-3 mt-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center"> 
                    <i class="fas fa-user" width="30" class="user-img rounded-circle mr-2" style="margin:10px;"></i> 
                    <span><small class="font-weight-bold text-primary">' . $row['firstname'] . ' ' . $row['lastname'] . '</small></> 
                    <small class="font-weight-bold">' . ' : ' . $row['content_review'] . '</small></span>
                    </div> <small>' . $row['DateDiff'] . ' day ago' . '</small>
            </div>
            <div class="action d-flex justify-content-between mt-2 align-items-center before_rep">
                <div class="reply px-4">
                    <small>Remove</small>
                    <span class="dots"></span> 
                    <small><button class="reply_cmt" value="' . $row['id_review'] . '">Reply</button></small> 
                    <span class="dots"></span> 
                    <small>Translate</small> 
                </div>
                <div class="icons align-items-center">
                    <div class="rating" style="position: relative;right: 0; ">
                       ';
            if ($row['star_review'] > 0) {
                for ($x = 0; $x < $row['star_review']; $x++) {
                    echo '<i class="fas fa-star fa-sm text-primary"></i>';
                };
                $n_start = 5 - $row['star_review'];
                for ($x = 0; $x < $n_start; $x++) {
                    echo '<i class="far fa-star fa-sm text-primary"></i>';
                };
            }

            echo '
                    </div>
                </div>
            </div>';
            $id_review = $row['id_review'];
            $id_product = $row['id_product'];
            $result = $this->model('product_p')->load_Review_rep($id_review, $id_product);
            while ($rows = mysqli_fetch_array($result)) {
                echo '
                <div class="d-flex justify-content-between align-items-center " style="margin-left:30px;">
                    <div class="user d-flex flex-row align-items-center ml-3">
                        - 
                        <i class="fas fa-user" width="30" class="user-img rounded-circle mr-2" style="margin:10px;"></i> 
                        <span><small class="font-weight-bold text-primary">' . $rows['firstname'] . ' ' . $rows['lastname'] . '</small></> 
                        <small class="font-weight-bold">' . ' : ' . $rows['content_review'] . '</small></span>
                    </div> <small>' . $rows['DateDiff'] . ' day ago' . '</small>
                </div>
                ';
            }

            echo '
        <div class="content_to_rep"></div>
        </div>';
        }
    }
}
