<nav class="navbar navbar-expand navbar-dark cor p-0">
          <!--Ícone para ocultar a barra lateral-->
            <a class="sidebar-toggle text-light mr-3 ml-2">
                <span class="navbar-toggler-icon"></span>
            </a>
            <a class="navbar-brand" href="#">Sudeste Online</a>

            <div class="collapse navbar-collapse">

                <ul class="navbar-nav ml-auto">
                    <!--Barra da direita com o user-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            
                            <span class="d-none d-sm-inline"><?= current(str_word_count($perfilUser->name, 2))//busca a variável e imprime o campo específico ?></span><!--usado para tirar o usuário quando a tela estiver pequena-->
                            </a>
                        <!--Barrinha acessada ao clicar no nome do usuário-->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <?= $this->Html->link('<i class="fas fa-sign-out-alt"></i> Sair', [
                                'controller'=>'Users',
                                'action'=>'logout'
                            ],
                            [
                                'class'=>'dropdown-item',
                                'escape'=> false //ignora o html
                            ])
                            ?>
                        </div>
                    </li>
                </ul>                
            </div>
</nav>
