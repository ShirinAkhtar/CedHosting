<?php 
require "class.php";
require 'header.php';
$error  = array();
$message = '';
$Product = new Product();
if (isset($_POST['submit'])) {
    //$category = isset($_POST['category'])?$_POST['category']:'';
    $Subcategory = isset($_POST['Subcategory'])?$_POST['Subcategory']:'';
    $link = isset($_POST['link'])?$_POST['link']:'';
    $msg = $Product->addProduct($Subcategory, $link);
    
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $Product->deleteCategory($id);
    echo "<script>window.location.href='category.php'</script>";
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $prod_name = isset($_POST['prod_name'])?$_POST['prod_name']:'';
    $link = isset($_POST['link'])?$_POST['link']:'';
    $prod_available = isset($_POST['prod_available'])?$_POST['prod_available']:'';
    $Product->UpdateCategory($id, $prod_name, $link, $prod_available);
}
$store = $Product ->displayProduct();
?>
<!-- Main content -->

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
    <table class="table align-items-center" id="myTable">
        <thead>
            <tr>
                <th scope="col" class="sort" data-sort="name">Category Id</th>
                <th scope="col" class="sort" data-sort="budget">Category Parent Id</th>
                <th scope="col" class="sort" data-sort="status">Category Name</th>
                <th scope="col" class="sort" data-sort="completion">Link</th>
                <th scope="col" class="sort" data-sort="completion">Category Status</th>
                <th scope="col" class="sort" data-sort="completion">Category Launch Date</th>
                <th scope="col" class="sort" data-sort="completion">Action</th>
            </tr>
        </thead>
        <tbody class="list">
        <?php 
            foreach ($store as $key=> $value) { 
                if ($value['prod_parent_id'] == 1) {?>
            
            <tr>
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <span class="name mb-0 text-sm"><?php echo $value['id'] ?></span>
                        </div>
                    </div>
                </th>
                <td class="budget">
                <?php echo $value['prod_parent_id'] ?>
                </td>
                <form method = "post">
                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                    <td>
                    <input type="text" name="prod_name" value="<?php echo $value['prod_name'] ?>"/>
                    </td>
                <?php } else {?>
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $value['prod_name'] ?></span>
                    </span>
                </td>
                <?php } ?>
                <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) {?>
                    <td>
                    <input type="text" name="link" value="<?php echo $value['link'] ?>"/>
                </td> 
                <?php } else {?>
                <td>
                
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $value['html'] ?></span>
                    </span>
                </td>
                <?php } ?>
                <?php if (!(isset($_POST['edit']) && $_POST['id'] == $value['id']) ) {?>
                <td>
                    <?php if ($value['prod_available'] == 1) { ?>
                    Yes
                    <?php } else {?>
                    No 
                    <?php } ?> 
                </td>
                <?php } else {?>
                <td>
                <select id="msg2" name="prod_available" required>
                    <option selected >Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select> 
                </td>
                <?php } ?>
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $value['prod_launch_date'] ?></span>
                    </span>
                </td>
                <td>
                    <form method = "post">
                       <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                       <?php if (isset($_POST['edit']) && $_POST['id'] == $value['id'] ) { ?>
                       <button type="submit" name="update" class="btn btn-primary">Update</button>
                       <?php } else {?>
                        <button type="submit"  name="edit" class="btn btn-primary">Edit</button>
                       <?php } ?>
                       <button type="submit" onclick="return confirm('Are you Sure want to delete? ')" 
                       name="delete" class="btn btn-primary">Delete</button>
                    </form>
                    </form>
                </td>
               
            </tr>            
       <?php }
         }?>
          </tbody>
    </table>
</div>

</div>

    <!-- Footer -->
    <?php require 'footer.php';?>