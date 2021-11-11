<script language="javascript">
    function deleteConfirm()
    {
        if(confirm("Are you sure to delete!"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<?php
require('requirelogin.php');
include_once("connection.php");
if(isset($_GET["function"])=="del")
{
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sq = "SELECT Image FROM product WHERE Pro_ID='$id'";
        $res = pg_query($conn, $sq);
        $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
        if (!$res) {
            printf("Error: %s\n", pg_result_error($conn));
            exit();
        }
        $filePic = $row['Image'];
        unlink("product_image/".$filePic);
        pg_query($conn, "DELETE FROM public.product WHERE pro_id='$id'");
    }   
}
?>
<form name="frm" method="post">
    <h1>Product Management</h1>
    <p>
        <a class="glyphicon glyphicon-plus" href="index1.php?page=add_product"> Add</a>
    </p>
    <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Category ID</strong></th>
                <th><strong>Store ID</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
            </thead>

        <tbody>
        <?php
            include_once("connection.php");
            $No=1;
            $result = pg_query($conn, "SELECT * FROM public.product a, public.category b, public.store c
            WHERE a.cat_id = b.cat_id && a.storeid = c.storeid");
            if (!$result) {
                printf("Error: %s\n", pg_result_error($conn));
                exit();
            }
            while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        ?>
        <tr>
            <td ><?php echo $No; ?></td>
            <td ><?php echo $row['pro_id']; ?></td>
            <td><?php echo $row['pro_name']; ?></td>
            <td ><?php echo $row['qty']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['cat_name']; ?></td>
            <td><?php echo $row['storename']; ?></td>
            <td align='center'><img src='product_image/<?php echo $row['image']?>' border='0' width="50" height="50" /></td>
            <td align='center'><a class="glyphicon glyphicon-edit" href="index1.php?page=update_product&&id=<?php echo $row["pro_id"]; ?>"></a></td>
            <td align="center"><a class="glyphicon glyphicon-trash" href="index1.php?page=product&&function=del&&id=<?php echo $row["pro_id"]; ?>" onclick="return deleteConfirm()"></a></td>
        </tr>
        <?php
            $No++;
            }
        ?>
        </tbody>
    
    </table>  

</form>
</body>