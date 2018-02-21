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
            array('controller' => 'usuarios', 'action' => 'vis', 'new')
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
        <th>Nome</th>
        <th>Data</th>
        <th>Fechar agendamento</th>
    </tr>
        <?php
        //echo debug($agendamentos);
            foreach($agendamentos as $agendamento):
                $date = new DateTime($agendamento['Agendamento']['data']);
                $date = $date->format('d/m/Y H:i:s');
        ?>
            <tr>
                <td><?php        echo $agendamento['Usuario']['nome']; ?></td>
                <td><?php        echo $this->Html->link(
                    $date,
                    array('controller' => 'Mensagens',
                        'action' => 'novamensagem', $agendamento['Solicitacao']['id'])
                ); ?></td>
                <td>
                <?php
                echo $this->Html->link(
                    'Fechar agendamento',
                    array('action' => 'fechamento', $agendamento['Agendamento']['id'])
                );
            ?></td>
        <?php
            endforeach;
        ?>
    
</table>