<?php
//require 'class.php';
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$filename = basename($path);
$service_menu = array('linuxhosting.php', 'wordpresshosting.php', 'windowshosting.php', 'cmshosting.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>CedHosting | <?php echo ucfirst($title); ?></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <!---fonts-->
        <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!---fonts-->
        
        <!--script-->
        <?php if($filename == 'index.php' || $filename == 'about.php'){ ?>
        <script src="js/modernizr.custom.97074.js"></script>
        <script src="js/jquery.chocolat.js"></script>
        <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
        <!--lightboxfiles-->
        <script type="text/javascript">
        $(function() {
        $('.team a').Chocolat();
        });
        </script>	
        <script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
        <script type="text/javascript">
        $(function() {
            $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
        });
        </script>
        <?php } else { ?>
        <link rel="stylesheet" href="css/swipebox.css">
        <script src="js/jquery.swipebox.min.js"></script> 
        <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
        </script>	
        <?php } ?>								
        <!--script-->
    </head>
    <body>
        <!---header--->
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <i class="sr-only">Toggle navigation</i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </button>				  
                            <div class="navbar-brand">
                                <h1><a href="index.php"><img src="logo2.png" alt="cedhosting" width="120px" height="110px"></a></h1>
                            </div>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li <?php if($filename == 'index.php'): ?>class="active"<?php endif; ?> ><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
                                <li <?php if($filename == 'about.php'): ?>class="active"<?php endif; ?>><a href="about.php">About</a></li>
								<li <?php if($filename == 'services.php'): ?>class="active"<?php endif; ?>><a href="services.php">Services</a></li>
								<li class="dropdown <?php if(in_array($filename,$service_menu)): ?>active<?php endif; ?> ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
                                    <ul class="dropdown-menu">
                                                <li <?php if($filename == 'linuxhosting.php'): ?>class="active"<?php endif; ?> ><a href="linuxhosting.php">Linux hosting</a></li>
                                                <li <?php if($filename == 'wordpresshosting.php'): ?>class="active"<?php endif; ?> ><a href="wordpresshosting.php">WordPress Hosting</a></li>
                                                <li <?php if($filename == 'windowshosting.php'): ?>class="active"<?php endif; ?> ><a href="windowshosting.php">Windows Hosting</a></li>
                                                <li <?php if($filename == 'cmshosting.php'): ?>class="active"<?php endif; ?> ><a href="cmshosting.php">CMS Hosting</a></li>
                                            
                                    </ul>			
                                </li>
                                <li <?php if($filename == 'pricing.php'): ?>class="active"<?php endif; ?>><a href="pricing.php">Pricing</a></li>
                                <li <?php if($filename == 'blog.php'): ?>class="active"<?php endif; ?>><a href="blog.php">Blog</a></li>
                                <li <?php if($filename == 'contact.php'): ?>class="active"<?php endif; ?>><a href="contact.php">Contact</a></li>
                                <li>
                                    <a href="cart.php">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </a>
								</li>
								<?php if(!isset($_SESSION['userdata'])) {?>
									<li>
							<a href="logout.php">
								<button type="button" class="btn btn-primary" id="rcorners2">Logout</button>
							</a>
						</li>
						<?php } else { ?>
                                <li <?php //if($filename == 'login.php'): ?>class="active"<?php //endif; ?>><a href="login.php">Login</a></li>
                            </ul>
							<?php } ?>      
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
        <!---header--->