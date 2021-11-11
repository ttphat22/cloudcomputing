
<!-- slideshow -->
<div class="container">
   <div class="row overflownone">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner res" role="listbox">
            <div class="item active">
                <img src="img/1.jpg"/>
            </div>
            <div class="item">
            <img src="img/2.jpg">
            </div>
            <div class="item">
            <img src="img/3.jpg"/>
            </div>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
</div>
</div>
</br>
 <!-- slideshow -->
<!-- display products -->
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
                <div class="latest-product">
                    <h2 align="center" class="section-title"><b style="border-bottom: solid black 3px;">Sản Phẩm Hot</bs></h2></br>
                    <div class="product-carousel">
                        <?php
                            // 	include_once("database.php");
                            $result = pg_query($conn, "SELECT * FROM public.product LIMIT 8");

                            if (!$result) { //add this check.
                                die('Invalid query: ' . pg_result_error($conn));
                            }

                        
                            while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
                        ?>
                        <div class="col-lg-3 col-sm-6 col-md-4">
                        <a href="index.php?page=productpage&&id=<?php echo $row['pro_id']; ?>">
                            <div class="box-img">
                            </br>
                                <img src="product_image/<?php echo $row['image']?>" width="200" height="200"></br></br>
                                <b style="color: black;"><?php echo  $row['pro_name']?></b></br>
                                <b><i style="color: black;">Price: <?php echo number_format($row['price'],0,",",".")."VND";?></i></b>
                            </div>
                            </a>
                        </div>          
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>