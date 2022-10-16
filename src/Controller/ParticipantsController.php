<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

/**
 * Participants Controller
 *
 * @property \App\Model\Table\ParticipantsTable $Participants
 * @method \App\Model\Entity\Participant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParticipantsController extends AppController
{
    // in src/Controller/UsersController.php

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events'],
        ];
        $participants = $this->paginate($this->Participants);

        $this->set(compact('participants'));
    }

    /**
     * View method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => ['Events'],
        ]);

        $this->set(compact('participant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($event_id = null)
    {
        $participant = $this->Participants->newEmptyEntity();
        if ($this->request->is('post')) {
            $participant = $this->Participants->patchEntity($participant, $this->request->getData());
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('Il partecipante è stato aggiunto.'));

                //recupero i dati dell'evento
                $this->loadModel('Events');
                $event = $this->Events->get($event_id, ['contain' => [
                        'Participants' => ['sort' => ['Participants.created' => 'DESC']],
                        'EventContacts',
                ]]);

                $this->sendMailToContacts($participant, $event);
                //$this->sendMailToparticipant($participant, $event);

                if ($this->request->getData('from_event')) {
                    return $this->redirect(['controller' => 'events', 'action' => 'view', $event->id]);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('Il partecipante non può essere aggiunto. Riprova più tardi.'));
        }

        $event = null;
        if (!is_null($event_id)) {
            $event = $this->Participants->Events->get($event_id);
        }

        $events = $this->Participants->Events->find('list', ['limit' => 200])->all();
        $this->set(compact('participant', 'events', 'event_id', 'event'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participant = $this->Participants->patchEntity($participant, $this->request->getData());
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('Il partecipante è stato aggiornato.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Il partecipante non può essere aggiornato. Riprova più tardi.'));
        }
        $events = $this->Participants->Events->find('list', ['limit' => 200])->all();
        $this->set(compact('participant', 'events'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participant = $this->Participants->get($id);
        if ($this->Participants->delete($participant)) {
            $this->Flash->success(__('Il partecipante è stato cancellato.'));
        } else {
            $this->Flash->error(__('Il partecipante non può essere cancellato. Riprova più tardi.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function sendMailToContacts($participant, $event)
    {
        //Costruisco il contenuto del messaggio per le persone di contatto
        /*
        $messageBody = 'La persona ' .
                $participant->name . ' ' .
                $participant->surname . ' <' .
                $participant->email . '> si è registrata all\'evento.';
        $messageBody .= "\r\n\r\n";
        $messageBody .= "Elenco dei partecipanti\r\n\r\n";
        foreach ($event['participants'] as $participant) {
            $messageBody .= $participant->created . ' ' . $participant->name . ' ' . $participant->surname . ' <' . $participant->email . ">\r\n";
        }

        //dd($messageBody);
         *
         */

        //Invio email al proprietario dell'evento
        $mailer = new Mailer('default');
        $mailer->setFrom(['gmarzati@unina.it' => 'Partecipazione Evento'])
                ->setTo('info@giumar.net')
                ->setSubject('Nuova partecipazione all\'evento: ' . $event->name)
                ->setEmailFormat('html')
                ->viewBuilder()
                ->setTemplate('partecipazione')
                ->setLayout('partecipazione');

        foreach ($event['event_contacts'] as $event_contact) {
            //$mailer->addTo($event_contact['email']);
        }
        $mailer->setViewVars(['participant' => $participant, 'event' => $event]);
        $mailer->deliver();
    }

    private function sendMailToParticipant($participant, $event)
    {
        $mailerPartecipante = new Mailer('default');
        $mailerPartecipante->setFrom(['gmarzati@unina.it' => 'Partecipazione Evento'])
                ->setTo($participant->email)
                ->setBcc('gmarzati@unina.it')
                ->setSubject('Nuova partecipazione all evento: ' . $event->name);

        $messageBodyPartecipante = "La sua richiesta di partecipazione all\'evento è stata accettata.\r\n";
        $messageBodyPartecipante .= 'Opzioni scelte: ' . h($participant->options);
        $messageBodyPartecipante .= "\r\n\r\n";
        $messageBodyPartecipante .= 'Note: ' . h($participant->notes);
        $mailerPartecipante->deliver($messageBodyPartecipante);
    }
}
