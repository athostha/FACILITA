<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
<div>
<div class="container-fluid">
<div class="row">
                    <!-- Column -->
                <!-- Start Page Content -->
                <!-- Row -->
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
                                    <span class="label label-table label-<?php echo "primary" ?>"><?php    echo "Finalizado";  ?>
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
                                            <div class="chat-img">
                                                <?php
                                                    $MyImage = WWW_ROOT .'img/usuarios/' . $mensagem['Usuario']['id'] . '.png'; // image0 is my db field

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
                                                    $MyImage = WWW_ROOT .'img/usuarios/' . $mensagem['Usuario']['id'] . '.png'; // image0 is my db field

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
                        </div>

                    </div>
                </div>

<!-- column -->
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
                                  <table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
                                    <thead>
    <tr>
        <th data-toggle="true">Agendamento</th>
        <th>Data</th>
        <th>Horário</th>
        <th data-hide="all">Comentario</th>
        <th>Presença</th>
    </tr>
                                    </thead>
                                    <tbody>
        <?php
        //echo debug($agendamentos);
            foreach($agendamentos as $agendamento):
                $date = new DateTime($agendamento['Agendamento']['data']);
                $data = $date->format('d/m/Y');
                $hora = $date->format('H:i');
        ?>
            <tr>
                <td></i><?php echo $agendamento['Agendamento']['id']; ?></span></td>
                <td><span class="text-muted"><i class="mdi mdi-calendar"></i><?php echo $data ?></span></td>
                <td><span class="text-muted"><i class="mdi mdi-clock"></i><?php echo $hora ?></span></td>
                <td>
                    <?php echo $agendamento['Agendamento']['comentario']; ?></span>
                </td>
                <td></i>
                 <?php if($agendamento['Agendamento']['finalizado'] == 1){ ?>
                <?php if($agendamento['Agendamento']['comparecimento'] == 1){
                ?><span class="label label-table label-<?php echo "info" ?>"><?php    echo "compareceu";
                }else{
                ?><span class="label label-table label-<?php echo "warning" ?>"><?php    echo "Faltou";
                 }}else{ ?>
                    <span class="label label-table label-<?php echo "success" ?>"><?php    echo "Não Finalizado";?>
                 <?php }; ?></span></td>
        <?php
            endforeach;
        ?>    
    </tr>
                                    </tbody>
                                </table>
                               </div>
                           </div>
                       </div>
</div>
</div>
</div>
</div>
</body>