<?php
// Назначение учителю какого-либо ученика. У учителя/ученика может быть любое количество учеников/учителей
require_once("header.php");
$teachers = SkyengDB::getInstance()->getTeachers();
if(isset($_POST['teacher'])){
    $current_teacher = $_POST['teacher'];
} else {
    $current_teacher = 0;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<p>Назначение учителю какого-либо ученика. У учителя/ученика может быть любое количество учеников/учителей</p>
<form action="assign.php" method="post">
    <h2>Учитель:</h2>
    <select name="teacher" onchange="this.form.submit();">
        <option value="0">Выберите преподавателя</option>
        <?php foreach($teachers as $teacher){
            if ($teacher['id_teacher'] == $current_teacher){ ?>
            <option value="<?php echo $teacher['id_teacher'];?>" selected="selected"><?php echo $teacher['name'];?></option>
        <?php } else { ?>
        <option value="<?php echo $teacher['id_teacher'];?>"><?php echo $teacher['name'];?></option>
        <?php }  } ?>
    </select>
    <hr/>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['save']) && isset($_POST['teacher']) && isset($_POST['students'])){
        //нажат input, происходит сохранение
        $result =  SkyengDB::getInstance()->addStudentTeachers($_POST['teacher'], $_POST['students']);
        echo($result);
    }
    if(isset($_POST['teacher']) && $_POST['teacher']!=0){
        $current_stud = SkyengDB::getInstance()->getCurrentStudents($_POST['teacher']);
        echo "<h2>Студенты</h2>";
        $students = SkyengDB::getInstance()->getStudents();
        foreach ($students as $student){
            if (in_array($student['id_student'], $current_stud)){
                echo "<input name='students[]' type='checkbox' value='".$student['id_student']."' id='stud-".$student['id_student']."' checked/>";
            } else {
                echo "<input name='students[]' type='checkbox' value='".$student['id_student']."' id='stud-".$student['id_student']."' />";
            }
            echo "<label for ='stud-".$student['id_student']."'>".$student['name']."</label></br>";
        }
        echo "<br/><input type='submit' name='save' value='Назначить учителя'>";
    }
}?>

</form>