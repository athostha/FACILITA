<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
    <div>
     
        <div class="container-fluid">
<!-- Start Page Content -->
                <div class="row">
                           <!-- column -->
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
<table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
    <thead>
    <tr>
        <th>Ação</th>
        <th data-toggle="true"> Atendimento </th>
        <th data-hide="all"> Descrição </th>
        <th data-hide="all"> motivos</th>
        <th>autor</th>
        <th>Status</th>
<!--        <th>debug</th> -->
    </tr>
    </thead>
    <tbody>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($solicitacoes); ?>
<?php foreach ($solicitacoes as $solicitacao): ?>
    <tr>
        <td class="text-nowrap">
            <a href="#" data-toggle="tooltip" data-original-title="Finalizar"><?php
            if($solicitacao['Solicitacao']['fechado'] == 0){
                echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'mdi mdi-message-bulleted-off text-inverse','data-original-title'=>'Finalizar', 'title' => 'Finalizar Atendimento')),
                        array('action' => 'fecharsolicitacao', $solicitacao['Solicitacao']['id']),
                        array('escape'=>false),
                        __('Você realmente deseja finalizar este atendimento?'),
                       array('class' => 'btn btn-mini')
                        );
            }else{
                echo '';
            }
            ?></a>
        </td>
        <td>
            <?php
            if($solicitacao['Solicitacao']['fechado'] == 0){
                echo $this->Html->link(
                    '#0'.$solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'atendimento', $solicitacao['Solicitacao']['id']));
            }else{
                echo $this->Html->link(
                    '#0'.$solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'atendimentofinalizado', $solicitacao['Solicitacao']['id']));
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
            <?php echo $solicitacao['Usuario']['nome']; ?>   
        </td>
        <td>
            <?php
            //debug($solicitacao['Mensagem']);
                foreach ($solicitacao['Mensagem'] as $primeiramensagem):
                endforeach;
                foreach ($solicitacao['Agendamento'] as $primeiroagendamento):
                endforeach;
                //echo debug($solicitacao);
                //echo debug($primeiramensagem);
                if($solicitacao['Solicitacao']['fechado'] == 1){
                    ?><span class="label label-table label-<?php echo "info" ?>"><?php    echo "Finalizado";
                }else if((isset($primeiroagendamento)) && ($primeiroagendamento['finalizado'] == 0)){
                    ?><span class="label label-table label-<?php echo "warning" ?>"><?php    echo "Agendado";
                }else{
                if(isset($primeiramensagem)){
                if(($primeiramensagem['lido'] == 0)&&($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id'))){
                ?><span class="label label-table label-<?php echo "danger" ?>"><?php    echo "Nova mensagem";
                }else{
                ?><?php if($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id')){ ?>
                    <span class="label label-table label-<?php echo "danger" ?>"><?php    echo "Aguardando resposta";
                }else{
                ?> <span class="label label-table label-<?php echo "info" ?>"><?php    echo "Não há Novas Mensagens";
                }
                }}else{
                ?><span class="label label-table label-<?php echo "danger" ?>"><?php    echo "Nova Solicitação";
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

<?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>
            </div>
         
         
        </div>
</div>
</body>

<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Buscar Atendimento</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <?php echo $this->Form->create('buscar'); ?>
                                                      <label class="control-label">Data</label>
                                                      <p>Início</p>
                                                      <?php echo $this->Form->date('diade',array('type' => 'date',
                                                          'class' => 'form-control')); ?>
                                                      <p>Fim</p>
                                                      <?php echo $this->Form->date('diate',array('type' => 'date',
                                                          'class' => 'form-control')); ?>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="control-label">Matrícula</label>
                                                          <?php echo $this->Form->input('Matricula', array('label' => '','class'=>'form-control')); ?>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="control-label">Status</label>
                                                          <?php echo $this->Form->input('status', array('options' => array(2 => 'Todos', 1 => 'Finalizado', 0 =>'aberto'),'label' => '','class'=>'form-control'));?>
                                                      </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <?php echo $this->Form->button('Buscar', array('type'=>'submit', 'class'=>'btn waves-effect waves-light btn-danger pull-right'));
                                                echo $this->Form->end(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</body>