<aside class="left-sidebar">
   <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php $upsi = $this->Session->read('Auth.User.psicologo'); ?>
                <?php if($upsi == 1){ ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="/facilita\Solicitacoes\index" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/facilita\Solicitacoes\atendimentos" aria-expanded="false"><i class="mdi mdi-comment-text-outline"></i><span class="hide-menu">Atendimentos</span></a>
                        </li>
                        <!--<li> <a class="waves-effect waves-dark" href="/facilita/Solicitacoes/dados" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Relatórios</span></a>
                        </li> -->
                        <li> <a class="waves-effect waves-dark" href="/facilita/Agendamentos/agendamentos" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Agendadamentos</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/facilita/usuarios/usuarios/new" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Usuários</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/facilita/motivos/gerenciarmotivos" aria-expanded="false"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">motivos</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo '\facilita\Usuarios\perfilpsicologo\\'. $this->Session->read('Auth.User.id'); ?>" aria-expanded="false"><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Meu Perfil</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/facilita/usuarios/logout" aria-expanded="false"><i class="mdi mdi-power"></i><span class="hide-menu">Sair</span></a>
                        </li>
                    </ul>
                </nav>
                <?php } ?>
                <!-- Menu do servidor -->
                <?php if($upsi == 0){ ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="\facilita\Solicitacoes\index" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/facilita/Usuarios/perfil/<?php echo $this->Session->read('Auth.User.id'); ?>" aria-expanded="false"><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Meu Perfil</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/facilita/usuarios/logout" aria-expanded="false"><i class="mdi mdi-power"></i><span class="hide-menu">Sair</span></a>
                        </li>
                    </ul>
                </nav>
                <?php }; ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
             
            <div class="sidebar-footer">
                <img src="/facilita/assets/images/logo_semas.png" alt="Semas" />
            </div>

</aside>