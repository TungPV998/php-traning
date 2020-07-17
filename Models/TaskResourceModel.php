<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 7/13/2020
 * Time: 3:40 PM
 */

namespace AHT\Models;


use AHT\Core\ResourceModel;
use AHT\Models\Task;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $task = new Task();
        parent::_init("tasks","id",$task);
    }
}