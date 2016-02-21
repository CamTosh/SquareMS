<?php

class Controller
{

    /*
     * The base file
     */
    private $_base = 'layouts/base.html';

    /*
     * Update the base file
     */
    public function _base($newBase)
    {
        $this->_base = $newBase;
    }

    /*
     * Render a file with the base
     */
    public function _render($file)
    {
        Base::instance()->set('target', $file);
        echo Template::instance()->render($this->_base);
    }

}