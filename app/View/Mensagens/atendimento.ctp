<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
<div>
<div class="container-fluid">
<div class="row">
                    <!-- Column -->
                <!-- Start Page Content -->
                <!-- Row -->
<?php foreach ($descricaosolicitacao['Agendamento'] as $agendamento1): ?>
<?php if($agendamento1['finalizado'] == 0){ ?>
<?php
                $date = new DateTime($agendamento1['data']);
                $data = $date->format('d-m-Y');
                $hora = $date->format('H:i');
        ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Atenção!</h3>  
                            Informamos que você possui um <span class="font-medium">Atendimento Agendado</span> para o dia <span class="font-medium"><?php echo $data; ?></span> às <span class="font-medium"><?php echo $hora; ?></span> no local <span class="font-medium"><?php echo $agendamento1['local']; ?>.</span>
                        </div>  
                    </div>        
                </div>
<?php } ?>
<?php endforeach; ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card blog-widget">
                            <div class="card-body">
                              <div class="blog-image"><?php echo $this->Html->image('/assets/images/atendimento.jpg', array( 
                                    'alt' => 'img', 
                                    'class'=>'img-responsive',)); ?></div>
                                <h3 class="text-center">Atendimento <?php echo $descricaosolicitacao['Solicitacao']['id'] ?></h3>
                                <div class="row text-center">
                                  <div class="col-6">
                                    <h6 class="card-subtitle" style="margin-bottom: 0px; font-size: 12px">Data da Solicitação:</h6>
                                        <?php
                                        $date = new DateTime($descricaosolicitacao['Solicitacao']['created']);
                                        $data = $date->format('d-m-Y');?>
                                    <i class="mdi mdi-calendar"></i> <span class="font-medium"><?php echo $data; ?></span>
                                  </div>
                                  <div class="col-6">
                                    <h6 class="card-subtitle" style="margin-bottom: 0px; font-size: 12px">Status:</h6>
                                    <?php
                                    foreach ($descricaosolicitacao['Mensagem'] as $primeiramensagem):
                                    endforeach;
                                    foreach ($descricaosolicitacao['Agendamento'] as $primeiroagendamento):
                                    endforeach;
                                    //echo debug($primeiramensagem);
                                    if((isset($primeiroagendamento)) && ($primeiroagendamento['finalizado'] == 0)){
                                        ?><span class="label label-table label-<?php echo "success" ?>"><?php    echo "Agendado";
                                    }else{
                                    if(isset($primeiramensagem)){
                                    if(($primeiramensagem['lido'] == 0)
                                        &&($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id'))){
                                    ?><span class="label label-table label-<?php echo "warning" ?>"><?php    echo "Nova mensagem";
                                    }else{
                                    ?><span class="label label-table label-<?php echo "info" ?>"><?php    echo "Aguardando";
                                    }}else{
                                    ?><span class="label label-table label-<?php echo "primary" ?>"><?php    echo "Nova Solicitação";
                                    }}
                                    $primeiramensagem = null;
                                    $primeiroagendamento = null;
                                    ?>
                                  </div>
                                </div>
                                <p>
                                   <h6 class="card-subtitle" style="margin-bottom: 5px">Motivos:</h6>
                                   <?php $mot = null ?>
                                    <?php foreach ($descricaosolicitacao['Motivo'] as $mot): ?>
                                    <h6><i class="mdi mdi-checkbox-marked-outline"></i><span class="font-medium"><?php echo $mot['motivo']; ?></h6>
                                    <?php $mut = $mot['motivo']; ?>
                                    <?php endforeach; ?>
                                    <?php $mut = null ?>
                                    <?php if($descricaosolicitacao['Solicitacao']['motivo_outros'] != ''){ ?>
                                    <h6><i class="mdi mdi-checkbox-marked-outline"></i><span class="font-medium"><?php echo $descricaosolicitacao['Solicitacao']['motivo_outros']; ?></h6>
                                    <?php } ?>
                                </p>
                    
                                <?php if($this->Session->read('Auth.User.psicologo')==1){ ?>
                              <div class="text-center">
                                <button class="btn btn-outline-primary waves-effect waves-light m-r-10" type="button" data-toggle="modal" data-target="#modalAgenda" data-whatever="@agenda">
                                  <span class="btn-label"><i class="mdi mdi-calendar-clock"></i></span>Agendar
                                </button>
                                <?php     echo $this->Form->postLink(
                '<button class="btn btn-secondary waves-effect waves-light"><span class="btn-label">
                     <i class="mdi mdi-message-bulleted-off"></i>
                 </span>Finalizar</button>',
                array('controller' => 'Solicitacoes',
                      'action' => 'fecharsolicitacao', $descricaosolicitacao['Solicitacao']['id']
                      ),
                array(
                      'class'    => 'tip',
                      'escape'   => false,
                      'confirm'  => 'Você realmente deseja finalizar este atendimento?'
                     ));
                     ?>

                              </div>
                              <div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Agendamento</h4>
                                                <?php echo $this->Form->create('Agendar'); ?>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                      <label class="control-label">Data</label>
                                                      <?php echo $this->Form->date('Agendar.dia',array('type' => 'date',
                                                          'class' => 'form-control')); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Horário:</label>
                                                        <?php echo $this->Form->time('Agendar.hora', array(
                                                        'label' => '',
                                                        'type' => 'time',
                                                        'timeFormat'=>'24',
                                                        'selected' => '12:00',
                                                        'interval' => 15,
                                                        'class' => 'form-control',
                                                        'id' => 'hora'
                                                        ));?>
                                                    </div>
                                                <div class="form-group">
                                                        <label class="control-label">Local:</label>
                                                        <?php echo $this->Form->input('local', array('label'=>'','class' => 'form-control')); ?>
                                                    </div>
<!--
                                                    <div class="form-group">
                                                        <label class="control-label">Local:</label>
                                                        <input type="text" class="form-control" id="local">
                                                    </div> -->
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <?php echo $this->Form->button('Agendar', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
                                                <?php echo $this->Form->end();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                               <?php } ?>
                            </div>
                        </div>
                    </div>
<div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                          
                                <div class="b-b">
                                    <h3 class="box-title">Mensagens</h3>
                                </div>

                                <div>
                                  <div>
                                    
                                    <ul class="chat-list p-10">
                                        <li>
                                            <div class="chat-img"><?php
                                                    $MyImage = WWW_ROOT .'img/usuarios/' . $descricaosolicitacao['Usuario']['id'] . '.png'; // image0 is my db field

                                                      if (file_exists($MyImage)){
                                                               $MyImage1 = '/img/usuarios/' . $descricaosolicitacao['Usuario']['id'] . '.png';
                                                      }else{
                                                               $MyImage1 = '/assets/images/user-semas.png';
                                                      }
                                                            echo $this->Html->image($MyImage1, array('alt' => 'user'));
                                                ?></div>
                                            
                                            <div class="chat-content">
                                                <h5><?php echo $descricaosolicitacao['Usuario']['nome']; ?></h5>
                                                <div class="box bg-light-info"><?php echo $descricaosolicitacao['Solicitacao']['descricao']; ?></div>
                                            </div>
                                            <div class="chat-time"><?php echo $descricaosolicitacao['Solicitacao']['created']; ?></div>
                                        </li>
                                        <?php foreach ($mensagens as $mensagem): ?>
                                            <?php $date = new DateTime($mensagem['Mensagem']['created']);
                                            $date = $date->format('d/m/Y H:i'); ?>
                                            <?php //debug($mensagem); ?>
                                        <?php if($mensagem['Usuario']['psicologo'] == 0){ ?>
                                        <li>
                                            <div class="chat-img"><?php
                                                    $MyImage = WWW_ROOT . 'img/usuarios/' . $mensagem['Usuario']['id'] . '.png'; // image0 is my db field

                                                      if (file_exists($MyImage)){
                                                               $MyImage1 = '/img/usuarios/' . $mensagem['Usuario']['id'] . '.png';
                                                      }else{
                                                               $MyImage1 = '/assets/images/user-semas.png';
                                                      }
                                                            echo $this->Html->image($MyImage1, array('alt' => 'user'));
                                                ?></div>
                                            <div class="chat-content">
                                                <h5><?php echo $mensagem['Usuario']['nome']; ?></h5>
                                                <div class="box bg-light-info"><?php echo $mensagem['Mensagem']['conteudo']; ?></div>
                                            </div>
                                            <div class="chat-time"><?php echo $date; ?></div>
                                        </li>
                                        <?php }else{ ?>
                                        <li class="reverse">
                                                <div class="chat-time"><?php echo $date; ?></div>
                                                <div class="chat-content">
                                                    <h5><?php echo $mensagem['Usuario']['nome']; ?></h5>
                                                    <div class="box bg-light-success"><?php echo $mensagem['Mensagem']['conteudo']; ?></div>
                                                </div>
                                                <div class="chat-img"><?php
                                                    $MyImage = WWW_ROOT . 'img/usuarios/' . $mensagem['Usuario']['id'] . '.png'; // image0 is my db field

                                                      if (file_exists($MyImage)){
                                                               $MyImage1 = '/img/usuarios/' . $mensagem['Usuario']['id'] . '.png';
                                                      }else{
                                                               $MyImage1 = '/assets/images/user-semas.png';
                                                      }
                                                            echo $this->Html->image($MyImage1, array('alt' => 'user'));
                                                ?></div>
                                        </li>
                                        <?php } ?>
                                            <?php endforeach; ?>
                                    </ul>
                                </div>
                                </div>
                                </div>
                                <div class="slimScrollBar"></div>
                                  <div class="slimScrollRail"></div>
                                
                            
                        <div class="card-body b-t">
                            <div class="row">
                                <div class="col-8">
                                    <?php
                                    echo $this->Form->create('Mensagem'); ?>
                                    <?php echo $this->Form->input('Mensagem.conteudo', array('rows' => '3', 'label'=>'', 'class'=>'form-control', 'placeholder'=> 'Digite sua mensagem aqui.'));?>
                                                                        </div>
                                                                        <div class="col-4 text-right">
                                    <?php echo $this->Form->button('<i class="fa fa-paper-plane-o"></i>', array('type'=>'submit', 'class'=>'btn btn-info btn-circle btn-lg')); ?>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="card">
                        </div>
                    </div>
                </div>
</div>
</div>
</div>
</div>
</body>