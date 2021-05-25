<?php
// 教室分配
abstract class Students{
    abstract public function classroom();
}

class OpenStudents extends Students{
    public function classroom()
    {
        return '公开课1，公开课2，公开课3';
    }
}

class VipStudents extends Students{
    public function classroom()
    {
        return 'VIP课1，VIP课2，VIP课3';
    }
}

// 学员上课
abstract class Listen{
    abstract public function project($who,$course);
}

class Course extends Listen{
    public function project($course,$who)
    {
         return $course.'这几个教室在上'.$who;
    }
}

class StudentListen{
    public $classroom;
    public $course;

    public function __construct($classroom,$course)
    {
        $this->classroom = $classroom;
        $this->course = $course;
    }

    public function privilege($who){
        $roomName = $this->classroom->classroom();
        echo $this->course->project($roomName,$who);
    }
}

$classroom = new OpenStudents();
$course = new Course();
$obj = new StudentListen($classroom,$course);
$obj->privilege('swoole开发投票系统');
// 公开课1，公开课2，公开课3这几个教室在上swoole开发投票系统