<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 7/01/2018
 * Time: 6:49 AM
 */
namespace App\Controller\Adm;

use App\Controller\Adm\AppController;

class BooksController extends AppController
{
    public function index()
    {
        $action = $this->Crud->action(); // Gets the IndexAction object
        return $this->Crud->execute();
    }
}