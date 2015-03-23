<?php
require_once("header.php");
$teachers = SkyengDB::getInstance()->getStudentTeachers();
/*echo "<pre>";
var_dump($teachers);
echo "</pre>";*/

$teacher_ids = array_keys($teachers);
if (count($teachers)<2)
{
    exit("Слишком мало учителей для сравнения");
}
$n = count($teachers);
//$max_teachers[] = array($teacher_ids[0],$teacher_ids[1]);
$max_common = 0;

for ($i = 0; $i < $n - 1; $i++)
    for ($j = $i + 1; $j < $n; $j++)
    {
        $common = count(array_intersect($teachers[$teacher_ids[$i]], $teachers[$teacher_ids[$j]]));
        if ($common > $max_common){
            $max_common = $common;
            $max_teachers = array();
        }
        if ($common >= $max_common)
            $max_teachers[] = array($teacher_ids[$i], $teacher_ids[$j]);
    }
if (!empty($max_teachers)){
    //любые учителя, для премьера первая пара
    $teacher_info = SkyengDB::getInstance()->getTeacherInfo($max_teachers[0]);
    foreach($teacher_info as $teacher){
        echo $teacher['id_teacher'].") ".$teacher['name']."<br>";
    }
    echo "Количество общих учеников: ".$max_common;
}

?>
