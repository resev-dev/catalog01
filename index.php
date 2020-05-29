<?php

require_once __DIR__ . '/apps.php';

$prepareItems = getCatalog();

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
                    <td><img src="<?php __DIR__ ?>img/<?= $item['image'] ;?>" width="150" alt=""></td>
                    <td>
                        <h3><?= $item['name'] ;?></h3>
                        <p><?= $item['description'] ;?></p>
                        <p>Цена: <?= $item['price'] ;?> руб.</p>
                    </td>
                    <td>
                        <a href="/order.php?id=<?= $item['id'] ;?>">Заказать</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else :?>
            <p><b>Товары не найдены</b></p>
        <?php endif; ?>
    </table>
</body>
</html>