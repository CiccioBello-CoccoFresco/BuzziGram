<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Studente Controller
 *
 * @property \App\Model\Table\StudenteTable $Studente
 * @method \App\Model\Entity\Studente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudenteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $studente = $this->paginate($this->Studente);

        $this->set(compact('studente'));
    }

    /**
     * View method
     *
     * @param string|null $id Studente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studente = $this->Studente->get($id, [
            'contain' => [],
        ]);

        $this->set('studente', $studente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studente = $this->Studente->newEmptyEntity();
        if ($this->request->is('post')) {
            $studente = $this->Studente->patchEntity($studente, $this->request->getData());
            if ($this->Studente->save($studente)) {
                $this->Flash->success(__('The studente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The studente could not be saved. Please, try again.'));
        }
        $this->set(compact('studente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Studente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studente = $this->Studente->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studente = $this->Studente->patchEntity($studente, $this->request->getData());
            if ($this->Studente->save($studente)) {
                $this->Flash->success(__('The studente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The studente could not be saved. Please, try again.'));
        }
        $this->set(compact('studente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Studente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studente = $this->Studente->get($id);
        if ($this->Studente->delete($studente)) {
            $this->Flash->success(__('The studente has been deleted.'));
        } else {
            $this->Flash->error(__('The studente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
