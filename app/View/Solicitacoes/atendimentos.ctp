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
                    $this->Html->tag('i', '', array('class' => 'mdi mdi-message-bulleted-off text-inverse','data-original-title'=>'Finalizar')),
                        array('action' => 'fecharsolicitacao', $solicitacao['Solicitacao']['id']),
                        array('escape'=>false),
                        __('Are you sure?'),
                       array('class' => 'btn btn-mini')
                        );
            }else{
                echo 'Solicitação Fechada';
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
            <?php echo $solicitacao['Usuario']['nome']; ?>   
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
                if(($primeiramensagem['lido'] == 0)&&($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id'))){
                ?><span class="label label-table label-<?php echo "warning" ?>"><?php    echo "Nova mensagem";
                }else{
                ?><?php if($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id')){ ?>
                    <span class="label label-table label-<?php echo "warning" ?>"><?php    echo "Aguardando resposta";
                }else{
                ?> <span class="label label-table label-<?php echo "info" ?>"><?php    echo "Não há Novas Mensagens";
                }
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

<?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>
            </div>
         
         
        </div>
</div>
</body>