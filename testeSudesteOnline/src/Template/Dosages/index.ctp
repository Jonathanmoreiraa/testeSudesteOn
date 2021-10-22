<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $dosages
 */
?>
<?php use Cake\Routing\Router;?>
<div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="display-4 titulo">Listar Dosagem Recomendada</h2>
        </div>
    <a href="cadastrar.html">
        <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'dosages', 'action'=>'add'], ['class'=>'btn btn-outline-info btn-sm'])?>
        </div>
    </a>
</div>
<?= $this->Flash->render()?> <!--Mostra a imagem de alerta-->
<div class="busca">
    <form action="<?php echo $this->Url->build(['action'=>'search']) ?>" method="get">
        <div class="input-group">
            <input type="search" name="q" class="form-control" />
            <div class="input-group-prepend">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th class="d-none d-lg-table-cell">Produto</th>
                <th class="d-none d-lg-table-cell">Praga</th><!--oculta o e-mail quando está na tela xs-->
                <th class="d-none d-lg-table-cell">Cultura</th>
                <th>Dosagem</th>
                <th class="d-none d-sm-table-cell">Data do Cadastro</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dosages as $dosage): ?>
            <tr>
                <td><?= $this->Number->format($dosage->id) ?></td>
                <td class="d-none d-lg-table-cell"><?= $dosage->has('product') ? $this->Html->link($dosage->product->name, ['controller' => 'Products', 'action' => 'view', $dosage->product->id]) : '' ?></td>
                <td class="d-none d-lg-table-cell"><?= $dosage->has('pest') ? $this->Html->link($dosage->pest->name, ['controller' => 'Pests', 'action' => 'view', $dosage->pest->id]) : '' ?></td>
                <td class="d-none d-lg-table-cell"><?= $dosage->has('culture') ? $this->Html->link($dosage->culture->name, ['controller' => 'Cultures', 'action' => 'view', $dosage->culture->id]) : '' ?></td>
                <td><?= h($dosage->permitted_dosage) ?></td>
                <td class="d-none d-sm-table-cell"><?= h($dosage->created) ?></td>
                <td class="text-center">
                    <span class="d-none d-md-block">
                        <?= $this->Html->link(__('Visualizar'), ['controller' => 'dosages', 'action' => 'view', $dosage->id], ['class'=>'btn btn-outline-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['controller'=>'dosages', 'action' => 'edit', $dosage->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
                        <?php 
                            echo $this->Html->link(
                                $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                            '#', 
                            array(
                                'class'=>'btn-confirm', //tirar um dos dois
                                'data-toggle'=> 'modal',
                                'data-target' => '#apagarRegistro',
                                'data-action'=> Router::url(
                            array('action'=>'delete',$dosage->id)
                            ),
                        'escape' => false), 
                        false);
                        ?>                    
                    </span>
                    <div class="dropdown d-block d-md-none">
                        <button class="btn cor dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ações
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'dosages', 'action' => 'view', $dosage->id], ['class'=>'dropdown-item']) ?>
                            <?= $this->Html->link(__('Editar'), ['controller'=>'dosages', 'action' => 'edit', $dosage->id], ['class'=>'dropdown-item']) ?>
                            <?php 
                                echo $this->Html->link(
                                    $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                                '#', 
                                array(
                                    'class'=>'btn-confirm', //tirar um dos dois
                                    'data-toggle'=> 'modal',
                                    'data-target' => '#apagarRegistro',
                                    'data-action'=> Router::url(
                                array('action'=>'delete',$dosage->id)
                                ),
                            'escape' => false), 
                            false);
                            ?>                       
                        </div>
                    </div>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('pagination');//cita o doc pagination que está na past element?>
</div>
<?= $this->Element('modal-it')?>
