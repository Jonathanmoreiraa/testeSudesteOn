<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dosages Controller
 *
 * @property \App\Model\Table\DosagesTable $Dosages
 *
 * @method \App\Model\Entity\Dosage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DosagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Pests', 'Cultures'],
            'limit'=>10,
        ];
        $dosages = $this->paginate($this->Dosages);

        $this->set(compact('dosages'));
    }
    public function search(){
        $search = $this->request->getQuery('q');
        $this->paginate = [
            'contain' => ['Products', 'Pests', 'Cultures'],
            'limit'=>'10'
        ];
        $dosage = $this->paginate($this->Dosages->find()->where(function($exp, $query) use($search){
            return $exp->like('permitted_dosage','%'.$search.'%');
        }));
        $this->set('dosages', $dosage);
    }

    /**
     * View method
     *
     * @param string|null $id Dosage id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dosage = $this->Dosages->get($id, [
            'contain' => ['Products', 'Pests', 'Cultures'],
        ]);

        $this->set('dosage', $dosage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dosage = $this->Dosages->newEntity();
        if ($this->request->is('post')) {
            $dosage = $this->Dosages->patchEntity($dosage, $this->request->getData());
            if ($this->Dosages->save($dosage)) {
                $this->Flash->success(__('A dosagem foi cadastrada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao cadastrar dosagem. Por favor, tente outra vez'));
        }
        $products = $this->Dosages->Products->find('list', ['limit' => 200]);
        $pests = $this->Dosages->Pests->find('list', ['limit' => 200]);
        $cultures = $this->Dosages->Cultures->find('list', ['limit' => 200]);
        $this->set(compact('dosage', 'products', 'pests', 'cultures'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dosage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dosage = $this->Dosages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dosage = $this->Dosages->patchEntity($dosage, $this->request->getData());
            if ($this->Dosages->save($dosage)) {
                $this->Flash->success(__('A dosagem foi editada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar a dosagem. Por favor, tente outra vez'));
        }
        $products = $this->Dosages->Products->find('list', ['limit' => 200]);
        $pests = $this->Dosages->Pests->find('list', ['limit' => 200]);
        $cultures = $this->Dosages->Cultures->find('list', ['limit' => 200]);
        $this->set(compact('dosage', 'products', 'pests', 'cultures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dosage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dosage = $this->Dosages->get($id);
        if ($this->Dosages->delete($dosage)) {
            $this->Flash->success(__('A dosagem foi deletada com sucesso'));
        } else {
            $this->Flash->error(__('Erro ao deletar dosagem. Por favor, tente outra vez'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
