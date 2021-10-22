<?php

use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Usuários</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'users', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($user) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome</label>
        <?= $this->Form->control('name', ['class'=>'form-control', 'placeholder'=>'Nome Completo', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>E-mail</label>
        <?= $this->Form->control('email', ['class'=>'form-control', 'placeholder'=>'Endereço de e-mail', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Nome de usuário</label>
        <?= $this->Form->control('username', ['class'=>'form-control', 'placeholder'=>'Nome de usuário', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Senha</label>
        <?= $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Senha de no mínimo 6 dígitos', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Confirme sua senha</label>
        <?= $this->Form->control('password_confirm', ['class'=>'form-control', 'type'=>'password' ,'placeholder'=>'Confirme a nova senha', 'label'=>false]) ?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn cor text-white']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
