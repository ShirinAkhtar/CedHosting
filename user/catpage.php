<?php
require 'header.php';
$Product = new Product();
$store = $Product ->displayProduct();
$store1 = $Product ->displayProduct_description();
?>                <div class="content">
    <div class="linux-section">
        <div class="container">
            <div class="linux-grids">
                <div class="col-md-8 linux-grid">
                <?php
                foreach ($store as $key1=>$value1) {
                    
                    //$id = $value['prod_parent_id'];
                    if ($value1['id'] == $_GET['id']) {
                    
                        $temp = $value1['prod_name']; 
                    
                ?>
                <h2><?php echo $temp ?></h2>
                <?php echo $value1['html'];?>
                    <?php }
                } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="tab-prices">
        <div class="container">
            <div class="bs-example bs-example-tabs" 
            role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs left-tab" 
                role="tablist">
                    <li role="presentation" class="active">
                    <a href="#home" id="home-tab" role="tab" 
                    data-toggle="tab" aria-controls="home" 
                    aria-expanded="true">IN Hosting</a></li>
                    <li role="presentation"><a href="#profile" 
                    role="tab" id="profile-tab" data-toggle="tab" 
                    aria-controls="profile">US Hosting</a></li>
                    </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" 
                    class="tab-pane fade in active" 
                    id="home" aria-labelledby="home-tab">
                        <div class="linux-prices"> <?php 
                        foreach ($store1 as $key1=> $value) { 
                            if ($_GET['id'] == $value['prod_parent_id']) {
                                $description = json_decode($value['description']); ?>
                            <div class="col-md-3 linux-price">
                            <div class="linux-top">
                            <h4><?php echo $value['prod_name']; ?>
                            </h4>
                                </div>
                                <div class="linux-bottom">
                                    <h5>
                                ₹ <?php echo $value['mon_price'];?>
                                <span class="month">per month</span>
                                </h5>
                                <h6>
                                <?php echo $description->domain ;?>
                                </h6>
                                    <ul>
                                    <li><strong>
                                        <?php echo $description->webspace; ?>
                                        </strong> Disk Space</li>
                                        <li><strong><?php echo $description->bandwidth; ?>
                                        </strong> Data transfer</li>
                                        <li><strong><?php echo $description->mailbox; ?>
                                        </strong> Email Account</li>
                                    <li><strong>Includes</strong> 
                                        Global CDN</li>
                                        <li><strong>
                                        High Performance</strong>
                                        Servers</li>
                                    <li><strong>location</strong> 
                                        :<img src="images/india.png">
                                    </li>
                                        </ul>
                                </div>
                                <a href="#">buy now</a>
                                </div>
                            <?php } ?> 
                        <?php } ?>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- clients -->
<div class="clients">
    <div class="container">
        <h3>Some of our satisfied clients include...</h3>
        <ul>
            <li>
                <a href="#">
                    <img src="images/c1.png" title="disney" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/c2.png" title="apple" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/c3.png" title="microsoft" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/c4.png" title="timewarener" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/c5.png" title="disney" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/c6.png" title="sony" />
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- clients -->
    <div class="whatdo">
        <div class="container">
            <h3>Linux Features</h3>
            <div class="what-grids">
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-cog" 
                    aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet 
                        conse ctetur adipisicing elit, 
                        sed do eiusmod tempor incididunt 
                        ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-dashboard"
                        aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet 
                        conse ctetur adipisicing elit,
                            sed do eiusmod tempor incididunt
                            ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-stats"
                        aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit 
                        amet conse ctetur adipisicing elit, 
                        sed do eiusmod tempor incididunt
                            ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="what-grids">
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-download-alt"
                    aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit
                        amet conse ctetur adipisicing elit, 
                        sed do eiusmod tempor incididunt 
                        ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-move" 
                    aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit
                        amet conse ctetur adipisicing elit, 
                        sed do eiusmod tempor incididunt ut
                            labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-screenshot"
                    aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit 
                        amet conse ctetur adipisicing elit,
                        sed do eiusmod tempor incididunt
                            ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
            <!---footer-->
<?php require 'footer.php'?>