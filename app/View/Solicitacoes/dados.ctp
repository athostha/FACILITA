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
    echo $this->Form->create('Busca');
    echo $this->Form->input('begin', array(
        'type' => 'date',
        'dateFormat' => 'DMY',
        'label' => 'Início'
    ));
    echo $this->Form->input('end', array(
        'type' => 'date',
        'dateFormat' => 'DMY',
        'label' => 'Final'
    ));
?><?php
        echo $this->Form->end('buscar');
            
            if(isset($solicitacoes)){
                echo "Número total de atendimentos: ", $agendamentos;
                ?></br><?php
                echo "Número total de solicitações: ", $solicitacoes;
                ?></br><?php
                foreach($motivos as $motivo):
                    //echo debug($motivo);
        ?><table><tr><td><?php
                $count = 0;
                    foreach ($motivo['Solicitacao'] as $countsol):
                        if($countsol['fechado'] == 1 &&
                                $countsol['created'] > $begin &&
                                $countsol['created'] < $end){
                            //echo debug($countsol);
                            $count = $count + 1;
                        }
                    endforeach;
                echo $motivo['Motivo']['motivo'],": ",$count;
                ?></td></tr><?php
                endforeach;
            }
            ?>
</table>
<table>
    <tr>
        <th>Id</th>
        <th>descricao</th>
        <th>motivos</th>
        <th>autor</th>
<!--        <th>debug</th> -->
    </tr>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($solicitacoes); ?>
<?php if(isset($solicita)){ foreach ($solicita as $solicitacao): ?>
    <tr>
        <td>
            <?php
            
                echo $this->Html->link(
                    $solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'mensagemsalva', $solicitacao['Solicitacao']['id']));
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
<!--        <td><?php //debug($mot); ?></td> -->
    </tr>
<?php endforeach; }?>

</table>
        