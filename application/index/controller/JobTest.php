<?php
namespace app\index\controller;
use think\Queue;
class JobTest
{
    /*
     * 测试队列action
     * */
    public function actionWithHelloJob(){
        // 1.当前任务将由哪个类来负责处理。
        // 当轮到该任务时，系统将生成一个该类的实例，并调用其 fire 方法
        $jobHandlerClassName  = 'app\index\job\Hello@fire';
        // 2.当前任务归属的队列名称，如果为新队列，会自动创建
        $jobQueueName     = "helloJobQueue";
        // 3.当前任务所需的业务数据 . 不能为 resource 类型，其他类型最终将转化为json形式的字符串
        // ( jobData 为对象时，需要在先在此处手动序列化，否则只存储其public属性的键值对)
        $jobData          = [ 'name' => 'test'.rand(), 'password'=>rand()] ;
        // 4.将该任务推送到消息队列，等待对应的消费者去执行
        $time2wait = strtotime('2021-04-29 10:59:00') - strtotime('now');  // 定时执行
        // $isPushed = Queue::later($time2wait, $jobHandlerClassName , $jobData , $jobQueueName );
        $isPushed = Queue::push($jobHandlerClassName, $jobData, $jobQueueName);
        // database 驱动时，返回值为 1|false  ;   redis 驱动时，返回值为 随机字符串|false
        if( $isPushed !== false ){
            echo date('Y-m-d H:i:s') . " a new Hello Job is Pushed to the helloJobQueue"."<br>";
        }else{
            echo 'Oops, something went wrong.';
        }
    }


    // public function actionWithHelloJob(){
    //
    //     // 1.当前任务将由哪个类来负责处理。
    //     //   当轮到该任务时，系统将生成一个该类的实例，并调用其 fire 方法
    //     $jobHandlerClassName  = 'app\index\job\Hello';
    //
    //     // 2.当前任务归属的队列名称，如果为新队列，会自动创建
    //     $jobQueueName  	  = "helloJobQueue";
    //
    //     // 3.当前任务所需的业务数据 . 不能为 resource 类型，其他类型最终将转化为json形式的字符串
    //     $jobData       	  = [ 'ts' => time(), 'bizId' => uniqid() , 'data' => $_GET ] ;
    //
    //     // 4.将该任务推送到消息队列，等待对应的消费者去执行
    //
    //     $isPushed = Queue::push( $jobHandlerClassName , $jobData , $jobQueueName );
    //
    //     //$isPushed = Queue::later(10,$jobHandlerClassName,$jobData,$jobQueueName); //把任务分配到队列中，延迟10s后执行
    //
    //     // database 驱动时，返回值为 1|false  ;   redis 驱动时，返回值为 随机字符串|false
    //     if( $isPushed !== false ){
    //         echo date('Y-m-d H:i:s') . " a new Hello Job is Pushed to the MQ"."<br>";
    //     }else{
    //         echo 'something went wrong.';
    //     }
    // }

  //   public function multiTask() {
  //     $taskType = $_GET['taskType'];
  //     switch ($taskType) {
  //         case "taskOne":
  //             $jobHandleClassName = "app\index\job\multiTask@taskOne";
  //             $jobQueueName = "taskOneQueue";
  //             $jobData = ['ts'=>time(), 'bizId'=>uniqid(), 'data'=>$_GET];
  //             break;
  //         case "taskTwo":
  //             $jobHandleClassName = "app\index\job\multiTask@taskTwo";
  //             $jobQueueName = "taskTwoQueue";
  //             $jobData = ['ts'=>time(), 'bizId'=>uniqid(), 'data'=>$_GET];
  //             break;
  //         default:
  //             break;
  //     }
  //     $isPushed = Queue::push($jobHandleClassName, $jobData, $jobQueueName);
  //     if ($isPushed!==false) {
  //         echo date('Y-m-d H:i:s')."the $taskType of multiTask job has been pushed to $jobQueueName <br>";
  //     }else {
  //         throw new Exception("push a new $taskType of multiTask job Failed!");
  //     }
  // }
}
