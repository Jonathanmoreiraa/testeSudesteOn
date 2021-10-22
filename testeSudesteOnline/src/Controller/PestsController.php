<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pests Controller
 *
 * @property \App\Model\Table\PestsTable $Pests
 *
 * @method \App\Model\Entity\Pest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate=[
            'limit'=> 10
        ];
        $pests = $this->paginate($this->Pests);

        $this->set(compact('pests'));
    }
    public function search(){
        $search = $this->request->getQuery('q');
        $this->paginate = [
            'limit'=>'10'
        ];
        $pest = $this->paginate($this->Pests->find()->where(function($exp, $query) use($search){
            return $exp->like('name','%'.$search.'%');
        }));
        $this->set('pests', $pest);
    }

    /**
     * View method
     *
     * @param string|null $id Pest id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pest = $this->Pests->get($id, [
            'contain' => ['Dosages'],
        ]);

        $this->set('pest', $pest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pest = $this->Pests->newEntity();
        if ($this->request->is('post')) {
            $pest = $this->Pests->patchEntity($pest, $this->request->getData());
            if ($this->Pests->save($pest)) {
                $this->Flash->success(__('A praga foi cadastrada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao cadastrar. Por favor, tente outra vez'));
        }
        $this->set(compact('pest'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pest id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pest = $this->Pests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pest = $this->Pests->patchEntity($pest, $this->request->getData());
            if ($this->Pests->save($pest)) {
                $this->Flash->success(__('A praga editada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar. Por favor, tente outra vez'));
        }
        $this->set(compact('pest'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pest = $this->Pests->get($id);
        if ($this->Pests->delete($pest)) {
            $this->Flash->success(__('A praga foi deletada com sucesso'));
        } else {
            $this->Flash->error(__('Erro ao deletar a praga. Por favor, tenta outra vez'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
