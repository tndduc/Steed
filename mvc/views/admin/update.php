<?php 
$html='';
 while ($row =$data['product']-> fetch_assoc()){
    $html.= '<div class="edit_div">
    <h3>UpDate Product</h3>
    <form action="../edit" method="post" enctype="multipart/form-data" class="form_upload">
            <div class="upload">
                <span>Name product</span>
                <input type="text" name="name_product" placeholder="Name product" value="'.$row['name_p'].'">
            </div>
            <div class="upload">
                <span>Image</span>
                <img src="../..'.$row['img_p'].'" alt="">
                <input type="text" hidden name="old_img_p" value="'.$row['img_p'].'">
                <input type="file" name="img_p" >
            </div>
            <div class="upload">
                <span>Image</span>
                <img src="../..'.$row['img_p-1'].'" alt="">
                <input type="text" hidden name="old_img_p-1" value="'.$row['img_p-1'].'">
                <input type="file" name="img_p-1" >
            </div>
            <div class="upload">
                <span>Image</span>
                <img src="../..'.$row['img_p-2'].'" alt="">
                <input type="text" hidden name="old_img_p-2" value="'.$row['img_p-2'].'">
                <input type="file" name="img_p-2" >
            </div>
            <div class="upload">
                <span>Image</span>
                <img src="../..'.$row['img_p-3'].'" alt="">
                <input type="text" hidden name="old_img_p-3" value="'.$row['img_p-3'].'">
                <input type="file" name="img_p-3" >
            </div>
            <div class="upload">
                <span>Image</span>
                <img src="../..'.$row['img_p-4'].'" alt="">
                <input type="text" hidden name="old_img_p-4" value="'.$row['img_p-4'].'">
                <input type="file" name="img_p-4" >
            </div>
            <div class="upload">
                <span>Price New</span>
                <input type="text" name="price_new" placeholder="Price" value="'.$row['price_new'].'">
            </div>
            <div class="upload">
                <span>Sale</span>
                <input type="text" name="sale" placeholder="Price" value="'.$row['sale'].'">
            </div>
            <div class="upload">
                <span>Description</span>
                <textarea id="editor" rows="10" cols="50" name="description" >'.$row['description'].'</textarea>
            </div>
                <script>
                        CKEDITOR.replace( "description" );
                </script>

            <div class="upload">
                <div class="gender">
                    <span>Gender</span>
                    <select name="gender" id="gender">
                        <option value="man">Man</option>
                        <option value="woman">woman</option>
                        <option value="man,woman">All</option>
                    </select>
                </div>
            </div>
            <div class="upload">
                <span>Category Product</span>
                <select name="id_category" id="id_category">
                    ';
                    while ($category = $data['list_category']->fetch_assoc()) {
                        $html.='<option value="' . $category['id_category'] . '">' . $category['name_category'] . '</option>';
                    }
                    $html.='
                </select>
            </div>
            <div class="upload">
                <span>Brand</span>
                <select name="brand" id="brand">
                    ';
                    while ($brand = $data['list_brand']->fetch_assoc()) {
                        $html.='<option value="' . $brand['id_brand'] . '">' . $brand['name_brand'] . '</option>';
                    }
                    $html.='
                </select>
            </div>
            <div class="upload">
                <span>Type Product</span>
                <select name="type_p" id="type_p">';
                      while ($rows =$data['list_type']-> fetch_assoc())  {
                        $html.='<option value="'.$rows['id'].'">'.$rows['type_name'].'</option>';
                      } 
                    $html.='
                </select>
            </div>
            <div class="upload">
                <span>Size Product</span>
                <input type="text" name="size_p" placeholder="Size Product" value="'.$row['size_p'].'">
            </div>
            <div class="upload">
                <span>Quantity</span>
                <input type="text" name="quantity" placeholder="Quantity Product" value="'.$row['quantity'].'">
            </div>
            <div class="upload">

            </div>
            <span>Sold</span>
            <input type="text" name="sold" placeholder="Quantity Product" value="'.$row['sold'].'">
            </div>
            <input type="text" hidden name="id_product" value="'.$data['id_product'].'">
    <input type="submit" value="Up DateProduct" name="submit">
    </form>
</div>';
}
echo  $html;

?>