<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 7/13/2020
 * Time: 3:29 PM
 */

namespace AHT\Core;
use AHT\Config\Database;
use AHT\Core\ResourceModelInterface;
use PDO;


class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

        public function _init($table, $id, $model)
        {
            $this->table = $table;

            $this->id = $id;

            $this->model = $model;

        }
        public function save($model)
        {
            $model = (array)$model;
            $arrKey = array();
            $arrValue = array();
            foreach ($model as $key => $item ){
                array_push($arrKey,$key);
                array_push($arrValue,$item);
            }
            $arrKeys = str_replace("AHT\Models\Task","",$arrKey);
            //array_shift($arrKeys);
            $columns = implode(", ",$arrKeys);
           // array_shift($arrValue);
            $arrValue[0]='null';
//            var_dump($arrValue);
//            die();
           $sql = "INSERT INTO $this->table($columns) VALUES ('" . implode("','",$arrValue) . "')";
           var_dump($sql);
//            die();
            $req = Database::getBdd()->prepare($sql);
            var_dump($req->execute());
         //   die();
            return $req->execute();


        }
        public function edit($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->id = $id ";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch();

        }
        public function update($id,$model)
        {
            // TODO: Implement update() method.
        }
        public function delete($id)
        {
            $sql = "DELETE FROM $this->table WHERE $this->id = $id";
//            var_dump($sql);
//            die();
            $req = Database::getBdd()->prepare($sql);
           return $req->execute();



        }
        public function getAll(){
            $sql = "SELECT * FROM $this->table ";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        }
//    public function showTask($id){
//
//    }

}