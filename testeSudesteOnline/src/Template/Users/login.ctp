<?=  $this->Html->image('logo.png', ['class'=>'mb-4', 'alt'=>'Buzz', 'width'=>'120', 'height'=>'120']) ?>
<div class="form-signin">
    <?= $this->Form->create('post') ?>
    <div class="text-center mb-4">
        <?php 
            echo $this->Form->control('username', ['class'=>'form-control', 'placeholder'=>'Nome de usuário', 'label'=>false]);
            echo $this->Form->control('password',['class'=>'form-control pass', 'placeholder'=>'Senha','label'=>false]); 
        ?>
    </div>
    <?= $this->Form->button(__('Login'), ['class'=>'btn btn-lg btn-warning btn-block text-white']); ?>
    <?= $this->Form->end() ?>
</div>
