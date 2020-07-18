<?php
namespace AHT\Core;

    class Controller
    {
        var $vars = [];
        var $layout = "default";

        function set($d)
        {
            $this->vars = array_merge($this->vars, $d);
//            var_dump( $this->vars);
//            die();
        }

        function render($filename)
        {
            extract($this->vars);
//            var_dump(get_class($this));
//            die();
            ob_start();
            $link = ucfirst(str_replace("AHT\Controllers"," ",get_class($this)));
            require(ROOT . "Views" .ucfirst(str_replace('Controller', '', $link)) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();
           //var_dump($content_for_layout);die();
            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
        }
//            die();\TaskController
//            $tmp = str_split($link,1);
//            foreach ( $tmp as $i ){
//                if($i == "\\"){
//                    unset($i);
//                }
//                else{
//                    $arr[] = $i;
//                }
//            }
//            $link = implode("",$arr);
    //die($link);
        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

    }
?>