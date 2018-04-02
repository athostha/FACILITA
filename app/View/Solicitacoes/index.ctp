<?php $upsi = $this->Session->read('Auth.User.psicologo'); ?>
<?php //debug($upsi); ?>
<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <div>
            <div class="container-fluid">
<?php if($upsi == 0){ ?>
<!-- Start Page Content -->
          <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <?php $id = $this->Session->read('Auth.User');?>
                                <div class="text-center m-t-30"><?php
                                                    $MyImage = WWW_ROOT . 'img/usuarios/' . $id['id'] . '.png'; // image0 is my db field

                                                      if (file_exists($MyImage)){
                                                               $MyImage1 = '/img/usuarios/' . $id['id'] . '.png';
                                                      }else{
                                                               $MyImage1 = '/assets/images/user-semas.png';
                                                      }
                                                            echo $this->Html->image($MyImage1, array( 
                                    'alt' => 'img', 
                                    'class'=>'img-circle', 'width'=>'150'));
                                                ?>
                                    <h4 class="card-title m-t-10"><?php echo $this->Session->read('Auth.User.nome'); ?></h4>
                                    <h6 class="card-subtitle"><?php echo $id['cargo'];?></h6>
                                </div>
                            </div>
                            <div>
                            <hr> </div>
                            <div class="card-body"> 
                             
                               <h6 class="text-muted" style="margin-bottom: 0">Matrícula:</h6>
                               <h4><?php echo $id['matricula'];?></h4> 
                               
                               <h6 class="text-muted p-t-10" style="margin-bottom: 0">Setor:</h6>
                               <h4><?php echo $id['setor'];?></h4>

                               <h6 class="text-muted p-t-10" style="margin-bottom: 0">Email:</h6>
                               <h4><?php echo $id['email'];?></h4>

                            </div>
                        </div>
                    
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                           <!-- column -->
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
<table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
    <thead>
    <tr>
        <th data-toggle="true"> Atendimento </th>
        <th data-hide="all"> Descrição </th>
        <th data-hide="all"> motivos</th>
        <th>Status</th>
<!--        <th>debug</th> -->
    </tr>
    </thead>
    <tbody>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($solicitacoes); ?>
<?php foreach ($solicitacoes as $solicitacao): ?>
    <tr>
        <td>
            <?php
            if($solicitacao['Solicitacao']['fechado'] == 0){
                echo $this->Html->link(
                    '#0'.$solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'atendimento', $solicitacao['Solicitacao']['id']));
            }else{
                echo $solicitacao['Solicitacao']['id'];
            }
            ?>
        </td>
        
        <td><?php echo $solicitacao['Solicitacao']['descricao']; ?></td>
                
        
        <td>
            <?php $mot = null ?>
            <?php foreach ($solicitacao['Motivo'] as $mot): ?>
            <?php if(isset($mut)){ echo ',';} ?>
            <?php echo $mot['motivo']; ?>
            <?php $mut = $mot['motivo']; ?>
            <?php endforeach; ?>
            <?php if($solicitacao['Solicitacao']['motivo_outros'] !== '' && isset($mot['motivo'])){ ?><?php echo ', ' ?><?php } ?>
            <?php $mut = null ?>
            <?php echo $solicitacao['Solicitacao']['motivo_outros']; ?>
        </td>
        <td>
            <?php
            //debug($solicitacao['Mensagem']);
                foreach ($solicitacao['Mensagem'] as $primeiramensagem):
                endforeach;
                foreach ($solicitacao['Agendamento'] as $primeiroagendamento):
                endforeach;
                //echo debug($primeiramensagem);
                if((isset($primeiroagendamento)) && ($primeiroagendamento['finalizado'] == 0)){
                    ?><span class="label label-table label-<?php echo "success" ?>"><?php    echo "Agendado";
                }else{
                if(isset($primeiramensagem)){
                if(($primeiramensagem['lido'] == 0) && ($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id'))){
                ?><span class="label label-table label-<?php echo "warning" ?>"><?php    echo "Nova mensagem";
                }else{
                ?><span class="label label-table label-<?php echo "info" ?>"><?php    echo "Aguardando";
                }}else{
                ?><span class="label label-table label-<?php echo "primary" ?>"><?php    echo "Nova Solicitação";
                }}
                $primeiramensagem = null;
                $primeiroagendamento = null;
                ?></span>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
                                   </div>
                           </div>
                       </div>
                       <!-- column -->
                </div>
                    </div>
<?php }; ?>

<?php //debug($_SESSION); ?>

<?php if($upsi == 1){ ?>
<!-- Start Page Content -->
          <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <?php $id = $this->Session->read('Auth.User');?>
                                <div class="text-center m-t-30"><?php
                                                    $MyImage = WWW_ROOT . 'img/usuarios/' . $id['id'] . '.png'; // image0 is my db field

                                                      if (file_exists($MyImage)){
                                                               $MyImage1 = '/img/usuarios/' . $id['id'] . '.png';
                                                      }else{
                                                               $MyImage1 = '/assets/images/user-semas.png';
                                                      }
                                                            echo $this->Html->image($MyImage1, array( 
                                    'alt' => 'img', 
                                    'class'=>'img-circle', 'width'=>'150'));
                                                ?>
                                    <h4 class="card-title m-t-10"><?php echo $this->Session->read('Auth.User.nome'); ?></h4>
                                    <h6 class="card-subtitle"><?php echo $id['cargo'];?></h6>
                                </div>
                            </div>
                            <div>
                            <hr> </div>
                            <div class="card-body"> 
                             
                               <h6 class="text-muted" style="margin-bottom: 0">Matrícula:</h6>
                               <h4><?php echo $id['matricula'];?></h4> 
                               
                               <h6 class="text-muted p-t-10" style="margin-bottom: 0">Setor:</h6>
                               <h4><?php echo $id['setor'];?></h4>

                               <h6 class="text-muted p-t-10" style="margin-bottom: 0">Email:</h6>
                               <h4><?php echo $id['email'];?></h4>

                            </div>
                        </div>
                    
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <h3 class="card-title">Meus Atendimentos</h3>
                        <div class="row">
                                  <!-- Column -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="align-self-center">
                                                    <span class="display-6 text-info"><?php echo $aguardando; ?></span>
                                                    <h6 class="text-muted">Aguardando</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-calendar-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="d-flex flex-row">
                                                    <div class="align-self-center">
                                                        <span class="display-6 text-primary"><?php echo $agendado; ?></span>
                                                        <h6 class="text-muted">Agendado</h6>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-calendar"></i></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                        </div>
                        <div class="row">
                                   <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-row">
                                                    <div class="align-self-center">
                                                        <span class="display-6 text-warning"><?php echo $atendimento; ?></span>
                                                        <h6 class="text-muted">Em atendimento</h6>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-comment-text-outline"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <!-- Column -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-row">
                                                    <div class="align-self-center">
                                                        <span class="display-6 text-success"><?php echo $finalizado; ?></span>
                                                        <h6 class="text-muted">Finalizado</h6>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="round round-lg align-self-center round-success"><i class="mdi mdi-check"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->

                        </div>
                    </div>
                </div>
<?php } ?>
</div>
        </div>
    </div>
</body>