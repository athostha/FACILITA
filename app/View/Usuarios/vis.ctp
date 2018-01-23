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
        'Ver atendimentos agendados',
        array('controller' => 'Agendamentos', 'action' => 'visagendamentos')
); ?></li>
        <li><?php echo $this->Html->link(
        'Ver Usuários',
            array('controller' => 'usuarios', 'action' => 'vis')
); ?></li>
         <li><?php echo $this->Html->link(
        'Gerenciar motivos',
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
        <th>Id</th>
        <th>Nome</th>
        <th>Editar</th>
        <th>Matrícula</th>
        <th>telefone</th>
        <th>email</th>  
    </tr>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($this->request); ?>
<?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?php echo $usuario['Usuario']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $usuario['Usuario']['nome'],
                    array('action' => 'perfil', $usuario['Usuario']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edite',
                    array('action' => 'editar', $usuario['Usuario']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['matricula']; ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['telefone']; ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['email']; ?>
        </td>
<?php endforeach; ?>

</table>