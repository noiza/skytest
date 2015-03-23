<?php
// Список учителей, с которыми занимаются только следующие ученики: Георгий, Харитон, Денис, Андрей
require_once("header.php");
$students = SkyengDB::getInstance()->getStudents();
?>
<p>Список учителей, с которыми занимаются только следующие ученики: Георгий, Харитон, Денис, Андрей</p><br/>
<form action="filter.php" method="post">
    <h2>Студенты</h2>
    <p>Отметьте необходимых студентов галочками и нажмите кнопку "Формировать отчет"</p>
    <?php foreach($students as $student){?>
    <input name="students[]" type="checkbox" value="<?php echo $student['id_student'];?>" id="stud-<?php echo $student['id_student'];?>" />
    <label for="stud-<?php echo $student['id_student'];?>"><?php echo $student['name'];?></label>
    <br/>
    <?php } ?>
    <br/>
    <input type="submit" value="Формировать отчет">
</form>
<hr/>


<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['students'])){
        $teachers = SkyengDB::getInstance()->getFilterTeachers($_POST['students']);
        echo "<h2>Учителя:</h2>";
        if($teachers) {
            echo "<ul>";
            foreach($teachers as $teacher){
                echo "<li>".$teacher['name']."</li>";
            }
            echo"</ul>";
        }
    }
}
?>