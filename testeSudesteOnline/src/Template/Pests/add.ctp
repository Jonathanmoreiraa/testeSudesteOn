<?php

use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Pragas</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'Pests', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
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
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn cor text-white']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
