<?php
// Создание нового учителя или ученика
require_once("header.php");

$nameIsEmpty = false;

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if ($_POST['name'] == ""){
        $nameIsEmpty = true;
    }

    if(!$nameIsEmpty && isset($_POST['createStudent'])){
        SkyengDB::getInstance()->createStudent($_POST['name']);
    } else if (!$nameIsEmpty && isset($_POST['createTeacher'])){
        SkyengDB::getInstance()->createTeacher($_POST['name']);
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Create</title>
</head>
<body>
    <p>Создание нового учителя или ученика</p>
    <form action="create.php" method="post">
        <label>Имя:</label>
        <input type="text" name="name"><br>
        <?php
        if ($nameIsEmpty){
            echo("<span>Пожалуйста, введите имя</span>");
        }
        ?>
        <br><input type="submit" name="createStudent" value="Добавить ученика">
        <input type="submit" name="createTeacher" value="Добавить учителя">
    </form>
</body>
</html>