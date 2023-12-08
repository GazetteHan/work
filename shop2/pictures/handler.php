<?php

$pdo = new PDO("mysql:host=localhost;dbname=shop;","root","");
$sql = "SELECT * FROM cards";
$statement = $pdo->prepare($sql);
$statement->execute();
$cards = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($cards as $card => $value):?>
    <div class="product">

            <div class="printer"><img src="<?php echo $value['image']?>"></div>
            <h2 class="product__name"><?php echo $value['title']?></h2>
            <div class="product__info-row typography_h4">
              <span><?php echo $value['price']?></span>
            </div class="div-basket">
                <a href="#" class="button-basket text">В корзину</a>
            </div>
          </div>`;
<?php endforeach;?>