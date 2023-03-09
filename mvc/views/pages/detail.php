<?php
echo "<script type='text/javascript'>var fullname = '".$data['check_log']."'</script>";
echo $data['check_log'];
while ($row = mysqli_fetch_array($data['detail_p'])) {
    $id_product =$row['id_product'];
    echo '
        <div class="container">
        <div class="row py-5 mt-4 d-flex justify-content-center">
            <!-- For Demo Purpose -->
            <div class="col-md-6 pr-lg-6 mb-6 mb-md-0" >
                <img src="../..' . $row['img_p'] . '" style="width: 500px ;" alt="" class="img-fluid mb-3 d-md-block">
                <!--start lightbox-->
                <div class="container">
                  <div class="row">
                    <div class="row">
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                   data-image="../..' . $row['img_p-1'] . '"
                                   data-target="#image-gallery">
                                    <img class="img-thumbnail"
                                         src="../..' . $row['img_p-1'] . '"
                                         alt="Another alt text">
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                   data-image="../..' . $row['img_p-2'] . '"
                                   data-target="#image-gallery">
                                    <img class="img-thumbnail"
                                         src="../..' . $row['img_p-2'] . '"
                                         alt="Another alt text">
                                </a>
                            </div>
                
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                   data-image="../..' . $row['img_p-3'] . '"
                                   data-target="#image-gallery">
                                    <img class="img-thumbnail"
                                         src="../..' . $row['img_p-3'] . '"
                                         alt="Another alt text">
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Test1"
                                   data-image="../..' . $row['img_p-4'] . '"
                                   data-target="#image-gallery">
                                    <img class="img-thumbnail"
                                         src="../..' . $row['img_p-4'] . '"
                                         alt="Another alt text">
                                </a>
                            </div>
                          
                        </div>
                
                
                        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="image-gallery-title"></h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <button type="button" class="btn btn-secondary float-left col-md-1" id="show-previous-image" style="margin-top: 25%;"><i class="fa fa-arrow-left"></i>
                                      </button>
                                        <img id="image-gallery-image" class="img-responsive col-md-10 mx-auto" src="">
                                        <button type="button" id="show-next-image" class="btn btn-secondary float-right col-md-1"style="margin-top: 25%;"><i class="fa fa-arrow-right"></i>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
    
                
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
                <!--end it-->
        
            </div>
    
            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ">
                <div >
                    <div class="flex">
                    <div class="nameproduct"> <h4> ' . $row['name_p'] . '</h4>  </div>
                   <hr>
    
                  
                    </div>
                    <div class="d-flex">
                        <div class="rating" >		
                                  
                            <i class="fas fa-star fa-sm text-primary"></i>												
                            <i class="fas fa-star fa-sm text-primary"style="color: pink;"></i>												
                            <i class="fas fa-star fa-sm text-primary"></i>												
                            <i class="fas fa-star fa-sm text-primary"></i>						
                            <i class="far fa-star fa-sm text-primary"></i>
                            
                        </div>
                    <h6 style="margin-left: 10px;">   4/5 | 2.3k Rate| 3k Sold</h6>
                       
                    </div>
                    <hr>
                    <div class="d-flex flex-column ">
                        <h4 class="mb-0 " style="background-color: rgba(177, 177, 177, 0.493); height: 50px; padding-top: 10px; padding-left: 20px;  ">
                            <span class="text-danger mr-1" >$' . $row['price_new'] . '</span>
                          </h4>
                    </div>
                    <hr>
                    <label for="">Size</label>
                    <div class="radio">
                    <input label="39" type="radio" id="" name="sized" value="39" checked>
                    <input label="40" type="radio" id="" name="sized" value="40" checked>
                    <input label="41" type="radio" id="" name="sized" value="41" checked>
                    <input label="42" type="radio" id="" name="sized" value="42" checked>
                    <input label="43" type="radio" id="" name="sized" value="43" checked>
                  </div>
                    <hr>
                    <div class="d-flex" >
                        <label for="">Quantity </label>
                        <div class="buttons_added">
                        <button class="minus is-form btn set-value-p" onclick="increment()">-</button>
                        <input aria-label="quantity" class="input-qty " max="'.$row['quantity']-$row['sold'].'" min="1" 
                        name="" type="number" value="1" disabled="" id="quantity_p">
                        <button class="plus is-form btn set-value-p " value="'.$row['id_product'].'"
                        >+</button>
                          </div>
                    </div>
                    <hr>
                    <div class="d-flex" >
                        <label for=""><i class="fas fa-shipping-fast" style="margin-right: 10px;"></i>Delivery unit </label>
                        <select class="form-select   "  aria-label="Default select example" style="height: 40px;">
                            <option selected>Choose Delivery unit</option>
                            <option value="1">Economical delivery</option>
                            <option value="2">Fast delivery</option>
                            <option value="3">Viettel post</option>
                          </select>
                    </div>
                    <hr>
                   
                    <div class="d-flex">
                      <label for=""><i class="fas fa-money-bill-wave-alt" style="margin-right: 10px;"></i>Payment methods</label>
                      <select class="form-select   "  aria-label="Default select example" style="height: 40px;">
                          <option selected>Payment methods</option>
                          <option value="1"> Internet Banking</option>
                          <option value="2">Ship cod</option>
                          <option value="3">Momo pay</option>
                          <option value="4">VietPay</option>
                        </select>
                    </div>
                    <hr>
                    <div class="d-flex ">
                   
                    <button  name="id_product" value="' . $row['id_product'] . '" class="add-to-cart btn-add_cart" >
                        <i class="fas fa-shopping-cart pr-2"></i> Add to card
                    </button> 
                    </div>
    
    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!--chi tiet san pham dok-->
    <div class="chitiet">
      <div class="chitiethon" style="padding-left: 50px; padding-right: 50px;" >
        <div class="cachly" > 
        <p>' . $row['description'] . '</p>
        <input id="slug" value="' . $row['param_p'] . '"></input>
        </div>
    
    
         </div>
    </div>
    ';
}

?>


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <h5>Comment and Review</h5>
            <?php 
                if(isset($data['check_log'])&&$data['check_log']!=='none_login'){
                    echo' 
                    <div class=" d-flex justify-content-between align-items-center mb-3 comment-container " >
                        <div class="avatar_cmt d-flex justify-content-between align-items-center ">
                            <i class="fas fa-user"></i>
                            <p id="name_cmt">'. $data['check_log'].'</p>
                        </div>
                        <input class="content_cmt flex-grow-1" id="content_cmt" type="text" placeholder="Comment in here">
                        <button id="send_cmt" value="'.$id_product.'" ><i class="fas fa-paper-plane"></i></button>
                    </div>';
                }else{
                    echo'<div class="none_login"><h4>Login to use comment</h4></div>';
                }

            
            ?>
           <div class="add_cmt"></div>
            <div class="" id="list_review">
                
            </div>
                
        </div>
    </div>
</div>