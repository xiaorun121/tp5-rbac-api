<?php
namespace app\index\job;


use think\queue\Job;

class MultiTask {
    public function taskOne(Job $job, $data) {
        $isDone = $this->doTaskOne($data);
        if ($isDone) {
            $job->delete();
            print ("INFO:the taskOne of multiTask has been done and delete!\n");
            return;
        }else {
            if ($job->attempts()>3) {
                $job->delete();
            }
        }
    }
    public function taskTwo(Job $job, $data) {
        $isDone = $this->doTaskTwo($data);
        if ($isDone) {
            $job->delete();
            print ("INFO:the taskTwo of multiTask has been done and delete! \n");
        }else {
            if ($job->attempts()>3) {
                $job->delete();
            }
        }
    }

    private function doTaskOne($data) {
        $id = db('test')->insert(['task_type'=>'task one','data'=>json_encode($data)]);
        print ("INFO: doing taskOne of multiTask! the db return id is :$id\n");
        return true;
    }

    private function doTaskTwo($data) {
        $id = db('test')->insertGetId(['task_type'=>'task two','data'=>json_encode($data)]);
        print ("INFO: doing taskTwo of multiTask! the db return id is :$id\n");
        return true;
    }
}
