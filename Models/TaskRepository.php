<?php
namespace AHT\Models;

use AHT\Models\TaskResourceModel;

class TaskRepository
{

    private $taskResource;

    public function __construct()
    {
        $this->taskResource = new TaskResourceModel();
    }

    public function create($model)
    {

        $success = $this->taskResource->save($model);

        //var_dump($success);die();
        if($success){

            return true;

        }else{

            return false;

        }
    }

    public function showTask($id)
    {
        return $this->taskResource->edit($id);
    }

    public function showAllTasks()
    {
        return $this->taskResource->getAll();

    }


    public function update($id, $model)
    {
        $success = $this->taskResource->update($id,$model);

        //var_dump($success);
        //die();

        if($success){

            return true;

        }else{

            return false;

        }

    }
    public function delete($id)
    {
        $success = $this->taskResource->delete($id);

        if($success){

            return true;

        }else{

            return false;
        }

    }
}