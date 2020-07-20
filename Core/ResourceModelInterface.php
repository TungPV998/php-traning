<?php


namespace AHT\Core;


interface ResourceModelInterface
{

    public function _init($table,$id,$model);

    public function save($model);

    public function edit($id);

    public function update($id,$model);

    public function delete($id);


}