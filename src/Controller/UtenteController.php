<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Utente Controller
 *
 * @property \App\Model\Table\UtenteTable $Utente
 * @method \App\Model\Entity\Utente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UtenteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $utente = $this->paginate($this->Utente);

        $this->set(compact('utente'));
    }

    /**
     * View method
     *
     * @param string|null $id Utente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utente = $this->Utente->get($id, [
            'contain' => [],
        ]);

        $this->set('utente', $utente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $utente = $this->Utente->newEmptyEntity();
        if ($this->request->is('post')) {
            $utente = $this->Utente->patchEntity($utente, $this->request->getData());
            if ($this->Utente->save($utente)) {
                $this->Flash->success(__('The utente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utente could not be saved. Please, try again.'));
        }
        $this->set(compact('utente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Utente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $utente = $this->Utente->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utente = $this->Utente->patchEntity($utente, $this->request->getData());
            if ($this->Utente->save($utente)) {
                $this->Flash->success(__('The utente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utente could not be saved. Please, try again.'));
        }
        $this->set(compact('utente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Utente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utente = $this->Utente->get($id);
        if ($this->Utente->delete($utente)) {
            $this->Flash->success(__('The utente has been deleted.'));
        } else {
            $this->Flash->error(__('The utente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
