<?php
namespace App\Controller\Adm;

class AppController extends \Cake\Controller\Controller
{
    use \Crud\Controller\ControllerTrait;

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete',
                'Crud.Lookup',
            ],
            'listeners' => [
                // New listeners that need to be added:
                'CrudView.View',
                'Crud.Redirect',
                'Crud.RelatedModels',
                // If you need searching. Generally it's better to load these
                // only in the controller for which you need searching.
                //'Crud.Search',
                //'CrudView.ViewSearch',
            ]
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(\Cake\Event\Event $event)
    {
        // For CakePHP 3.1+
        if ($this->viewBuilder()->className() === null) {
            $this->viewBuilder()->className('CrudView\View\CrudView');
        }

        // For CakePHP 3.0
        /*
        if ($this->viewClass === null) {
            $this->viewClass = 'CrudView\View\CrudView';
        }
        */
    }
}