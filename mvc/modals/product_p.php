<?php
    class product_p extends DB{
        public function get_type(){
            $sql="SELECT * FROM `type_product` WHERE 1";
            return mysqli_query($this->con,$sql);
        }
        public function get_category_id($id_category){
            $sql="SELECT * FROM `category` WHERE id_category=$id_category";
            return mysqli_query($this->con,$sql);
        }
        public function get_top_sold(){
            $sql="SELECT   `product`.`name_p`, `product`.`param_p`,
            `product`.`img_p`, `product`.`img_p-1`, `product`.`img_p-2`, `product`.`img_p-3`,
             `product`.`img_p-4`, `product`.`price_new`, `product`.`sale`, `product`.`brand`,
              `product`.`type_p`, `product`.`size_p`, `product`.`date_update`,
               `product`.`id_category`, `product`.`quantity`, `product`.`sold`,
               type_product.id,type_product.type_name, brand.name_brand ,brand.id_brand ,
               category.id_category,category.name_category,
               type_product.id,type_product.type_name, brand.name_brand ,brand.id_brand ,
               category.id_category,category.name_category,
                detail_bill.id_product,product.id_category, COUNT(product.id_product) as num
                FROM detail_bill,product,type_product,brand,category
                WHERE detail_bill.id_product=product.id_product AND product.type_p=type_product.id AND product.id_category=category.id_category AND product.brand=brand.id_brand
                GROUP by product.id_product
                ORDER BY  num DESC LIMIT 0,8";
            return mysqli_query($this->con,$sql);
        }
        public function get_sum_quantity($month_now){
            $data='';
            $fake=[];
            for( $i=1;$i<=$month_now;$i++){
                // $sql="SELECT SUM(detail_bill.quantity_product) AS 'data',bill.id_bill,detail_bill.id_bill
                // FROM bill,detail_bill
                // WHERE  MONTH(d_purchase)='$i'  AND bill.id_bill=detail_bill.id_bill";
                $qr="SELECT COUNT(id_bill) AS 'data'
                FROM bill
                WHERE  MONTH(d_purchase)='$i'";
               $rows = mysqli_query($this->con,$qr);
               
                   while($row = mysqli_fetch_assoc($rows)) {
                   $value = $row['data'];
                   if($value==null){
                    $value=0;
                   }
                   $fake[]= $value;
                   }
                   $data=implode(',',$fake);
            }
            return $data;
            
        }
        public function delete_category($id_category){
            $sql="DELETE FROM `category`  WHERE id_category=$id_category";
            return mysqli_query($this->con,$sql);
        }
        public function edit_category($id_category,$name_category){
            $sql="UPDATE `category` SET `name_category`='$name_category' WHERE id_category=$id_category";
            return mysqli_query($this->con,$sql);
        }
        public function add_category($name_category){
            $sql="INSERT INTO `category`(`name_category`) VALUES ('$name_category')";
            return mysqli_query($this->con,$sql);
        }
        public function get_category(){
            $sql="SELECT * FROM `category` WHERE 1";
            return mysqli_query($this->con,$sql);
        }
        public function get_brand(){
            $sql="SELECT * FROM `brand` WHERE 1";
            return mysqli_query($this->con,$sql);
        }
        public function get_type_product(){
            $sql="SELECT * FROM `type_product` WHERE 1";
            return mysqli_query($this->con,$sql);
        }
        function get_bill_id($id_bill){
            $sql="SELECT * FROM `bill` WHERE id_bill=$id_bill";
            return mysqli_query($this->con,$sql);
        }
        function get_detail_bill($id_bill){
            $sql="SELECT * FROM `detail_bill` WHERE id_bill=$id_bill";
            return mysqli_query($this->con,$sql);
        }
        function get_product_category($category){
            $sql="SELECT `product`.`id_product`, `product`.`name_p`, `product`.`param_p`,
            `product`.`img_p`, `product`.`img_p-1`, `product`.`img_p-2`, `product`.`img_p-3`,
             `product`.`img_p-4`, `product`.`price_new`, `product`.`sale`, `product`.`brand`,
              `product`.`type_p`, `product`.`size_p`, `product`.`date_update`,
               `product`.`id_category`, `product`.`quantity`, `product`.`sold`,
               type_product.id,type_product.type_name, brand.name_brand ,brand.id_brand ,
               category.id_category,category.name_category FROM `product`,type_product,brand,category
                WHERE product.type_p=type_product.id AND product.id_category=category.id_category AND product.brand=brand.id_brand 
                AND product.id_category=$category";
            return mysqli_query($this->con,$sql);
        }
        public function upload_product($name_product,$slug, $img_p, $img_p_1, $img_p_2, 
        $img_p_3, $img_p_4, $price_new,$sale, $description,$gender, $type_p,$id_category,$brand,$size_p,$day, $quantity){
            $sql="INSERT INTO `product`(`name_p`, `param_p`, `img_p`, `img_p-1`, `img_p-2`, `img_p-3`, 
            `img_p-4`, `price_new`, `sale`, `description`, `gender`, `type_p`, `id_category`, `brand`, `size_p`,
             `date_update`, `quantity`) VALUES ('$name_product','$slug','$img_p','$img_p_1','$img_p_2',
             '$img_p_3','$img_p_4',$price_new,$sale,'$description','$gender',$type_p,$id_category,
             $brand,'$size_p','$day',$quantity)";
            $execute= mysqli_query($this->con,$sql);
            return $sql;
        }
        public function editProduct($id_product,$name_product,$slug, $img_p, $img_p_1, $img_p_2, 
        $img_p_3, $img_p_4, $price_new, $sale, $description,$gender, $type_p,  $id_category,$brand, $size_p,$day, $quantity, $sold){
            $sql="UPDATE `product` SET `name_p`='$name_product',`param_p`='$slug'
            ,`img_p`='$img_p',`img_p-1`='$img_p_1',`img_p-2`='$img_p_2',`img_p-3`='$img_p_3',
            `img_p-4`='$img_p_4',`price_new`=$price_new,`sale`=$sale,`description`=
            '$description',`gender`='$gender',`type_p`=$type_p,`id_category`=$id_category,
            `brand`=$brand,`size_p`='$size_p',`date_update`='$day',
            `quantity`='$quantity',`sold`='$sold' WHERE id_product= $id_product";

            $execute= mysqli_query($this->con,$sql);
            return $sql;
        }
        public function search_products($data){
            $sql="SELECT * FROM `product` WHERE name_p LIKE '%$data%'";
            return mysqli_query($this->con,$sql);
        }
        public function search_products_post($data,$start_from,$record_per_page){
            $sql = "SELECT * FROM product WHERE name_p LIKE '%$data%'ORDER BY id_product  DESC LIMIT $start_from, $record_per_page";
            return mysqli_query($this->con,$sql);
        }
        public function get_bill(){
            $qr = "SELECT * FROM bill,user WHERE bill.id_user=user.id_user";
            return mysqli_query($this->con,$qr);
             
        }
        public function GetProduct(){
            $qr = "SELECT `product`.`id_product`, `product`.`name_p`, `product`.`param_p`,
            `product`.`img_p`, `product`.`img_p-1`, `product`.`img_p-2`, `product`.`img_p-3`,
             `product`.`img_p-4`, `product`.`price_new`, `product`.`sale`, `product`.`brand`,
              `product`.`type_p`, `product`.`size_p`, `product`.`date_update`,
               `product`.`id_category`, `product`.`quantity`, `product`.`sold`,
               type_product.id,type_product.type_name, brand.name_brand ,brand.id_brand ,
               category.id_category,category.name_category FROM `product`,type_product,brand,category
                WHERE product.type_p=type_product.id AND product.id_category=category.id_category AND product.brand=brand.id_brand";
            return mysqli_query($this->con,$qr);
             
        }
        public function GetProduct_id($id_product){
            $qr = "SELECT * FROM product where id_product= $id_product";
            return mysqli_query($this->con,$qr);
             
        }
        public function Get_id_from_slug($slug){
            $sql1= "select id_product from product where param_p = '$slug'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_product = $row['id_product'];
                    }
                };
            return $id_product;
        }
        public function delete_product($id_product){
            $ql="DELETE FROM `product` WHERE id_product= $id_product";
            return mysqli_query($this->con,$ql);
        }
        public function GetDetail($name_product){
            $sqr = "SELECT * FROM product WHERE param_p = '$name_product'";
            return mysqli_query($this->con,$sqr);
        }

        function count_products()
        {
            
            $query = mysqli_query($this->con, 'select count(*) as total from product');
            if ($query){
                $row = mysqli_fetch_assoc($query);
                return $row['total'];
            }
            return 0;
        }
        
        // Lấy bài viết theo số trang
        function get_all_product($genders, $brand, $category,$limit, $start)
        {
            $sql = "SELECT * FROM product WHERE gender
             IN ($genders) AND id_category IN ($category) AND brand IN ( $brand) 
              ORDER BY id_product  DESC LIMIT  $start, $limit";
            $query = mysqli_query($this->con, $sql);
        
            return $query;
        }
        public  function get_id_user($phone_cookie){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
        }
        function add__cart($id_product,$phone_cookie,$size_product,$quantity_product){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
            $sql_check = "select * from cart_shop where id_user  = $id_user and id_product= $id_product";
            $rows_check = mysqli_query($this->con,$sql_check);
                while($row = mysqli_fetch_assoc($rows_check)) {
                    $quantity_product = $row['quantity_product'];
                }
                if(mysqli_num_rows($rows_check)>0){
                    $quantity_product+=1;
                    $sql = "UPDATE cart_shop
                    SET quantity_product=$quantity_product,
                    size_product=$size_product WHERE id_user= $id_user AND id_product= $id_product";
                    $query = mysqli_query($this->con,$sql);
                    return $query;
                }else{
                    $sql = "INSERT INTO `cart_shop`(`id_cart`, `id_product`, `id_user`, `quantity_product`, `size_product`)
                    VALUES ('',$id_product,$id_user,$quantity_product,$size_product) ";
                    $query = mysqli_query($this->con,$sql);
                    return $query;
                }
        }

        function load_cart($phone_cookie){
            
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };

            
            $sql= "SELECT user.id_user,product.id_product,product.img_p,product.name_p,
            product.price_new,product.quantity,product.sold,cart_shop.quantity_product,cart_shop.size_product,
            (product.price_new*cart_shop.quantity_product) 
            AS total FROM product,cart_shop,user WHERE
            cart_shop.id_product=product.id_product AND
            cart_shop.id_user=user.id_user AND cart_shop.id_user = $id_user ";
            $result= mysqli_query($this->con,$sql);
            return $result;
        }
        function minus_cart($id_product,$phone_cookie){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
            $sql_check = "select * from cart_shop where id_user  = $id_user and id_product= $id_product";
            $rows_check = mysqli_query($this->con,$sql_check);
                while($row = mysqli_fetch_assoc($rows_check)) {
                    $quantity_product = $row['quantity_product'];
                }
                if($quantity_product>1){
                    $quantity_product-=1;
                    $sql = "UPDATE cart_shop
                    SET quantity_product=$quantity_product
                    WHERE id_user= $id_user AND id_product= $id_product";
                    $query = mysqli_query($this->con,$sql);
                    return $sql;
                }elseif($quantity_product=1){
                    $sql="DELETE FROM `cart_shop` WHERE id_user= $id_user AND id_product = $id_product";
                    $query= mysqli_query($this->con,$sql);
                    return 'delete_all';
                }
            
        }
        function delete_all($id_product,$phone_cookie){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
            $sql="DELETE FROM `cart_shop` WHERE id_user= $id_user AND id_product = $id_product";
            $query= mysqli_query($this->con,$sql);
            return 'delete_all';
        }
        function add_to_bill($bank,$freight,$phone_cookie){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
                $sql="SELECT user.id_user,product.id_product,product.img_p,product.name_p,
                product.price_new,cart_shop.quantity_product,cart_shop.size_product,
                (product.price_new*cart_shop.quantity_product) 
                AS total FROM product,cart_shop,user WHERE
                cart_shop.id_product=product.id_product AND
                cart_shop.id_user=user.id_user AND cart_shop.id_user = $id_user ";
                $rows = mysqli_query($this->con,$sql);
                $total=0;
                $date=date('Y-m-d');
                $ar_id_product=[];
                $ar_quantity_product=[];
                $ar_name_product=[];
                $ar_price_product=[];
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $ar_id_product[]=$row['id_product'];
                    $ar_quantity_product[]=$row['quantity_product'];
                    $ar_name_product[]=$row['name_p'];
                    $ar_price_product[]=$row['price_new'];
                    $total+=$row['total'];
                    }
                    $sql="INSERT INTO `bill`(`id_user`, `d_purchase`, `status_bill`, `freight`, `bank`, `total_bill`) 
                    VALUES ($id_user,'$date','','$freight','$bank',$total)";
                     mysqli_query($this->con,$sql);
                    $sql3="SELECT * FROM `bill` WHERE id_user=$id_user ORDER BY id_bill DESC LIMIT 0,1";
                    $result=mysqli_query($this->con,$sql3);
                    while($results = mysqli_fetch_assoc($result)) {
                        $id_bill=$results['id_bill'];
                    }
                    $l = count($ar_id_product);
                    for ($i = 0; $i < $l; $i++) { 
                        $sql="UPDATE `product` SET `sold`= (sold+$ar_quantity_product[$i]) WHERE 
                        id_product = $ar_id_product[$i]";
                        mysqli_query($this->con,$sql);
                        $qr="INSERT INTO `detail_bill`(`id_bill`, `id_product`, `name_product`,
                         `price_product`, `quantity_product`) 
                        VALUES ($id_bill,$ar_id_product[$i],'$ar_name_product[$i]',$ar_price_product[$i],$ar_quantity_product[$i])";
                        mysqli_query($this->con,$qr);
                    }
                     $sql2="DELETE FROM `cart_shop` WHERE id_user = $id_user";
                     mysqli_query($this->con,$sql2);
                   
                };
                
        }
        function load_Review($slug){
            $sql1= "select id_product from product where param_p = '$slug' ";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_product = $row['id_product'];
                    }
                };
            $sql="SELECT reviews.rep_to_id, user.id_user,reviews.id_review,product.id_product,reviews.id_product,
            reviews.id_review ,user.firstname,user.lastname,reviews.content_review,reviews.star_review,
             DATEDIFF(CURRENT_TIME(),reviews.d_review) AS DateDiff FROM product,reviews,user 
             WHERE reviews.id_product = product.id_product AND 	reviews.rep_to_id=0 AND reviews.id_user=user.id_user AND
             reviews.id_product= $id_product ORDER BY reviews.id_review  DESC";
             $rows = mysqli_query($this->con,$sql);
             return $rows;
        }
        function load_Review_rep($id_review,$id_product){
            $sql="SELECT reviews.rep_to_id, user.id_user,reviews.id_review,product.id_product,reviews.id_product,
            reviews.id_review ,user.firstname,user.lastname,reviews.content_review,reviews.star_review,
             DATEDIFF(CURRENT_TIME(),reviews.d_review) AS DateDiff FROM product,reviews,user 
             WHERE reviews.id_product = product.id_product AND 	reviews.rep_to_id=$id_review AND reviews.id_user=user.id_user AND
             reviews.id_product= $id_product ORDER BY reviews.id_review ";
             $rows = mysqli_query($this->con,$sql);
             return $rows;
        }
        function add_cmt($id_product,$content,$phone_cookie,$date,$review_star){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
            $sql="INSERT INTO `reviews`(`id_product`, `id_user`, `content_review`, `d_review`, `star_review`) 
            VALUES ($id_product,$id_user,'$content','$date','$review_star')";
             mysqli_query($this->con,$sql);
             $sql1="SELECT * FROM `reviews` WHERE id_product=$id_product AND id_user=$id_user AND d_review='$date'   ORDER BY id_review DESC LIMIT 0,1 ";
             $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_review = $row['id_review'];
                    }
                };
             return $id_review;
        }
        function add_cmt_reply($id_product,$content,$phone_cookie,$date,$id_review){
            $sql1= "select id_user from user where phone = '$phone_cookie'";
            $rows = mysqli_query($this->con,$sql1);
                if(mysqli_num_rows($rows)>0){
                    while($row = mysqli_fetch_assoc($rows)) {
                    $id_user = $row['id_user'];
                    }
                };
                $sql="INSERT INTO `reviews`( `rep_to_id`, `id_product`, `id_user`, 
                `content_review`, `d_review`) 
                VALUES ($id_review,$id_product,$id_user,'$content','$date')";
                 mysqli_query($this->con,$sql);
        }
    }

?>