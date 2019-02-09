<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b>
                            <!-- Light Logo icon -->
                            <?php echo $this->Html->image('/assets/images/logo-icon.png', array('alt'=>'Home', 'class'=>'light-logo')); ?>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                        <!-- Light Logo text -->    
                         <?php echo $this->Html->image('/assets/images/logo-facilita.png', array('class'=>'light-logo', 'alt'=>'Home')); ?>
                        </span> 
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                            <i class="mdi mdi-menu"></i></a> </li>
                        
                        <!-- pesquisar 
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Pesquisar & Enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>-->

                        

                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Notificações -->
                        <?php if(isset($contagendamentos)){ ?>
                        <?php if($contagendamentos !=0){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title"> Notificações</div>
                                    </li>
                                    <li>
                                        <div class="message-center" style="height: auto;">
                                            <!-- Message -->
                                            <?php foreach ($agendados as $agendado): ?>
                                            <?php if($agendado['Agendamento']['finalizado'] == 0){ ?>
                                            <?php
                                            $date = new DateTime($agendado['Agendamento']['data']);
                                            $data = $date->format('d/m/Y');
                                            $hora = $date->format('H:i');
                                            ?>
                                            <a href="<?php echo '/facilita\Mensagens\atendimento\\'.$agendado['Solicitacao']['id']; ?>">
                                                <div class="btn btn-primary btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $agendado['Usuario']['nome'] ?></h5> <span class="mail-desc">Você possui um agendamento!</span> <span class="time">Dia <?php echo $data ?> às <?php echo $hora ?></span> </div>
                                            </a>
                                            <?php } ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                    <!--<li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>-->
                                </ul>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <!-- Fim Notificações -->
                        <!-- Mensagens -->
                        <?php //echo debug($alertamensagens); ?>
                        <?php if(isset($countalertamensagens)){ ?>
                        <?php if($countalertamensagens !=0){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Você tem <?php echo $countalertamensagens ?>  novas mensagens</div>
                                    </li>
                                    <li>
                                    <div class="message-center">
                                    <?php foreach($alertamensagens as $alertamensagem): ?>
                                    <?php
                                    $adate = new DateTime($alertamensagem['Mensagem']['created']);
                                            $ahora = $adate->format('H:i');
                                            ?>
                                        
                                            
                                            <a href="\facilita\Mensagens\atendimento\<?php echo $alertamensagem['Solicitacao']['id']; ?>">
                                                <div class="user-img"> <?php echo $this->Html->image('/img/usuarios/' . $alertamensagem['Usuario']['id'] . '.png', array('alt'=>'user', 'class'=>'img-circle')); ?> <span class="profile-status pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $alertamensagem['Usuario']['nome']; ?></h5> <span class="mail-desc">Respondeu seu atendimento!</span> <span class="time">às <?php echo $ahora; ?></span> </div>
                                            </a>
                                    
                                    <?php endforeach; ?>
                                    </div>
                                    </li>   
                                </ul>
                            </div>
                        </li>
                        <?php }} ?>
                        <!-- End Messages -->
                        <?php $profile = $this->Session->read('Auth.User'); ?>
                        <!-- Perfil -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php echo $this->Html->image('/assets/images/user.png', array('alt'=>'user', 'class'=>'profile-pic m-r-10')); ?></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up show">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <?php
                                                    $MyImage = WWW_ROOT .'img/usuarios/' . $profile['id'] . '.png'; // image0 is my db field

                                                      if (file_exists($MyImage)) 
                                                               $MyImage1 = '/img/usuarios/' . $profile['id'] . '.png';
                                                      else
                                                               $MyImage1 = '/assets/images/user-semas.png';

                                                            echo $this->Html->image($MyImage1, array('alt'=>'user', 'class'=>'img-circle'));
                                                ?>
                                                
                                                
                                                <?php //echo $this->Html->image('/img/usuarios/' . $profile['id'] . '.png', array('alt'=>'user', 'class'=>'img-circle')); ?></div>
                                            <div class="u-text">
                                                <h4><?php echo $profile['nome']; ?></h4>
                                                <p class="text-muted"><?php echo $profile['email']; ?></p>
                                                <?php if($this->Session->read('Auth.User.psicologo') == 0){ ?>
                                                <a href="<?php echo '\facilita\Usuarios\perfil\\'. $profile['id']; ?>" class="btn btn-rounded btn-danger btn-sm">Ver Cadastro</a></div>
                                                <?php }else{ ?>
                                                <a href="<?php echo '\facilita\Usuarios\perfilpsicologo\\'. $profile['id']; ?>" class="btn btn-rounded btn-danger btn-sm">Ver Cadastro</a>
                                                <?php } ?>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/facilita/usuarios/logout"><i class="fa fa-power-off"></i> Sair</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>


                </div>
    </nav>
</header>