<?php

namespace App\lib;

class View
{
    private $d;
    //** Funcion utilizada para renderiar las vistas **//
    public function render($name, $data = [])
    {
        $this->d = $data;
        require 'src/views/' . $name . '.php';
    }
}
