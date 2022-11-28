<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EventContacts Controller
 *
 * @property \App\Model\Table\EventContactsTable $EventContacts
 * @method \App\Model\Entity\EventContact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventContactsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Users'],
        ];
        $eventContacts = $this->paginate($this->EventContacts);

        $this->set(compact('eventContacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Event Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventContact = $this->EventContacts->get($id, [
            'contain' => ['Events', 'Users'],
        ]);

        $this->set(compact('eventContact'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventContact = $this->EventContacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $eventContact = $this->EventContacts->patchEntity($eventContact, $this->request->getData());
            if ($this->EventContacts->save($eventContact)) {
                $this->Flash->success(__('The event contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event contact could not be saved. Please, try again.'));
        }
        $events = $this->EventContacts->Events->find('list', ['limit' => 200])->all();
        $users = $this->EventContacts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('eventContact', 'events', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventContact = $this->EventContacts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventContact = $this->EventContacts->patchEntity($eventContact, $this->request->getData());
            if ($this->EventContacts->save($eventContact)) {
                $this->Flash->success(__('The event contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event contact could not be saved. Please, try again.'));
        }
        $events = $this->EventContacts->Events->find('list', ['limit' => 200])->all();
        $users = $this->EventContacts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('eventContact', 'events', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Contact id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventContact = $this->EventContacts->get($id);
        if ($this->EventContacts->delete($eventContact)) {
            $this->Flash->success(__('The event contact has been deleted.'));
        } else {
            $this->Flash->error(__('The event contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
