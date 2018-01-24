<?php //debug($descricaosolicitacao); ?>
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
        <th>Solicitacao</th>
    </tr>
    <tr>
        <td><?php echo $descricaosolicitacao['Solicitacao']['descricao'] ?></td>
    </tr>
</table>
<table>
    <tr>
        <th>Mensagem</th>
        <th>Autor</th>
    </tr>
    <?php foreach ($mensagens as $mensagem): ?>
    <?php //debug($mensagem); ?>
    <tr>
        <td><?php echo $mensagem['Mensagem']['conteudo']; ?></td>
        <td><?php echo $mensagem['Usuario']['nome']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>