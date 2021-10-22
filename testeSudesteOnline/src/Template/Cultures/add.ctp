<?php

use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Culturas</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'cultures', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($culture) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome</label>
        <?= $this->Form->control('name', ['class'=>'form-control', 'placeholder'=>'Nome do produto', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Tipo</label>
        <?= $this->Form->control('type', ['class'=>'form-control', 'placeholder'=>'Classe do produto', 'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn cor text-white']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
