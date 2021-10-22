<?php
use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Dosagens</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'dosages', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($dosage) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Defensivos Agrícola</label>
        <?= $this->Form->control('product_id', ['class'=>'form-control', 'label' => false, 'options' => $products, 'empty' => true]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Praga</label>
        <?= $this->Form->control('pest_id', ['class'=>'form-control', 'label' => false, 'options' => $pests, 'empty' => true]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Cultura</label>
        <?= $this->Form->control('culture_id', ['class'=>'form-control', 'label' => false, 'options' => $cultures, 'empty' => true]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Dosagem permitida</label>
        <?= $this->Form->control('permitted_dosage', ['class'=>'form-control', 'placeholder'=>'Exemplo: 300L a 400L', 'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn cor text-white']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
