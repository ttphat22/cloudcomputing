<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
                <div class="latest-product">
                    <h2 align="center" class="section-title"><b style="border-bottom: solid black 3px;">PRODUCT PORTFOLIO</bs></h2></br>
                    <div class="product-carousel">  
                        <!--upload products from -->
                        <?php
                        if(isset($_GET["id"]))
                        {
                        // 	include_once("database.php");
                            $id = $_GET["id"];
                            $result = pg_query($conn, "SELECT *
                            FROM public.product WHERE cat_id = '$id'");
                            if(!$result) { //add this check.
                                die('Invalid query: ' . pg_result_error($conn));
                            }
                            while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){     
                        ?>
                        <!--display products-->
                        
                        <div class="col-lg-3 col-sm-6 col-md-4">
                            <a href="index.php?page=productpage&&id=<?php echo $row['pro_id']; ?>">
                            <div class="box-img">
                            </br>
                                <img src="product_image/<?php echo $row['image']?>" width="200" height="200"></br></br>
                                <b style="color: black;"><?php echo  $row['pro_name']?></b></br>
                                <b><i style="color: black;">Price: <?php echo number_format($row['Price'],0,",",".")."VND";?></i></b>
                            </div> 
                            </a>            
                        </div> 
                        <?php                
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>