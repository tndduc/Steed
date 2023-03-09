<div class="container">
    <canvas id="line_chart"></canvas>
</div>

<?php
    $i=1;
     $str_data=$data['list_data'];
     $arr_data=explode(',', $str_data);
     $list_mon='';
     switch((count($arr_data))){
         case 1:
            $list_mon="[ 'January']";
            break;
         case 2:
            $list_mon="[ 'January',
            'February']";
            break;
         case 3:
            $list_mon="[ 'January',
            'February',
            'March']";
            break;
         case 4:
            $list_mon="[ 'January',
            'February',
            'March',
            'April',
            ]";
            break;
         case 5:
            $list_mon="['January',
            'February',
            'March',
            'April',
            'May',
            ]";
            break;
         case 6:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            ]";
            break;
         case 7:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            ]";
            break;
         case 8:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            ]";
            break;
         case 9:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September']";
            break; 
         case 10:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October']";
            break; 
         case 11:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November']";
            break; 
         case 12:
            $list_mon="[  'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'December']";
            break; 
     }
     echo'
     <script>
    var num_data = '.$list_mon.';
    var list_data ='. '['.$str_data.']'.';
</script>
     ';
    
    ?>
<script>
    console.log(num_data);
    console.log(list_data);
    var labels = num_data;
 var value =list_data ;
 var CHART = document.getElementById('line_chart').getContext('2d');
 var line_chart = new Chart(CHART, {
     type: 'line',
     data:{
        labels: labels,
         datasets:[{
             label: 'Number of bill',
             data:value,
             fill: false,
             borderColor: 'rgb(75, 192, 192)',
             tension: 0.1
         }] 
     }
 })
</script>
<div class="list_product-admin ">
    <div class="list_product">
        <?php
        $index = 1;
        echo '
                <div class="table-product">
                <table class="table table-dark ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date update</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Action </th>
                </tr>
                </thead>
                <tbody >
            ';
        while ($row = $data['list_product']->fetch_assoc()) {
            $price = $row['price_new'] - (($row['price_new'] * $row['sale']) / 100);
            echo '

                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td id="name_check_out">' . $row['name_p'] . '</td>
                            <td><img class="img_product-admin" src="./' . $row['img_p'] . '" alt=""></td>
                            <td>
                                Old Price: ' . $row['price_new'] . '<br>
                                Sale: ' . $row['sale'] . ' %<br>
                                Price : ' . $price . '
                            </td>
                            <td>' . $row['type_name'] . '</td>
                            <td>' . $row['date_update'] . '</td>
                            <td>' . $row['sold'] . '</td>
                            <td >
                                <div class="action-products">
                                    
                                        <button class="delete_product" value="' . $row['id_product'] . '">
                                        <i class="fas fa-trash fas-lg"></i> Delete
                                        </button>
                                    <a href="./admin_steed/update_product/' . $row['id_product'] . '">
                                    <button class="update_product" value="' . $row['id_product'] . '">
                                        <i class="fas fa-edit fas-lag"></i> Update
                                    </button>
                                    </a>
                                </div>
                            </td>
                        </tr>';
        }
        echo ' </tbody>
            </table>
            </div>';
        ?>
    </div>
    <div class="total_product">
        <i class="fas fa-box fa-5x"></i>
        <h2>Products : <?php echo $index - 1 ?></h2>
        <button id="btn_form_upload"><i class="fas fa-plus-circle fa-3x"></i>
            <h4>Add Product</h4>
        </button>
    </div>
</div>
<div class="grid_row">
    <div class="tab_user ">

        <div class="list_user">
            <?php
            $stt = 1;
            echo '
                <div class="table-user">
                <table class="table table-dark ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name user</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Level</th>
                </tr>
                </thead>
                <tbody >
            ';
            while ($row = $data['list_user']->fetch_assoc()) {
                echo '

                        <tr>
                            <th scope="row">' . $stt . '</th>
                            <td id="name_check_out">' . $row['firstname'] . ' ' . $row['lastname'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>' . $row['level'] . '</td>
                        </tr>';
                $stt++;
            }
            echo ' </tbody>
            </table>
            </div>';
            ?>
        </div>
        <div class="total_user">
            <i class="fas fa-users fa-5x"></i>
            <h2>Users : <?php echo $stt - 1 ?></h2>
        </div>
    </div>
    <div class="tab_bill ">
        <div class="list_bill">
            <?php
            $i = 1;
            echo '
                <div class="table-bill">
                <table class="table table-dark ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name user</th>
                    <th scope="col">ToTal Bill</th>
                    <th scope="col">Day purchase</th>
                    <th scope="col">>View Detail</th>
                </tr>
                </thead>
                <tbody >
            ';
            while ($row = $data['list_bill']->fetch_assoc()) {
                echo '

                        <tr>
                            <th scope="row">' . $i . '</th>
                            <td id="name">' . $row['firstname'] . ' ' . $row['lastname'] . '</td>
                            <td>' . $row['total_bill'] . ' $</td>
                            <td>' . $row['d_purchase'] . '</td>
                            <td><button value="'.$row['id_bill'].'" class="btn_detail_bill">View Detail</button></td>
                        </tr>';
                $i++;
            }
            echo ' </tbody>
            </table>
            </div>';
            ?>
        </div>
        <div class="total_bill">
            <i class="fas fa-newspaper fa-5x"></i>
            <h2>Bills : <?php echo $i - 1 ?></h2>
        </div>
    </div>
