<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BuildsItems Controller
 *
 * @property \App\Model\Table\BuildsItemsTable $BuildsItems
 * @method \App\Model\Entity\BuildsItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildsItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Builds', 'Items'],
        ];
        $buildsItems = $this->paginate($this->BuildsItems);

        $this->set(compact('buildsItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Builds Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $buildsItem = $this->BuildsItems->get($id, [
            'contain' => ['Builds', 'Items'],
        ]);

        $this->set(compact('buildsItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $buildsItem = $this->BuildsItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $buildsItem = $this->BuildsItems->patchEntity($buildsItem, $this->request->getData());
            if ($this->BuildsItems->save($buildsItem)) {
                $this->Flash->success(__('The builds item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The builds item could not be saved. Please, try again.'));
        }
        $builds = $this->BuildsItems->Builds->find('list', ['limit' => 200]);
        $items = $this->BuildsItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('buildsItem', 'builds', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Builds Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $buildsItem = $this->BuildsItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildsItem = $this->BuildsItems->patchEntity($buildsItem, $this->request->getData());
            if ($this->BuildsItems->save($buildsItem)) {
                $this->Flash->success(__('The builds item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The builds item could not be saved. Please, try again.'));
        }
        $builds = $this->BuildsItems->Builds->find('list', ['limit' => 200]);
        $items = $this->BuildsItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('buildsItem', 'builds', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Builds Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buildsItem = $this->BuildsItems->get($id);
        if ($this->BuildsItems->delete($buildsItem)) {
            $this->Flash->success(__('The builds item has been deleted.'));
        } else {
            $this->Flash->error(__('The builds item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
