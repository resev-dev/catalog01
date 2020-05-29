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

        <tr>
            <td>101</td>
            <td>2020-05-29 11:11:11</td>
            <td>Стиральная машина LG F2J3HS0W</td>
            <td>1</td>
            <td>22999 руб</td>
            <td class="total-sum">22999 руб</td>
        </tr>
    </table>
</body>
</html>