</div>
<div class="grid_row">
    <div class="tab_type">
        
    <?php
        $index = 1;
        echo '
                <div class="table-type">
                <table class="table table-dark ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Category</th>
                    <th scope="col">Name Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody >
            ';
        while ($row = $data['list_category']->fetch_assoc()) {
            echo '
                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td id="name_check_out">' . $row['id_category'] . '</td>
                            <td> <a href="http://localhost/steed/admin_steed/product/'.$row['id_category'].'">' . $row['name_category'] . '</a> </td>
                            <td >
                                <div class="action-products">
                                        <button class="delete_category" value="' . $row['id_category'] . '">
                                        <i class="fas fa-trash fas-lg"></i> Delete
                                        </button>           
                                    <button class="update_category" value="' . $row['id_category'] . '">
                                        <i class="fas fa-edit fas-lag"></i> Update
                                    </button>
                                </div>
                            </td>
                        </tr>';
        }
        echo ' </tbody>
            </table>
            </div>';
        ?>
        <div class="total_product">
            <i class="fas fa-clipboard-list fa-5x"></i>
            <h2>Category : <?php echo $index - 1 ?></h2>
            <button id="btn_upload_category"><i class="fas fa-plus-circle fa-3x"></i>
                <h4>Add Category</h4>
            </button>
        </div>
    </div>
</div>
<div class="popup_category">
    <div class="add_category">
        <h2>Add Category</h2>
        <form action="./admin_steed/add_category" method="post">
        <input type="text" name="name_category">
        <button type="submit">Add Category</button>
        </form>
    </div>
    <div class="edit_category">
        
    </div>
</div>
<div class="popup_bill_detail">
    <div class="content_bill">

    </div>
</div>
<div class="site_back"></div>
<div class="update_div1" >
    <h3>UpDate Product</h3>
    <form action="./admin_steed/upload" method="post" enctype="multipart/form-data" class="form_upload">
        <div class="upload">
            <span>Name product</span>
            <input type="text" name="name_product" placeholder="Name product">
        </div>
        <div class="upload">
            <span>Image</span>
            <input type="file" name="img_p">
        </div>
        <div class="upload">
            <span>Image</span>
            <input type="file" name="img_p-1">
        </div>
        <div class="upload">
            <span>Image</span>
            <input type="file" name="img_p-2">
        </div>
        <div class="upload">
            <span>Image</span>
            <input type="file" name="img_p-3">
        </div>
        <div class="upload">
            <span>Image</span>
            <input type="file" name="img_p-4">
        </div>
        <div class="upload">
            <span>Price New</span>
            <input type="text" name="price_new" placeholder="Price">
        </div>
        <div class="upload">
            <span>Sale</span>
            <input type="text" name="sale" placeholder="Sale">
        </div>
        <div class="upload">
            <span>Description</span>
            <textarea id="editor" rows="10" cols="50" name="description"></textarea>
        </div>
        <script>
            CKEDITOR.replace('description');
        </script>
        <div class="upload">
            <span>Type Product</span>
            <select name="type_p" id="type_p">
                <?php
                while ($row = $data['list_type']->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['type_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="upload">
            <div class="gender">
                <span>Gender</span>
                <select name="gender" id="gender">
                    <option value="man">Man</option>
                    <option value="woman">Woman</option>
                    <option value="woman,man">All</option>
                </select>
            </div>
            <div class="upload">
                <span>Category Product</span>
                <select name="id_category" id="id_category">
                    <?php
                    $html='';
                     while ($category = $data['list_category']->fetch_assoc()) {
                        $html.='<option value="' . $category['id_category'] . '">' . $category['name_category'] . '</option>';
                    }
                    echo  $html;
                    echo $data['cate'];
                    ?>
                </select>
            </div>
            <div class="upload">
                <span>Brand</span>
                <select name="brand" id="brand">
                    <?php
                    while ($rows = $data['list_brand']->fetch_assoc()) {
                        echo '<option value="' . $rows['id_brand'] . '">' . $rows['name_brand'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="upload">
            <span>Size Product</span>
            <input type="text" name="size_p" placeholder="Size Product">
        </div>
        <div class="upload">
            <span>Quantity</span>
            <input type="text" name="quantity" placeholder="Quantity Product">
        </div>

        <input type="submit" value="UpLoad Product" name="submit">
    </form>
</div>