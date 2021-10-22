<nav class="sidebar menu-cor">
    
    <div class="logo">
        <h3><?= $this->Html->image('logo.png', [
            'alt' => "Logo",
            'url' => ['controller' => 'Welcome', 'action' => 'index'],
            'class'=>'img-logo'
            ]); ?>
        </h3>
    </div>
    <ul class="list-unstyled">
        <li><?= $this->Html->link('<i class="fas fa-tachometer-alt"></i><n class="icon"> Dashboard</n>',
        [
            'controller'=>'welcome',
            'action' => 'index'
        ],
        [
            'escape'=>false,
        ]
        );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-apple-alt"></i><n class="icon"> Culturas</n>',
        [
            'controller'=>'Cultures',
            'action' => 'index'
        ],
        [
            'escape'=>false,
        ]
        );?>
        <li><?= $this->Html->link('<i class="fas fa-flask"></i><n class="icon"> Dosagens</n>',
        [
            'controller'=>'Dosages',
            'action' => 'index'
        ],
        [
            'escape'=>false,
        ]
        );?>
        
        <li><?= $this->Html->link('<i class="fas fa-bug"></i><n class="icon"> Pragas</n>',
        [
            'controller'=>'Pests',
            'action' => 'index'
        ],
        [
            'escape'=>false,
        ]
        );?>
        <li><?= $this->Html->link('<i class="fas fa-seedling"></i><n class="icon"> Produtos</n>',
        [
            'controller'=>'Products',
            'action' => 'index'
        ],
        [
            'escape'=>false,
        ]
        );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-users"></i> <n class="icon">Usuários</n>',
        [
            'controller'=>'users',
            'action' => 'index'
        ],
        [
            'escape'=>false,
        ]
        );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-sign-in-alt"></i> <n class="icon">Sair</n>',
            [
                'controller'=>'users',
                'action' => 'logout'
            ],
            [
                'escape'=>false,
            ]
            );?>
        </li>
        
    </ul>
</nav>
