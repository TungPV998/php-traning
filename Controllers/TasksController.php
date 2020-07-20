<?php
namespace AHT\Controllers;
use AHT\Models\TaskRepository;
use AHT\Core\Controller;
use AHT\Models\Task;
class TasksController extends Controller
{
    function index()
    {
        //require(ROOT . 'Models/Task.php');
        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }
    function formCreate()
    {
        $this->render("create");
    }
    function create()
    {
        if (isset($_POST["title"]))
        {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $created_at = date('Y-m-d H:i:s');
           $updated_at = date('Y-m-d H:i:s');
            $task = new Task();
            $task->setDescription($description);
            $task->setTitle($title);
            $task->setCreated_at($created_at);
            $task->setUpdated_at($updated_at);
            //var_dump($task);
           // var_dump(get_object_vars($task));
            //die();
            $taskRepository = new TaskRepository();

            if ($taskRepository->create($task))
            {
                //die('taskController');
                header("Location: /mvc01");
            }
        }

        $this->render("create");
    }
    function edit($id)
    {
        $tasks = new TaskRepository();

            if (isset($_POST["title"]))
            {
//                echo $id;
//                die();
                $getId = $id;
                $title = $_POST["title"];
                $description = $_POST["description"];
                $created_at = date('Y-m-d H:i:s');
                $updated_at = date('Y-m-d H:i:s');
                $task = new Task();
                $task->setDescription($description);
                $task->setId($getId);
                $task->setTitle($title);
                $task->setCreated_at($created_at);
                $task->setUpdated_at($updated_at);
               // die("here out");
                if ($tasks->update($getId, $task))
                {
                   // die("here if");
                    header("Location: /mvc01");
                }
            }
        $d['tasks'] = $tasks->showTask($id);
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if(isset($id)){
            $task = new Task();
            $task->setId($id);
            $taskRepository = new TaskRepository();
            if ($taskRepository->delete($id))
            {
                header("Location: /mvc01");
            }
        }
    }
}
?>