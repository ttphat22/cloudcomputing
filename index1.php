<!DOCTYPE html>
<html lang="en">
<head>
  <title>TP Mobile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styleasm1633.css"/>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
  
</head>
<?php

	session_start();
	include_once("connection.php");
?>
 
<!-- navigation -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
	  </button>
	  <a class="navbar-brand">ATN Shop</a>
	</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index1.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Xe Điều Khiển Từ Xa <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'A1';?>">Xe Tăng</a></li>
            <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'A2';?>">Xe Hơi</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mô Hình <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B1';?>">One Pie</a></li>
            <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B2';?>">Naruto</a></li>
			<li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B3';?>">Dragon Ball</a></li>
          </ul>
		</li>
		<li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Phụ Kiện Đặc Biệt <span class="caret"></span></a>
          	<ul class="dropdown-menu">
		  		<li><a href="index1.php?page=choosecategory1633&id=<?php echo 'C1';?>">Vòng Tay</a></li>
            	<li><a href="index1.php?page=choosecategory1633&id=<?php echo 'C2';?>">Nhẫn</a></li>
            	<li><a href="index1.php?page=choosecategory1633&id=<?php echo 'C3';?>">Móc Khóa</a></li>

          	</ul>
		</li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thời Trang <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'D1';?>">Áo Ironman</a></li>
            <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'D2';?>">Áo Marvel</a></li>
			<li><a href="index1.php?page=choosecategory1633&id=<?php echo 'D3';?>">Áo Spiderman</a></li>
          </ul>
		</li>
	  </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php
			if(isset($_SESSION['email']) && isset($_SESSION['admin']))
			{
				if($_SESSION['admin'] == 0)
				{
                    ?>
                        <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B1';?>">Khuyến Mãi</a></i>
						<li><a href="?page=cusinfor"><i class="glyphicon glyphicon-user"></i>Hi,<?php echo $_SESSION['email']?> </a></i>
						<li><a href="?page=logout"><i class="glyphicon glyphicon-log-out"></i> Log out</a></li>
					<?php 
				}
				elseif($_SESSION['admin'] == 1)
				{
					?>
						<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Management <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="?page=category">Category Management</a></li>
                            <li><a href="?page=store">Store Management</a></li>
							<li><a href="?page=product">Product Management</a></li>
						</ul>
						</li>
						<li><a href="?page=cusinfor"><i class="glyphicon glyphicon-user"></i> Hi, <?php echo $_SESSION['firstname']; ?> </a></i>
						<li><a href="?page=logout"><i class="glyphicon glyphicon-log-out"></i> Log out</a></li>
					<?php 
				}
			}
			else
				{
				?>
			<li><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<li><a href="?page=register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<?php
				}
			?>
      </ul>
    </div>
  </div>
