<?php include "connect.php" ?>
<html>
    <head> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="./style_product.css">
    </head>
    
<body>
    <div>
        <?php
          $stmt = $pdo->prepare("SELECT * FROM product "); // ถ ้ามีค่าที่สงมาจากฟอร์ม ่
        //   $value = '%' . $_GET["keyword"] . '%'; // ดึงค่าที่สงมาก าหนดให ้กับตัวแปรเงื่อนไข ่
        //   $stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว ้
          $stmt->execute(); // เริ่มค ้นหา
          $stmt1 = $pdo->prepare("SELECT * FROM category ");
          $stmt1->execute();
        ?>
    <div style="display:flex">

    <?php while ($row1 = $stmt1->fetch()) : ?>
        <div class="vertical-menu">
            <a href="#" class="active"><?=$row1["cate_name"]?></a>

         <?php endwhile; ?>
         </div>

        </div >
    <div style="display:flex">
        <?php while ($row = $stmt->fetch()) : ?>
         <div style="padding: 15px; text-align: center">
         <a>
        <img src='img/<?=$row["imgpro"]?>.jpg' width='100'><br>
        ชื่อ : <?=$row ["pname"]?><br>
        ราคา: <?=$row ["price"]?> บาท<br>
        รายละเอียด: <?=$row ["detail_product"]?>
        </a>
    </div>
    <?php endwhile; ?>
    </div>
        </div>
</body>
</html>