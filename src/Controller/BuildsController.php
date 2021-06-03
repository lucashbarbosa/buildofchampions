<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Builds Controller
 *
 * @property \App\Model\Table\BuildsTable $Builds
 * @method \App\Model\Entity\Build[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $builds = $this->paginate($this->Builds);

        $this->set(compact('builds'));
    }

    /**
     * View method
     *
     * @param string|null $id Build id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $build = $this->Builds->get($id, [
            'contain' => ['Items', 'ChampionBuilds'],
        ]);

        $this->set(compact('build'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $build = $this->Builds->newEmptyEntity();
        if ($this->request->is('post')) {
            $build = $this->Builds->patchEntity($build, $this->request->getData());
            if ($this->Builds->save($build)) {
                $this->Flash->success(__('The build has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The build could not be saved. Please, try again.'));
        }
        $items = $this->Builds->Items->find('list', ['limit' => 200]);
        $this->set(compact('build', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Build id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $build = $this->Builds->get($id, [
            'contain' => ['Items'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $build = $this->Builds->patchEntity($build, $this->request->getData());
            if ($this->Builds->save($build)) {
                $this->Flash->success(__('The build has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The build could not be saved. Please, try again.'));
        }
        $items = $this->Builds->Items->find('list', ['limit' => 200]);
        $this->set(compact('build', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Build id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $build = $this->Builds->get($id);
        if ($this->Builds->delete($build)) {
            $this->Flash->success(__('The build has been deleted.'));
        } else {
            $this->Flash->error(__('The build could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
