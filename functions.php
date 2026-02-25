<?php
    function view($view, $data = []){
        foreach($data as $key => $value){
            $$key = $value;
        }

        require "views/template/app.php";
    }

    function dd(...$dump){
        echo '<pre>';
        var_dump($dump);
        echo '</pre>';
        die();
    }

    function dump(...$dump){
        echo '<pre>';
        var_dump($dump);
        echo '</pre>';

    }

    function abort($code){
        http_response_code($code);
        view(404);
        die();
    }