<?php

require_once __DIR__ . '/apps.php';

$prepareOrders = getCatalog ('orders');

?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Список заказов</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

<?php include_once __DIR__ . '/_menu.php'; ?>

<h1>Список заказов</h1>

<table class="order-list">
    <tr>
        <th>№</th>
        <th>Дата</th>
        <th>Товар</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>ИТОГ</th>
    </tr>

    <?php if (!empty($prepareOrders)) : ?>
        <?php foreach ($prepareOrders as $item) : ?>
            <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['date']; ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['count'] ?></td>
                <td><?= $item['price'] ?> руб.</td>
                <td class="total-sum"><?= $item['sum'] ?> руб.</td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <p><b>Заказы не найдены</b></p>
    <?php endif; ?>
</table>
</body>

</html>