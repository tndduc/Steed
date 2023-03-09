
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./public/images/Web_f/Banner/banner2.png" class="d-block w-100 img-banner" alt="...">
            <div class="carousel-caption  content__shoes w-100   flex-column justify-content-center">
                <div class=" bounce ">
                    <img src="./public/images/Web_f/Banner-shoes/n-shoes__3.png" class="img-n_shoes" alt="">
                </div>
                <div class="inf__banner">
                    <p class="inf__banner-sale"></p>
                    <a href="http://localhost/steed/product/detail/adidas-yeezy-350-v2-beluga-10" 
                    class="inf__banner-name">Adidas Yeezy 350 V2 Beluga 1.0</a>
                    <hr style=" border: 1px solid white;  width: 150px; margin: 0 auto">
                    <p class="inf__banner-desc"></p>
                    <div class="price">
                        <p class="price-new">812$</p>
                    </div>
                    <button name="id_product" value="42" style="width:218px" class="add-to-cart btn-add_cart"><i class="fas fa-shopping-cart pr-2"></i> Add To Card </button>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./public/images/Web_f/Banner/banner3.png" class="d-block w-100 img-banner" alt="...">
            <div class="carousel-caption w-100 content__shoes">
                <div class=" bounce">
                    <img src="./public/images/Web_f/Banner-shoes/n-shoes__4.png" class="img-n_shoes" alt="">
                </div>
                <div class="inf__banner">
                    <p class="inf__banner-sale"></p>
                    <a href="http://localhost/steed/product/detail/nike-sb-dunk-low-street-hawker" class="inf__banner-name">Nike SB Dunk Low Street Hawker</a>
                    <hr style=" border: 1px solid white;  width: 150px; margin: 0 auto">
                    <p class="inf__banner-desc"></p>
                    <div class="price">
                        
                        <p class="price-new">274$</p>
                    </div>
                    <button name="id_product" value="41" style="width:218px" class="add-to-cart btn-add_cart"><i class="fas fa-shopping-cart pr-2"></i> Add To Card </button>
                    
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./public/images/Web_f/Banner/banner4.png" class="d-block w-100 img-banner" alt="...">
            <div class="carousel-caption w-100 content__shoes">
                <div class=" bounce">
                    <img src="./public/images/Web_f/Banner-shoes/n-shoes__2.png" class="img-n_shoes" alt="">
                </div>
                <div class="inf__banner">
                    <p class="inf__banner-sale"></p>
                    <a href="http://localhost/steed/product/detail/nike-air-jordan-1-high-85-varsity-red" class="inf__banner-name">Nike Air Jordan 1 high 85 Varsity Red</a>
                    <p class="inf__banner-desc"></p>
                    <div class="price">
                        
                        <p class="price-new">274$</p>
                    </div>
                    <button name="id_product" value="36" style="width:218px" class="add-to-cart btn-add_cart"><i class="fas fa-shopping-cart pr-2"></i> Add To Card </button>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- End Banner  -->


<!-- Start list product -->
<div class="container">
    <div class="title__new-product "data-aos="fade-right">
        <h3 class="title_h3">Top selling products</h3>
        <h3 class="title_h3_2">Top selling products</h3>
      
    </div>
    <div class="top_product">
        <?php
        $output='';
                    $output .= ' 
                    <div class="row " data-aos="fade-up"  data-aos-offset="200"

                    data-aos-easing="ease-in-out"> 
            ';
        while ($row = mysqli_fetch_array($data['top_sold_out'])) {
            $price_old= $row['price_new']-(($row['price_new']*$row['sale'])/100) ;
            $output .= '  
                 <div class="col-md-3 col-sm-6 col-xs-12  mb-4 " >
                    <div class="card product__card" >
                        <a href="http://localhost/steed/product/detail/' . $row['param_p'] . '"><img src=".' . $row['img_p'] . '" class="card-img-top" alt="' . $row['name_p'] . '"></a>
                        <div class="card-body">
                            <a href="http://localhost/steed/product/detail/' . $row['param_p'] . '" class="card-title"><h5 title="' . $row['name_p'] . '">' . $row['name_p'] . '</h5></a>
                            <div class="price">
                            <p class="card-price-n"> Price :' . $price_old. '$</p>
                            </div>
                            
                            <button  name="id_product" value="' . $row['id_product'] . '" class="add-to-cart btn-add_cart"  ><i class="fas fa-shopping-cart pr-2"></i> Add To Card </button> 
                        </div>
                    </div>
                </div>
                 ';
        }
        $output .= '</div>';
        echo $output;
        ?>
    </div>
    <div class="for_button" style="display: flex;justify-content: center;">
        <button class="view_more">View more <i class="fas fa-angle-right"></i></button>
    </div>
</div>
<script src="./public/js/home.js" type="text/javascript"></script>
<div class="container-fluid">
<h2 class="p-3" style="color:#7E1117"><strong> Tin tức </strong></h2>
  <div class="row">
    <div class="col-sm " style=" text-align: center;max-width: fit-content;">
		<a href="http://localhost/red/tintuc.php" style="text-decoration: none">
		<img src="http://localhost/red/img/n1.png"  alt="">
      <h5 style="color:black; overflow: hidden;;text-overflow: ellipsis 
	  !important;white-space: nowrap;  width: 360px;  text-decoration: none; " >Air Jordan 1 Mid vẫn tiếp tục không ngừng đổi mới bản thân.</h5>
	  </a>
    </div>
	<div class="col-sm " style=" text-align: center;max-width: fit-content;">
		<a href="http://localhost/red/tintuc1.php" style="text-decoration: none">
		<img src="http://localhost/red/img/n2.jpg"  alt="">
		<h5 style="color:black; overflow: hidden;;text-overflow: ellipsis !important;white-space: nowrap; 
		 width: 360px;  text-decoration: none; " >Cận cảnh “nhan sắc” đôi sneakers tin đồn của Travis Scott x Nike SB Dunk Low< </h5>
	  </a>
    </div>
	<div class="col-sm " style=" text-align: center;max-width: fit-content;;">
		<a href="http://localhost/red/tintuc3.php" style="text-decoration: none">
		<img src="http://localhost/red/img/n3.jpg"  alt="">
		<h5 style="color:black; overflow: hidden;;text-overflow: ellipsis !important;white-space:
		 nowrap;  width: 360px;  text-decoration: none; " >Balenciaga Triple S – Đột phá trong thiết kế </h5>
	  </a>
    </div>
  </div>
  <div class="mt-4" style="  display: flex;
  justify-content: flex-end;">
  <a href=""  style="color:black;"><h5>XEM THÊM -></h5></a>
  </div>
</div>
</div>