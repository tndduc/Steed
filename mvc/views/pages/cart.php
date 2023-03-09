<div class="cart_container mt-5">
    <div class="title_cart">
        <h3>Cart bag of <?php echo $data['check_log'];?></h3>
    </div>
    <div class="content_cart">
        <div class="list_product_cart">
            <?php
            $stt=1;
            while ($row =$data['list_product']-> fetch_assoc())  {
                echo '
                    <div class="product_cart" id="in_cart'.$row['id_product'].'">
                        <div class="detail__product">
                            <a href="">
                                <p class="name__product">'.$row['name_p'].'</p>
                                <img  class="img__product-cart" src=".'.$row['img_p'].'" alt="">
                            </a>
                        </div>
                        <span>Price:$<input disabled class="price_in_cart" value="'.$row['price_new'].'"></span>
                        <div class="buttons_added">
                            <button name="id_product" class="minus is-form btn set-value-p delete_cart"  value="'.$row['id_product'].'"">-</button>
                            <input aria-label="quantity" class="input-qty " max="'.$row['quantity']-$row['sold'].'" min="1" 
                            name="" type="number" value="'.$row['quantity_product'].'" disabled="" id="quantity_p">
                            <button name="id_product" class="plus is-form btn set-value-p add-to-cart" onclick="showSuccessToast();" value="'.$row['id_product'].'"
                            >+</button>
                        </div>
                        <div class="total-product">
                            
                            <span>Total:$<input disabled class="total_in_cart" value="'.$row['total'].'"></span>
                        </div>
                        <div class="delete_confirm">
                        <button class="delete-product" name="id_product" value="'.$row['id_product'].'"><i class="far fa-trash-alt fa-lg"></i></button>
                       
                        </div>
                    </div>
                ';
            }
            ?>
            

        </div>
    </div>
</div>
<div class="checkout">
    <a class="back_to_shop"href="http://localhost/steed/"><i class="fas fa-angle-left fa-2x"></i><p>Back to shop</p></a>
    <button id="check_out">Check Out</button>
</div>
<div class="back_of_pay"></div>
<div class="pay_container">
    <div class="billing">
        <div id="list_check_out"></div>
        <div class="pay_type">
            <div class="flex">
                <label for=""><i class="fas fa-shipping-fast" style="margin-right: 10px;"></i>Freight forwarder </label>
                    <select class="form-select" name="freight_type" id="freight_type"aria-label="Default select example" style="height: 40px;">
                        <option value="Duck Ship">Duck Ship</option>
                        <option value="Viettel post">Viettel post</option>
                        <option value="PT Post">PT Post</option>
                        <option value="FV Ship">FV Ship</option>
                    </select>
            </div>
            <div class="flex">
                <label for=""><i class="fas fa-money-bill-wave-alt" style="margin-right: 10px;"></i>Bank payment</label>
                    <select class="form-select" name="bank_payment" id="bank_payment"aria-label="Default select example" style="height: 40px;">
                        <option value="Duck Bank">Duck Bank</option>
                        <option value="TeckComBank">TeckComBank</option>
                        <option value="MB Bank">MB Bank</option>
                        <option value="Agri Bank">Agri Bank</option>
                    </select>
            </div>
        </div>
        <div class="pay_all"><button class="btn-pay_all" id="pay_all">Pay</button></div>
        
    </div>
</div>