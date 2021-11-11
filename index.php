
PHP
Con
tent.php
15.37 KB
09:05
11:36 08/05/2021

00:04
11:36
16:00 05/10/2021

Khỏi nói thầy đi tao onl 3g rồi
16:00

ok
16:07
10:24 07/11/2021

Happy birth days nha kiều ngân luôn hành phúc luôn thành công hết dịch rủ nhậu🎂
10:24

Lên CT là đi nhậu nhe má
10:27
13:29 07/11/2021

Okok
13:29
00:48 Hôm nay

PHP
in
dex1.php
13.24 KB
00:48

<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>ID</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Dieff</strong></th>
              
        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"Select * from store");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["storeid"];?></td>
              <td><?php echo $row["storename"];?></td>
              <td><?php echo $row["storedes"];?></td>
              
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>


