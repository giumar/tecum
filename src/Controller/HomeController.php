<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller
 *
 * @property \App\Model\Table\Event $Events L'oggettto tabella Events
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Events');
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
    }
}
