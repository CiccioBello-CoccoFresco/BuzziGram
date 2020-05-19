<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Classe Controller
 *
 * @property \App\Model\Table\ClasseTable $Classe
 * @method \App\Model\Entity\Classe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClasseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $classe = $this->paginate($this->Classe);

        $this->set(compact('classe'));
    }

    /**
     * View method
     *
     * @param string|null $id Classe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classe = $this->Classe->get($id, [
            'contain' => [],
        ]);

        $this->set('classe', $classe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classe = $this->Classe->newEmptyEntity();
        if ($this->request->is('post')) {
            $classe = $this->Classe->patchEntity($classe, $this->request->getData());
            if ($this->Classe->save($classe)) {
                $this->Flash->success(__('The classe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classe could not be saved. Please, try again.'));
        }
        $this->set(compact('classe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classe = $this->Classe->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classe = $this->Classe->patchEntity($classe, $this->request->getData());
            if ($this->Classe->save($classe)) {
                $this->Flash->success(__('The classe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classe could not be saved. Please, try again.'));
        }
        $this->set(compact('classe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classe = $this->Classe->get($id);
        if ($this->Classe->delete($classe)) {
            $this->Flash->success(__('The classe has been deleted.'));
        } else {
            $this->Flash->error(__('The classe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
