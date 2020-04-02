<?php

namespace Msgpool\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
public $levels=['creator'=>'Létrehoztam','worker'=>'Dolgozom','viewer'=>'Figyelem','owner'=>'Tulajdonos'];
public $sources=['ticket'=>'ticket'];
public $sender_points=['change_ticket_queue'=>'Queue változás','change_ticket_state'=>'Ticket állapot változás','change_ticket_provlocation'=>'Szolgáltatási hely változás'];
public $types=['create'=>'Létrehozás','mod'=>'Változás','close'=>'Lezárás'];
public function beforeRender($event){
     		   //$this->viewBuilder()->layout('Admin/admin');  # 
				$levels=$this->levels;
				$sources=$this->sources;
				$sender_points=$this->sender_points;
				$types=$this->types;
				$this->set(compact('levels','sources','sender_points','types'));

    		}
}
