<nav>
    <ul>
        <li><?php echo $this->Html->link(
        'Página inicial',
        array('controller' => 'solicitacoes', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(
        'Ver Solicitações',
        array('controller' => 'Solicitacoes', 'action' => 'vispsicologo')
); ?></li>
        <li><?php echo $this->Html->link(
        'Ver dados',
        array('controller' => 'Solicitacoes', 'action' => 'dados')
); ?></li>
        <li><?php echo $this->Html->link(
        'Atendimentos agendados',
        array('controller' => 'Agendamentos', 'action' => 'visagendamentos')
); ?></li>
        <li><?php echo $this->Html->link(
        'Gerenciamento de Usuários',
            array('controller' => 'usuarios', 'action' => 'vis')
); ?></li>
         <li><?php echo $this->Html->link(
        'Gerenciamento de motivos',
            array('controller' => 'motivos', 'action' => 'gerenciarmotivos')
);       ?></li>
        <li><?php echo $this->Html->link(
        'log out',
            array('controller' => 'usuarios', 'action' => 'logout')
); ?></li>
    </ul>
</nav>
<?php
    //echo    debug($solicitacoes);
?>
<table>
    <tr>
        <th>Id</th>
        <th>descricao</th>
        <th>Nova mensagem</th>
        <th>motivos</th>
        <th>Fechar solicitação</th>
        <th>autor</th>
<!--        <th>debug</th> -->
    </tr>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($solicitacoes); ?>
<?php foreach ($solicitacoes as $solicitacao): ?>
    <tr>
        <td>
            <?php
            if($solicitacao['Solicitacao']['fechado'] == 0){
                echo $this->Html->link(
                    $solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'novamensagem', $solicitacao['Solicitacao']['id']));
            }else{
                echo $solicitacao['Solicitacao']['id'];
            }
            ?>
        </td>
        
        <td><?php echo $solicitacao['Solicitacao']['descricao']; ?></td>
                
        <td>
            
            <?php
            //debug($solicitacao['Mensagem']);
                foreach ($solicitacao['Mensagem'] as $primeiramensagem):
                endforeach;
                
                //echo debug($primeiramensagem);
                if(isset($primeiramensagem)){
                if(($primeiramensagem['lido'] == 0)
                    &&($primeiramensagem['usuario_id'] !== $this->Session->read('Auth.User.id'))){
                    echo "sim";
                }else{
                    echo "não";
                }}else{
                    echo "não";
                }
                $primeiramensagem = null;
                ?>
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
            if($solicitacao['Solicitacao']['fechado'] == 0){
                echo $this->Form->postLink(
                    'Fechar Solicitação',
                    array('action' => 'fecharsolicitacao', $solicitacao['Solicitacao']['id']),
                    array('confirm' => 'Are you sure?')
                );
            }else{
                echo 'Solicitação Fechada';
            }
        ?>
        </td>
        
        <td>
            <?php echo $solicitacao['Usuario']['nome']; ?>   
        </td>
<!--        <td><?php //debug($mot); ?></td> -->
    </tr>
<?php endforeach; ?>

</table>

<?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>