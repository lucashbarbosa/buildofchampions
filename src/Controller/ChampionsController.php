<?php
declare(strict_types=1);


namespace App\Controller;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;

error_reporting(0);
/*
 * Champions Controller
 *
 * @property \App\Model\Table\ChampionsTable $Champions
 * @method \App\Model\Entity\Champion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChampionsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

//        $this->Security->setConfig('unlockedActions', ['addBuild']);
    }

    public function addBuild($id)
    {
        $this->disableAutoRender();

        $conn = ConnectionManager::get("default");
        $build = $this->request->getData('build');
        $query = "INSERT INTO champion_builds (champion_id, build_id)
                  VALUES ($id, $build);";



        $conn->execute($query);

        $this->redirect("/champions/view/$id");

    }


    public function search(string $name)
    {

        $this->disableAutoRender();
        $searchResult = $this->Champions->find()
            ->where('Champions.name LIKE "%' . $name . '%"');


        echo $this->jsonResponse($searchResult->toList(), 200);

    }


    public function full($id){
        $this->disableAutoRender();
        $conn = ConnectionManager::get("default");

        $champion = $conn->execute("SELECT * FROM champions WHERE id = $id")->fetch("assoc");

        $response["champion"] = $champion;

        $builds = $conn->execute("SELECT cb.*, b.name, b.id as build_column_id FROM champion_builds cb
                   INNER JOIN builds b
                   ON cb.build_id = b.id
                   WHERE champion_id = $id")->fetchAll("assoc");

        foreach($builds as $key => $build){
            $listBuild = new \ArrayObject();
            $b[$key] = $build;

            $items = $conn->execute("SELECT i.* FROM builds_items bi
                INNER JOIN items i
                ON i.id = bi.item_id
                WHERE bi.build_id = " .$build['build_id'])->fetchAll("assoc");
            $b[$key]['items'] = $items;
        }
        $response['champion']['builds'] = $b;

        echo $this->jsonResponse($response, 200);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $champions = $this->paginate($this->Champions);


        $this->set(compact('champions'));

//
    }

    /**
     * View method
     *
     * @param string|null $id Champion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $champion = $this->Champions->get($id, [
            'contain' => [],
        ]);

        $conn = ConnectionManager::get("default");
        $champion_builds = $conn->execute(
            "SELECT cb.*, b.name FROM champion_builds cb
                   INNER JOIN builds b
                   ON cb.build_id = b.id
                   WHERE champion_id = $id")
                                ->fetchAll("assoc");

        $builds = $this->getTableLocator()->get('Builds')->find();


        $this->set(compact('champion', 'builds', 'champion_builds'));
    }

    public function removeBuild($buildId, $redirect){



        $conn = ConnectionManager::get("default");
        $conn->execute("DELETE FROM champion_builds WHERE id = $buildId");

        $this->redirect("/champions/view/$redirect");

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $champion = $this->Champions->newEmptyEntity();
        if ($this->request->is('post')) {
            $champion = $this->Champions->patchEntity($champion, $this->request->getData());
            if ($this->Champions->save($champion)) {
                $this->Flash->success(__('The champion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The champion could not be saved. Please, try again.'));
        }
        $this->set(compact('champion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Champion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $champion = $this->Champions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $champion = $this->Champions->patchEntity($champion, $this->request->getData());
            if ($this->Champions->save($champion)) {
                $this->Flash->success(__('The champion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The champion could not be saved. Please, try again.'));
        }
        $this->set(compact('champion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Champion id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $champion = $this->Champions->get($id);
        if ($this->Champions->delete($champion)) {
            $this->Flash->success(__('The champion has been deleted.'));
        } else {
            $this->Flash->error(__('The champion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
