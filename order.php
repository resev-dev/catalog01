<?php

require_once __DIR__ . '/apps.php';

$itemId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$itemId) { // '' => false, null => false
    header ("Location: index.php");
    exit();
}

$items = getCatalog ();

if (empty($items)) {
    header ("Location: index.php");
    exit();
}

$itemInfo = [];

foreach ($items as $item) {
    if ($item['id'] === $itemId) {
        $itemInfo = $item;
        continue;
    }
}

if (empty($itemInfo)) {
    header ("Location: index.php");
    exit();
}

$itemName = $itemInfo['name'];
$title = 'Оформление заказа: ' . $itemName;

?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

<?php include_once __DIR__ . '/_menu.php'; ?>

<h1><?= $title ?></h1>

<p><b>Описание:</b> <?= $itemInfo['description']; ?></p>

<p><b>Цена:</b> <?= $itemInfo['price']; ?> руб.</p>

<form action="" method="POST" autocomplete="on">
    <div>
        <label>
            Количество товара в заказе:<br>
            <input type="number" name="count" placeholder="Количество товара" value="1" min="1" required>
        </label>
    </div>

    <div>
        <label>
            Ваше имя:<br>
            <input type="text" name="username" placeholder="Введите имя" required>
        </label>
    </div>

    <div>
        <label>
            Ваш Email:<br>
            <input type="email" name="email" placeholder="Введите Email" required>
        </label>
    </div>

    <div>
        <label>Ваш комментарий к заказу:<br>
            <textarea name="comment" cols="30" rows="10"></textarea>
        </label>
    </div>

    <div>
        <button type="submit">Оформить заказ</button>
    </div>
</form>
</body>

</html>
