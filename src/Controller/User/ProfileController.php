<?php
declare(strict_types=1);

namespace App\Controller\User;

use App\Controller\AppController;

/**
 * Profile Controller
 *
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileController extends AppController
{
    public function initialize(): void {
        parent::initialize();
        $this->loadModel('Users');
    }
    /**
     * 
     * @param \Cake\Event\EventInterface $event
     * @property \Authentication\Controller\Component\AuthenticationComponent 
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated([]);
    }
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $user = $this->Users->get($session->read('Auth.id'));
        $this->set('user', $user);
    }
}
