<?php

require_once __DIR__ . '/apps.php';

$itemId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$itemId) { // '' => false, null => false
    header("Location: index.php");
    exit();
}

$itemName = 'Стиральная машина LG F2J3HS0W';
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

    <p><b>Описание:</b> Стиральная машина LG F2J3HS0W автоматический аппарат с фронтальным типом загрузки, в барабан которого помещается до 7 кг грязного белья. Такие параметры позволяют использовать машину для глобальной стирки, которую вы можете устраивать по выходным. В машину вы сможете загружать объемные вещи, такие как пледы и небольшие одеяла. За один цикл устройство расходует до 56 литров воды. Прибор с размерами корпуса 60x85x44 см гарантирует комфортную эксплуатацию благодаря сниженному уровню шума, показатель которого соответствует 55 дБ.
        LG F2J3HS0W поддерживает технологию Steam, которая предназначена для циклов стирки "Гипоаллергенный", "Одежда малыша" и "Хлопок+Пар". Барабан машины предусматривает несколько вариантов вращения, что позволяет адаптировать работу устройства под разные типы тканей. Функция SmartDiagnosis представляет собой мобильную диагностику, использование которой позволит связаться с центром техподдержки. Модель поддерживает отжим на скорости 1200 об/мин и использует для стирки 10 программ</p>

    <p><b>Цена:</b> 22999 руб.</p>

    <form action="" method="POST">
        <div>
            <label>Количество товара в заказе</label><br>
            <input type="text" name="count" placeholder="Количество товара" value="1" required>
        </div>
        <div>
            <input type="text" name="username" placeholder="Ваше имя" required>
        </div>
        <div>
            <input type="email" name="email" placeholder="Ваше Email" required>
        </div>
        <div>
            <label>Ваш комментарий к заказу</label><br>
            <textarea name="comment" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Отправить заявку</button>
        </div>
    </form>
</body>
</html>