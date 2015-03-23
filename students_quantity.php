<?php
// Список всех учителей с количеством занимающихся у них учеников
require_once("header.php");
$teachers = SkyengDB::getInstance()->getTeachersWithQuantity();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <p>Список всех учителей с количеством занимающихся у них учеников</p>
    <h2>Учителя:</h2>
    <?php if($teachers) {?>
    <ul>
        <?php foreach($teachers as $teacher){ ?>
        <li><?php echo $teacher['name']." — ".$teacher['qty'];?></li>
        <?php } ?>
    </ul>
    <?php } ?>
</body>
</html>