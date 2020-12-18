<?
require 'header.php';
$Product = new Product();
$store = $Product ->displayProduct();
$store1 = $Product ->displayProduct_description();
//print_r($store1);
foreach ($store1 as $key2=>$value2){
    if ($_GET['id'] == $value2['prod_id']) {
        $_SESSION['product_descript'] = array(
        'prod_id' => $value2['prod_id'],
        'prod_parent_id' => $value2['prod_parent_id'],
        'description' => $value2['description'],
        'mon_price' => $value2['mon_price'],
        'annual_price' => $value2['annual_price'],
        'sku' => $value2['sku']
        ); 
    }
}
//print_r($_SESSION['product_descript']);

?>
<div class="table-responsive">
    <table class="table align-items-center" id="myTable">
        <thead>
            <tr>
                <th scope="col" class="sort" data-sort="name">Product Name</th>
                <th scope="col" class="sort" data-sort="status">Product Name</th>
                <th scope="col" class="sort" data-sort="completion">
                    Monthly Price
                </th>
                <th scope="col" class="sort" data-sort="completion">
                    Domain 
                </th>
                <th scope="col" class="sort" data-sort="completion">
                    Bandwidth
                </th>
                <th scope="col" class="sort" data-sort="completion">
                    E-mail
                </th>
                <th scope="col" class="sort" data-sort="completion">Action</th>
            </tr>
        </thead>
        <tbody class="list">
            <tr>
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                        <?php echo $_SESSION['product']['prod_name']; 
                        if ($_SESSION['product']['pro_id'] == $_GET['id']) { ?>
                            <span class="name mb-0 text-sm">
                                <?php echo $_SESSION['product']['prod_name']; ?>
                            </span>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </th>
                <?php // print_r($_SESSION['product_descript']['prod_parent_id']);
               
                    $description = json_decode($_SESSION['product_descript']['description']);
                    //echo $description; ?>
                <td class="budget">
                <?php echo $value['prod_name'] ?>
                </td>
                <form method = "post">
                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                    <td>
                    <input type="text" name="prod_name" value=""/>
                    </td>
                <?php } else {?>
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $_SESSION['product_descript']['mon_price']; ?></span>
                    </span>
                </td>
                <?php } ?>
                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                    <td>
                    <input type="text" name="link" value=""/>
                </td> 
                <?php } else {?>
                <td>
                
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $description->domain ;?></span>
                    </span>
                </td>
                <?php } ?>
                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                    <td>
                    <input type="text" name="link" value=""/>
                </td> 
                <?php } else {?>
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">
                        <?php echo $description->bandwidth ;?>
                      </span>
                    </span>
                </td>
                <?php } ?>
                
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">
                        <?php echo $description->mailbox ;?>
                      </span>
                    </span>
                </td>
                
               <td>
                <button type="submit"  name="edit"
                class="btn btn-primary">Edit</button>
               </td>
            </tr>            
               
          </tbody>
    </table>
</div>

<?php require 'footer.php'; ?>