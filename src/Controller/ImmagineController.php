<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Immagine Controller
 *
 * @property \App\Model\Table\ImmagineTable $Immagine
 * @method \App\Model\Entity\Immagine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImmagineController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $immagine = $this->paginate($this->Immagine);

        $this->set(compact('immagine'));
    }

    /**
     * View method
     *
     * @param string|null $id Immagine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $immagine = $this->Immagine->get($id, [
            'contain' => [],
        ]);

        $this->set('immagine', $immagine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $immagine = $this->Immagine->newEmptyEntity();
        if ($this->request->is('post')) {
            $immagine = $this->Immagine->patchEntity($immagine, $this->request->getData());
            if ($this->Immagine->save($immagine)) {
                $this->Flash->success(__('The immagine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The immagine could not be saved. Please, try again.'));
        }
        $this->set(compact('immagine'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Immagine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $immagine = $this->Immagine->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $immagine = $this->Immagine->patchEntity($immagine, $this->request->getData());
            if ($this->Immagine->save($immagine)) {
                $this->Flash->success(__('The immagine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The immagine could not be saved. Please, try again.'));
        }
        $this->set(compact('immagine'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Immagine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $immagine = $this->Immagine->get($id);
        if ($this->Immagine->delete($immagine)) {
            $this->Flash->success(__('The immagine has been deleted.'));
        } else {
            $this->Flash->error(__('The immagine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
