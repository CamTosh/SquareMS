<?php

namespace Controller;

class Home extends \Controller
{

    public function index()
    {
        $f3 = \Base::instance();
        $f3->set('body_classes', 'home');
        $this->_render('home/index.html');
    }

}