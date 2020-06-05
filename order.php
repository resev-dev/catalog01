<?php

require_once __DIR__ . '/apps.php';

$itemId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$itemId) { // '' => false, null => false
    header("Location: index.php");
    exit();
}

$items = getCatalog();

if (empty($items)) {
    header("Location: index.php");
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
    header("Location: index.php");
    exit();
}

$dataForm = $_POST;

if (!empty($dataForm)) {
    $count = isset($dataForm['count']) ? $dataForm['count'] : null;
    if (isset($dataForm['username'])) {
        $username = htmlspecialchars(trim($dataForm['username']));
    } else {
        $username = null;
    }
    $email = isset($dataForm['email']) ? htmlspecialchars(trim($dataForm['email'])) : null;
    $comment = isset($dataForm['comment']) ? htmlspecialchars(trim($dataForm['comment'])) : null;

    $errors = [];
    if ($count < 1) {
        $errors[] = 'Количество товара не может быть меньше 1';
    }

    if (empty($username) || empty($email)) {
        $errors[] = 'Не заполнены обязательные поля';
    }

    if (empty($errors)) {
        // обработка формы

        // сформируем массив с информацией о заказе
        $sum = $count * $itemInfo['price'];
        $order = [
            'id' => rand(10000, 999999) . '_' . time(),
            'date' => date('Y-m-d H:i'),
            'username' => $username,
            'email' => $email,
            'product' => $itemInfo['name'],
            'count' => $count,
            'price' => $itemInfo['price'],
            'sum' => $sum . "\r\n",
        ];
        // откроем файл для записи
        $filename = __DIR__ . '/repository/orders.txt';
        $fileHandle = fopen($filename, 'a+');
        // добавим заказ в файл
        fwrite($fileHandle, implode('|', $order));
        // закроем файл
        fclose($fileHandle);
        // перенаправить в каталог товаров

    } else {
        //$errorsPrepare = implode('<br>', $errors);

        $errorsPrepare = '';

        foreach ($errors as $itemError) {
            $errorsPrepare .= sprintf('<div style="font-weight: bold; color: red">%s</div>', $itemError);
        }

    }
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

    <p>
        <?= $errorsPrepare;?>
    </p>

    <form action="" method="POST" autocomplete="on">
        <div>
            <label>Количество товара в заказе</label><br>
            <input type="number" name="count" placeholder="Количество товара" value="1" min="1" required>
        </div>
        <div>
            <input type="text" name="username" placeholder="Ваше имя" required>
        </div>
        <div>
            <input type="email" name="email" placeholder="Ваш Email" required>
        </div>
        <div>
            <label>Ваш комментарий к заказу</label><br>
            <textarea name="comment" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Оформить заказ</button>
        </div>
    </form>
</body>

</html>
