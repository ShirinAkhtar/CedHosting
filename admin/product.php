<?php 
require "class.php";
require 'header.php';
$error  = array();
$message = '';
$Product = new Product();
if (isset($_POST['submit'])) {
    
    $feature = array();
    $category = isset($_POST['category'])?$_POST['category']:'';
    $Subcategory = isset($_POST['Subcategory'])?$_POST['Subcategory']:'';
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
    
    $msg = $Product->addProduct_descript($category, $Subcategory, $link, $month,  $annual, $sku, $description);
    echo ($msg);
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
                  <li class="breadcrumb-item">
                  <a href="#"><i class="fas fa-home"></i></a></li>
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

<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Page content -->
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">
                            Create New Products
                        </h3>
                        <h6 class="heading-small text-muted mb-4">
                        Enter Product Details
                        </h6>
                    </div>
                </div>
            </div>
            <hr class="text-dark">
            <div class="card-body">
                <form method = "POST">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" 
                                    for="input-username">Select 
                                    Product Category</label>
                                    <select name="category" required>
                            <?php foreach ($store as $key=> $value1) {
                                if ($value1['prod_parent_id'] == 1 ) { 
                                    if ($value1['prod_available'] == 1 ) { ?>
                                    <option value="<?php echo $value1['id'] ?>">
                                    <?php echo $value1['prod_name'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" 
                                    for="input-email">Enter Product Name</label>
                                    <input type="text" id="name" 
                                    pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" onblur="errors(this.id)"
                                    class="form-control" name= "Subcategory"
                                    placeholder="Sub Category" required>
                                    <div id="nameError"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Page URL</label>
                            <input type="text" id="url" 
                            class="form-control" name= "link" 
                            placeholder="Sub Category">
                           
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <!--- table --->
    <!-- Page content -->
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">
                            Products Description
                        </h3>
                        <h6 class="heading-small text-muted mb-4">
                       Enter Product Description Details
                    </h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                    <h6 class="heading-small text-muted mb-4">
                       Enter Product Details
                    </h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" 
                                    for="input-username">Enter Monthly Prices</label>
                                    <input type="text" id="month" name = "month" 
                                    class="form-control" maxlength="15" onblur="errors(this.id)"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    placeholder= "This would be Monthly Plan " required>
                                    <div id="monthError"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                    for="input-email">Enter Annual Prices</label>
                                    <input type="text" id="annual" maxlength="15" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                                    onblur="errors(this.id)"
                                    class="form-control" name = "annual" 
                                    placeholder="This would be Annual Price " required>
                                    <div id="annualError"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">SKU</label>
                            <input type="text" id="sku" onblur="errors(this.id)"
                            class="form-control" name= "sku" placeholder="SKU" required>
                            <div id="skuError"></div>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted mb-4">
                       Features
                    </h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">
                            Web Space(in GB)</label>
                            <input type="text" id="web" onblur="errors(this.id)"
                            class="form-control" name = "webspace" maxlength="5"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                            onblur="errors(this.id)"
                            placeholder="Enter 0.5 for 512 MB " required>
                            <div id="webError"></div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">
                            Bandwidth (in GB)</label>
                            <input type="text" id="bandwidth" onblur="errors(this.id)"
                            class="form-control" name= "bandwidth" 
                            placeholder="Enter 0.5 for 512 MB " required>
                            <div id="bandwidthError"></div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Free Domain</label>
                            <input type="text" id="domain" onblur="errors(this.id)"
                            class="form-control" name= "domain" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$"
                    placeholder="Enter 0 if no domain available in this service " required>
                    <div id="domainError"></div>
                        </div>
                        
                    </div>

                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">
                            Language / Technology Support</label>
                            <input type="text" id="support" onblur="errors(this.id)"
                            class="form-control" name = "support" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$"
                            placeholder="Separate by (,) Ex: PHP, MySQL, MongoDB " required>
                            <div id="supportError"></div>
                        </div>
                    </div>

                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Mailbox</label>
                            <input type="text" id="mail" onblur="errors(this.id)"
                            class="form-control" name= "mailbox" 
            placeholder="Enter Number of mailbox will be provided, enter 0 if none" required>
                            <div id="mailError"></div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" 
                        name="submit" class="btn btn-primary my-4">
                        Create Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer -->

    <?php require 'footer.php';?>

