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
        <th>Nome</th>
        <th>Data</th>
        <th>Fechar agendamento</th>
        <th>Delete</th>
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
            if($agendamento['Agendamento']['finalizado'] == 0){
                echo $this->Form->postLink(
                    'Finalizar agendamento',
                    array('action' => 'fechar', $agendamento['Agendamento']['id']),
                    array('confirm' => 'Are you sure?')
                );
            }else{
                echo 'Solicitação Fechada';
            }
            ?></td>
                <td><?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $agendamento['Agendamento']['id']),
                    array('confirm' => 'Are you sure?')
                );
                ?></td>
        <?php
            endforeach;
        ?>
    
</table>