<?php
class SkyengDB extends mysqli
{
    private static $instance = null;

    private $dbHost = "localhost";
    private $dbName = "skyeng";
    private $dbUser = "admin";
    private $dbPass = "321";

    private function __construct(){
        parent::__construct($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
        if (mysqli_connect_error()){
            exit('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __clone(){ }

    public function __wakeup(){ }

    public function createTeacher($name){
        $this->query("INSERT INTO teachers (name) VALUES ('".$this->real_escape_string($name)."')");
    }

    public function createStudent($name){
        $this->query("INSERT INTO students (name) VALUES ('".$this->real_escape_string($name)."')");
    }

    public function getTeachers(){
        $query = "SELECT id_teacher, name FROM teachers";
        if ($result = $this->query($query)){
            while ($row = $result->fetch_assoc()){
                $teachers[] = $row;
            }
            return $teachers;
        } else {
            return null;
        }
    }

    public function getStudents(){
        $query = "SELECT id_student, name FROM students";
        if ($result = $this->query($query)){
            while ($row = $result->fetch_assoc()){
                $students[] = $row;
            }
            return $students;
        } else {
            return null;
        }
    }

    public  function getCurrentStudents($teacher){
        $query = "SELECT id_student FROM student_teachers WHERE id_teacher = $teacher";
        if ($result = $this->query($query)){
            while ($row = $result->fetch_row()){
                $students[] = $row[0];
            }
            return $students;
        } else {
            return null;
        }
    }
    public function addStudentTeachers($teacher, $students){
        $query1 = "DELETE FROM student_teachers WHERE id_teacher ='{$teacher}'";
        $query2 = "INSERT INTO student_teachers (id_teacher, id_student) VALUES ";
        $vals = array();
        foreach ($students as $student) {
            $vals[] = "('".$teacher."', '".$student."')";
        }
        $query2 .= implode(',', $vals);
        $this->query($query1);
        $this->query($query2);
    }
    public function getAllTeachers(){
        $query = "SELECT t.id_teacher, t.name, s_t.id_student, s.name
                  FROM teachers AS t
                  Left JOIN student_teachers AS s_t
                  ON t.id_teacher = s_t.id_teacher
                  left JOIN students AS s
                  ON s_t.id_student = s.id_student
                  ORDER BY id_teacher";
        if($result = $this->query($query)){
            while ($row = $result->fetch_assoc()){
                $teachers[] = $row;
            }
            return $teachers;
        } else {
            return null;
        }
    }


    public function getTeachersWithQuantity(){
        $query = "SELECT t.id_teacher, s_t.id_student, t.name, IF(id_student IS NULL, 0, COUNT(*)) AS qty FROM teachers AS t LEFT JOIN student_teachers AS s_t ON t.id_teacher = s_t.id_teacher GROUP BY t.id_teacher ORDER BY id_teacher";
        if($result = $this->query($query)){
            while ($row = $result->fetch_assoc()){
                $teachers[] = $row;
            }
            return $teachers;
        } else {
            return null;
        }
    }

    public function getFilterTeachers($students){
        $ids = implode(",", $students);
        $result = $this->query("SELECT s_t.id_student, s_t.id_teacher, t.name FROM student_teachers as s_t LEFT JOIN teachers as t ON s_t.id_teacher=t.id_teacher WHERE s_t.id_student IN (" .$ids. ") GROUP BY s_t.id_teacher");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $teachers[] = $row;
            }
            return $teachers;
        } else {
            return null;
        }
    }

    public function getStudentTeachers(){
        $arr = array();
        $query = "SELECT id_teacher, id_student FROM student_teachers ORDER BY id_teacher";
        if ($result = $this->query($query)){
            while($row = $result->fetch_assoc()){
                $arr[$row['id_teacher']][ $row['id_student']] = $row['id_student'];
            }
            return $arr;
        }
    }

    public function getTeacherInfo($teachers){
        $ids = implode(",", $teachers);
        $result = $this->query("SELECT id_teacher, name FROM teachers WHERE id_teacher IN (" .$ids. ")");
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $arr[] = $row;
            }
            return $arr;
        }
    }


}