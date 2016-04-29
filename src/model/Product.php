<?php
/**
 * Created by PhpStorm.
 * User: conorsimpson
 * Date: 23/04/2016
 * Time: 17:40
 */

namespace Hdip\Model;

class Product extends \Mattsmithdev\PdoCrud\DatabaseTable
{
    // private properties with EXACTLY same names as DB table columns
    private $id;
    private $description;

    public function getDescription()
    {
        return $this->description;
    }
}