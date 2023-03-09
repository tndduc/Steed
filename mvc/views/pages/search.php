 <div class="container mt-5">
     <h3>The product name is: <?php echo '<span style="color:#7E1117">'.$data['data_search'].'</span>'; ?></h3>
 </div>
 
 <div class="container">
 <div class="row"> 
     <?php 
        while ($row =$data['products']-> fetch_assoc()){
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
        
        for ($i = 1; $i <= $data['total_pages']; $i++) {
           echo "
            
           <button>" . $i . "</button>";
        }
        ?>
       </div>