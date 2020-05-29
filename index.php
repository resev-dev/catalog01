<?php

$filename = __DIR__ . '/repository/catalog.txt';
$fileItems = file($filename);

array_shift($fileItems);

$prepareItems = array_map(function($item){
    return explode('|', $item);
}, $fileItems);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <?php include_once __DIR__ . '/_menu.php'; ?>

    <h1>Каталог товаров</h1>

    <table>

        <?php if(!empty($prepareItems)) : ?>
            <?php foreach($prepareItems as $item) :?>
                <tr>
                    <td><img src="/img/<?= $item[3] ;?>" width="150" alt=""></td>
                    <td>
                        <h3><?= $item[1] ;?></h3>
                        <p><?= $item[4] ;?></p>
                        <p>Цена: <?= $item[2] ;?> руб.</p>
                    </td>
                    <td>
                        <a href="/order.php?id=<?= $item[0] ;?>">Заказать</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else :?>
            <p><b>Товары не найдены</b></p>
        <?php endif; ?>
    </table>
</body>
</html>