</div>
</nav>
<!-- navigation -->
<body>
<?php
if(isset($_GET['page']))
{
    $page = $_GET['page'];
    if($page == "register")
    {
        include_once("register.php");
    }
    elseif($page == "login")
    {
        include_once("login.php");
    }
    elseif($page == "category")
    {
        include_once("category.php");
	}
    elseif($page == "store")
    {
        include_once("store.php");
	}
	
	elseif($page == "add_category")
    {
        include_once("add_category.php");
	}

    elseif($page == "add_store")
    {
        include_once("add_store.php");
	}
    
	elseif($page == "update_category")
    {
        include_once("update_category.php");
    }
    elseif($page == "update_store")
    {
        include_once("update_store.php");
    }
    elseif($page == "product")
    {
        include_once("product.php");
	}
	elseif($page == "add_product")
    {
        include_once("add_product.php");
	}
	elseif($page == "update_product")
    {
        include_once("update_product.php");
	}
    elseif($page == "cusinfor")
    {
        include_once("cusinfor.php");
	}
	elseif($page == "update_cusinfor")
    {
        include_once("update_cusinfor.php");
	}
    elseif($page == "logout")
    {
        include_once("logout.php");
    }
    elseif($page == "passinfor")
    {
        include_once("passinfor.php");
	}
	elseif($page == "choosecategory1633")
    {
        include_once("choosecategory1633.php");
    }
    elseif($page == "productpage")
    {
        include_once("productpage.php"); 
    }
    elseif($page == "aboutus")
    {
        include_once("aboutus.php"); 
    }
}
else
{
	include_once("content.php");
}
?>
</br>
</body>
<!--footer-->
<footer class="footer1">
    <div class="container">
    
    <div class="row"><!-- row -->
                
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                    <ul class="list-unstyled clear-margins"><!-- widgets -->
                            
                                <li class="widget-container widget_nav_menu"><!-- widgets list -->
                        
                                    <h1 class="title-widget">Introduction</h1>
                                    
                                    <ul>
                                        <li><a  href="index1.php?page=aboutus"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                        <li><a  href="index1.php"><i class="fa fa-angle-double-right"></i> Home</a></li>
                                    </ul>
                        
                                </li>
                                
                            </ul>
                             
                          
                    </div><!-- widgets column left end -->
                    
                    
                    
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                
                    <ul class="list-unstyled clear-margins"><!-- widgets -->
                            
                                <li class="widget-container widget_nav_menu"><!-- widgets list -->
                        
                                    <h1 class="title-widget">Mô Hình</h1>
                                    
                                    <ul>
                                    <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B1';?>">One Pie</a></li>
                                    <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B2';?>">Naruto</a></li>
			                        <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B3';?>">Dragon Ball</a></li>
			                        <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'B4';?>">Huawei</a></li>
                                    </ul>
                        
                                </li>
                                
                            </ul>
                             
                          
                    </div><!-- widgets column left end -->
                    
                    
                    
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                
                    <ul class="list-unstyled clear-margins"><!-- widgets -->
                            
                                <li class="widget-container widget_nav_menu"><!-- widgets list -->
                        
                                    <h1 class="title-widget">Phụ Kiện Đặc Biệt</h1>
                                    
                                    <ul>
                                    <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'C1';?>">Vòng Tay</a></li>
                                    <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'C2';?>">Nhẫn</a></li>
                                    <li><a href="index1.php?page=choosecategory1633&id=<?php echo 'C3';?>">Móc Khóa</a></li>
                                    </ul>
                        
                                </li>
                                
                            </ul>
                             
                          
                    </div><!-- widgets column left end -->
                    
                    
                    <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                    
                       
                        
                            <ul class="list-unstyled clear-margins"><!-- widgets -->
                            
                                <li class="widget-container widget_recent_news"><!-- widgets list -->
                        
                                    <h1 class="title-widget">Contact Detail </h1>
                                    
                                    <div class="footerp"> 
                                    
                                    <h2 class="title-median">TP Mobile</h2>
                                    <p><b>Email ID:</b> <a href="mailto:phatttgcc19181@fpt.edu.vn">phatttgcc19181@fpt.edu.vn</a></p>
                                    <p><b>Helpline Numbers </b>
    
        <b style="color:#06ff30;">(8AM to 10PM):</b> +84706667675</p> <!--do not call-->
        
        <p><b>Location: </b> Lot 300A, Tran Hung Dao street, My Xuyen ward, Long Xuyen city, An Giang province</p>
        <p><b>Phone Numbers : </b>+84706667675</p>
         </div>
                                    
            <div class="social-icons">          
                <ul class="nomargin">
                    <a href="https://www.facebook.com/phat2207.0710/" target="_blank"><i class="fab fa-facebook-square" style="font-size:48px" id="social"></i></i></a>
                    <a href="mailto:phatttgcc19181@fpt.edu.vn"><i class="fas fa-envelope-square" style="font-size:48px" id="social"></i></a>                  
                </ul>
            </div>
                                </li>
                              </ul>
                           </div>
                    </div>
    </div>
</footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="copyright">
                        © 2016, TP Mobile, All rights reserved
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    
                    <div class="design">
    
                    </div>
                </div>
            </div>
        </div>
	</div>
<!-- footer -->
<div class="scroll-to-top scroll-to-target" style="display: block;">
<i class="glyphicon glyphicon-chevron-up"></i>   
</div>
<script>
         var offset = 200;
    var duration = 500;
    $(window).scroll(function () {
        if ($(this).scrollTop() > offset) {
            $('.scroll-to-top').fadeIn(400);
        } else {
            $('.scroll-to-top').fadeOut(400);
        }
    });
    $('.scroll-to-top').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    </script>
</html>