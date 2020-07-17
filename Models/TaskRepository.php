<?php
namespace AHT\Models;

use AHT\Models\TaskResourceModel;

class TaskRepository
{
    private $model;


    public function create($model)
    {

        $taskResource = new TaskResourceModel();

        $success = $taskResource->save($model);
        var_dump($success);die();
        if($success){
            //die("ok taskrespon");
            return true;
        }else{
            //die("not taskrespon");
            return false;
        }
    }

    public function showTask($id)
    {
        $taskResource = new TaskResourceModel();
//        var_dump($taskResource->edit($id));
////        die();
        return $taskResource->edit($id);
    }

    public function showAllTasks()
    {

        $taskResource = new TaskResourceModel();

        return $taskResource->getAll();

    }


    public function update($model)
    {


    }
    public function delete($id)
    {
        $taskResource = new TaskResourceModel();

        $success = $taskResource->delete($id);

        if($success){

            return true;
        }else{

            return false;
        }


    }
}