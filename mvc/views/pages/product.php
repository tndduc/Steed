<div class="title_product mt-5">
    <h2>Products</h2>
</div>
<div class="type_product mt-5 option_product">
    <div class="gender">
        <h4>Gender</h4>
        <div class="group_btn_type">
            <input type="radio" name="gender" class="ajax_product gender_btn" id="all_gender" value="'woman','man','man,woman'" checked>
            <label for="all_gender">All</label>
        </div>
        <div class="group_btn_type">
            <input type="radio" name="gender" class="ajax_product gender_btn" id="man" value="'man'" >
            <label for="man">Man</label>
        </div>
        <div class="group_btn_type">
            <input type="radio" name="gender" class="ajax_product gender_btn" id="woman" value="'woman'">
            <label for="woman">Woman</label>
        </div>
    </div>
    <div class="group_category_btn">
        <h4>Category</h4>
        <div class="category_option">
            <?php
                while ($row = $data['list_categories']->fetch_assoc()) {
                    echo'
                        <div class="">
                        <input type="checkbox" class="category ajax_product" name="category" id="'.$row['name_category'].'" value="'.$row['id_category'].'" >
                        <label for="'.$row['name_category'].'">'.$row['name_category'].'</label>
                        </div>
                    ';
                
                }
            
            ?>
        </div>
    </div>
    <div class="group_brand_btn">
        <h4>Brand</h4>
        <div class="brand_option">
            <?php
                while ($row = $data['list_brand']->fetch_assoc()) {
                    echo'
                    <div class="">
                        <input type="checkbox" class="brand ajax_product"  name="brand" id="'.$row['name_brand'].'" value="'.$row['id_brand'].'" >
                        <label for="'.$row['name_brand'].'">'.$row['name_brand'].'</label>
                        </div>
                    ';
                
                }
            
            ?>
            </div>
    </div>
    <div class="number_display">
        <span for="">Number of displays</span>
        <select name="limit" id="limit_number">
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="12">12</option>
        </select>
    </div>
</div>
<div class="container mt-5">
    <div id="list_products"></div>

</div>