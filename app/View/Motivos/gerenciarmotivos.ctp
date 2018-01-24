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

<table>
<tr>
    <th>Motivo</th>
    <th>Excluir</th>
</tr>

<?php foreach($motivs as $motivo): ?>
    <tr>
        <?php //echo debug($motivo); ?>
    <td><?php echo $motivo['Motivo']['motivo']; ?></td>
    <td><?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $motivo['Motivo']['id']),
                    array('confirm' => 'Are you sure?')
                );
                ?></td>
    </tr>
<?php endforeach; ?>
</table>
</br>

<h1>Novo motivo</h1>
<?php echo $this->Form->create('Motivo', array('type' => 'post')); ?>
<?php echo $this->Form->input('Motivo.motivo');?>
<?php echo $this->Form->end('Registrar Motivo'); ?>
