<div class="list_products">
        <?php
        $index = 1;
        echo '
                <div class="table-products">
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
                            <td><img class="img_product-admin" src="../../' . $row['img_p'] . '" alt=""></td>
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
                                    <a href="/update_product/' . $row['id_product'] . '">
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