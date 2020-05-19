<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frequenta Controller
 *
 * @property \App\Model\Table\FrequentaTable $Frequenta
 * @method \App\Model\Entity\Frequentum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrequentaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $frequenta = $this->paginate($this->Frequenta);

        $this->set(compact('frequenta'));
    }

    /**
     * View method
     *
     * @param string|null $id Frequentum id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequentum = $this->Frequenta->get($id, [
            'contain' => [],
        ]);

        $this->set('frequentum', $frequentum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frequentum = $this->Frequenta->newEmptyEntity();
        if ($this->request->is('post')) {
            $frequentum = $this->Frequenta->patchEntity($frequentum, $this->request->getData());
            if ($this->Frequenta->save($frequentum)) {
                $this->Flash->success(__('The frequentum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequentum could not be saved. Please, try again.'));
        }
        $this->set(compact('frequentum'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequentum id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frequentum = $this->Frequenta->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequentum = $this->Frequenta->patchEntity($frequentum, $this->request->getData());
            if ($this->Frequenta->save($frequentum)) {
                $this->Flash->success(__('The frequentum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequentum could not be saved. Please, try again.'));
        }
        $this->set(compact('frequentum'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequentum id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frequentum = $this->Frequenta->get($id);
        if ($this->Frequenta->delete($frequentum)) {
            $this->Flash->success(__('The frequentum has been deleted.'));
        } else {
            $this->Flash->error(__('The frequentum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
