<?php

use PhpParser\Node\Stmt\Label;
use Cake\Routing\Router;

?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Pragas</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Pests', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Pests', 'action'=>'view', $pest->id],  ['class'=>'btn btn-outline-success btn-sm'] )?>
                <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$pest->id)
                ),
            'escape' => false), 
            false);
            ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn cor dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Listar'), ['controller' => 'Pests', 'action' => 'index', $pest->id], ['class'=>'dropdown-item']) ?>
                    <?= $this->Html->link(__('Visualizar'), ['controller'=>'Pests', 'action' => 'view', $pest->id], ['class'=>'dropdown-item']) ?>
                    <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$pest->id)
                    ),
                'escape' => false), 
                false);
                ?>
                </div>
            </div>
        </div>
</div>
<hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($pest) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome</label>
        <?= $this->Form->control('name', ['class'=>'form-control', 'placeholder'=>'Nome do produto', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome científico</label>
        <?= $this->Form->control('scientific_name', ['class'=>'form-control', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Grupo da praga</label>
        <?= $this->Form->select('pest_group',['ARTROPODES'=>'Artrópodes','VERTEBRADOS'=>'Vertebrados','ERVAS DANINHAS'=>'Ervas Daninhas', 'PATOGENOS'=>'Patógenos', 'NEMATODOS'=>'Nematódos'],['class'=>'form-control','empty' => true,'label'=>false]);?>
    </div>

</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn cor text-white']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
<?= $this->Element('modal-it')?>
