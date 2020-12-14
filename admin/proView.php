<?php 
require "class.php";
require 'header.php';
$error  = array();
$message = '';
$temp='';
$Product = new Product();


if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $store = $Product ->deleteProduct($id);
}


if (isset($_POST['update'])) {
   
    $Subcategory = isset($_POST['prod_name'])?$_POST['prod_name']:'';
    //echo $Subcategory;
    $link = isset($_POST['link'])?$_POST['link']:'';
    $month = isset($_POST['month'])?$_POST['month']:'';
    $annual = isset($_POST['annual'])?$_POST['annual']:'';
    $sku = isset($_POST['sku'])?$_POST['sku']:'';
    $webspace = isset($_POST['webspace'])?$_POST['webspace']:'';
    $bandwidth = isset($_POST['bandwidth'])?$_POST['bandwidth']:'';
    $domain = isset($_POST['domain'])?$_POST['domain']:'';
    $support = isset($_POST['support'])?$_POST['support']:'';
    $mailbox = isset($_POST['mailbox'])?$_POST['mailbox']:'';
    $feature = array(
        'webspace' => $webspace,
        'bandwidth' => $bandwidth,
        'domain' => $domain,
        'support' => $support,
        'mailbox' => $mailbox
    );
    $description = json_encode($feature);
    $id = $_POST['id'];
    //echo $id;
    $msg = $Product->product_descript_update($id, $Subcategory, $link, $month,  $annual, $sku, $description);
    
}
$store = $Product ->displayProduct();
$store1 = $Product ->displayProduct_description();
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
<!-- Main content -->
<!-- <div class="main-content" id="panel">
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-dark">
                    View Product
                </h1>
                <p class="text-white mt-0 mb-5">
                    This is your profile page. 
                    You can see the progress you've made with
                    your work and manage your projects or assigned tasks
                </p>
            </div>
        </div>
    </div> -->
    <div class="container-fluid mt--6">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Products</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>
                </div>
            </div>
<div class="table-responsive">
  <!--table -->
<div >
<table class="table align-items-center" id="myTable">
    <thead>
        <tr>
            <th scope="col" class="sort" data-sort="name">Product Id</th>
            <th scope="col" class="sort" data-sort="budget">Product Parent</th>
            <th scope="col" class="sort" data-sort="status">Product Name</th>
            <th scope="col" class="sort" data-sort="completion">Link</th>
            <th scope="col" class="sort" data-sort="completion">Monthly Prices</th>
            <th scope="col" class="sort" data-sort="completion">Annual Prices</th>
            <th scope="col" class="sort" data-sort="completion">SKU</th>
            <th scope="col" class="sort" data-sort="completion">WEB Space</th>
            <th scope="col" class="sort" data-sort="completion">Bandwidth</th>
            <th scope="col" class="sort" data-sort="completion">Free Domain</th>
            <th scope="col" class="sort" data-sort="completion">
            Language/Technology Support</th>
            <th scope="col" class="sort" data-sort="completion">Mailbox</th>
            <th scope="col" class="sort" data-sort="completion">Action</th>
        </tr>
        </thead>
        <tbody class="list">
        <?php 
       
        foreach ($store1 as $key1=> $value) { 
            $description = json_decode($value['description']);
           
            ?><tr>
            <th scope="row">
                <div class="media align-items-center">
                    <div class="media-body">
                        <span class="name mb-0 text-sm"><?php echo $value['id'] ?></span>
                    </div>
                </div>
            </th>
            <?php
            $id = $value['prod_parent_id'];
            $store2 = $Product->displayProduct_Parent($id);
            ?>
            <td class="budget">
                <?php echo $store2 ?>
            </td>
            <form method = "post">

            <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                <input type="text" name="prod_name" 
                value="<?php echo $value['prod_name'] ?>"/>
                </td>
            <?php } else {?>
                <td>
                    <?php echo $value['prod_name'] ?>
                </td>
            <?php } ?>

            <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="link" value="<?php echo $value['html'] ?>"/>
                </td> 
            <?php } else {?>
                <td><?php echo $value['html'] ?></td>
            <?php } ?>

            <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="month" value="<?php echo $value['mon_price'] ?>"/>
                </td> 
            <?php } else {?>
                <td><?php echo $value['mon_price'] ?></td>
            <?php } ?>


                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="annual" value="<?php echo $value['annual_price'] ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $value['annual_price'] ?></td>
                <?php } ?>

                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="sku" value="<?php echo $value['sku'] ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $value['sku'] ?></td>
                <?php } ?>

                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="webspace" value="<?php echo $description->webspace ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $description->webspace ?></td>
                <?php } ?>

                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="bandwidth" value="<?php echo $description->bandwidth ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $description->bandwidth ?></td>
                <?php } ?>

                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="domain" value="<?php echo $description->domain ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $description->domain ?></td>
                <?php } ?>


                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="support" value="<?php echo $description->support ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $description->support ?></td>
                <?php } ?>

                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                <td>
                    <input type="text" name="mailbox" value="<?php echo $description->mailbox ?>"/>
                </td> 
                <?php } else {?>
                <td><?php echo $description->mailbox ?></td>
                <?php } ?>

             <!--   <?php //if (!(isset($_POST['edit']) && $_POST['id'] == $value['id']) ) {?>
                <td>
                    <?php// if ($value['prod_available'] == 1) { ?>
                    Yes
                    <?php// } else {?>
                    No 
                    <?php //} ?> 
                </td>
                <?php //} else {?>
                <td>
                <select id="msg2" name="prod_available" required>
                    <option selected >Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select> 
                </td>
                <?php// } ?> -->
               
                <td>
                <form method = "post">
                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                    <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) { ?>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <?php } else {?>
                    <button type="submit"  name="edit" class="btn btn-primary">Edit</button>
                    <?php } ?>
                    <button type="submit" onclick="return confirm('Are you Sure want to delete? ')" name="delete" class="btn btn-primary">Delete</button>
                </form>
                </td>
               
            </tr>            
        <?php 
        }?>
          </tbody>
    </table>
</div>
</div>
<!-- Footer -->
<?php require 'footer.php';?>