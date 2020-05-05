<?php

namespace Msgpool\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public $levels = ['creator' => 'Létrehoztam', 'worker' => 'Dolgozom', 'viewer' => 'Figyelem', 'owner' => 'Tulajdonos'];
    public $sources = ['%' => 'Mind', 'ticket' => 'ticket'];
    public $sender_points = ['%' => 'Mind', 'change_ticket_queue' => 'Queue változás', 'change_ticket_state' => 'Ticket állapot változás', 'change_ticket_provlocation' => 'Szolgáltatási hely változás'];
    public $types = ['%' => 'Mind', 'create' => 'Létrehozás', 'mod' => 'Változás', 'close' => 'Lezárás'];

    /**
     * Before render
     */
    public function beforeRender($event)
    {
                $levels = $this->levels;
                $sources = $this->sources;
                $sender_points = $this->sender_points;
                $types = $this->types;
                $this->set(compact('levels', 'sources', 'sender_points', 'types'));
                //$this->viewBuilder()->layoutPath(APP . DS. 'Layout/Admin');
                //$this->viewBuilder()->layout('admin');
                //debug($this->viewBuilder());
    }
}
