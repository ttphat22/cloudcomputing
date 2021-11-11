<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="row">
                <?php
                    if(isset($_GET['page']) && $_GET['page']=="productpage" && isset($_GET["id"]))
                    { 
                        $_GET["id"]= pg_escape_string($conn, $_GET["id"]);
                        include_once("connection.php");
                        $result = pg_query($conn, "Select * from public.product where pro_id = '".$_GET["id"]."'");
                        // if (!$result) {
                        //     printf("Error: %s\n", mysqli_error($conn));
                        //     exit();
                        // }
                        if(pg_num_rows($result)!=0)
                        {

                            $row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

                        
                ?>
                        <div class="col-sm-4">
                        <div class="preview-pic tab-content">
                        <img src="img/<?php echo $row['image']; ?>" alt="" />
                        </div> 
                        </div>
                        <h1>
                            <?php echo $row["pro_name"]; ?>
                        </h1>
                        <h3>
                        <?php echo number_format($row['price'],0,",",".")."VND";?>
                        </h3>
                        <p>
                        <?php echo $row["description"]; ?>
                        </p>

                <?php }
                }?>
				</div>
			</div>
		</div>
	</div>