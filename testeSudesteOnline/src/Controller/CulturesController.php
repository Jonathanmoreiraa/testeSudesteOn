<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cultures Controller
 *
 * @property \App\Model\Table\CulturesTable $Cultures
 *
 * @method \App\Model\Entity\Culture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CulturesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cultures = $this->paginate($this->Cultures);

        $this->set(compact('cultures'));
    }

    /**
     * View method
     *
     * @param string|null $id Culture id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $culture = $this->Cultures->get($id, [
            'contain' => ['Dosages'],
        ]);

        $this->set('culture', $culture);
    }
    public function search(){
        $search = $this->request->getQuery('q');
        $this->paginate = [
            'limit'=>'10'
        ];
        $culture = $this->paginate($this->Cultures->find()->where(function($exp, $query) use($search){
            return $exp->like('name','%'.$search.'%');
        }));
        $this->set('cultures', $culture);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $culture = $this->Cultures->newEntity();
        if ($this->request->is('post')) {
            $culture = $this->Cultures->patchEntity($culture, $this->request->getData());
            if ($this->Cultures->save($culture)) {
                $this->Flash->success(__('A cultura foi cadastrada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao cadastrar a cultura. Por favor, tente outra vez'));
        }
        $this->set(compact('culture'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Culture id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $culture = $this->Cultures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $culture = $this->Cultures->patchEntity($culture, $this->request->getData());
            if ($this->Cultures->save($culture)) {
                $this->Flash->success(__('A cultura foi editada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar a cultura. Por favor, tente outra vez'));
        }
        $this->set(compact('culture'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Culture id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $culture = $this->Cultures->get($id);
        if ($this->Cultures->delete($culture)) {
            $this->Flash->success(__('A cultura foi deletada com sucesso'));
        } else {
            $this->Flash->error(__('Erro ao deletar a cultura. Por favor, tente outra vez'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
