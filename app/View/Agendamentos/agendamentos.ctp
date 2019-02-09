<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
<div>
<div class="container-fluid">
    <div class="row">
                           <!-- column -->
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
                                  <table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
                                    <thead>
    <tr>
        <th>Ação</th>
        <th data-toggle="true">Agendamento</th>
        <th>Data</th>
        <th>Horário</th>
        <th>Local</th>
        <th data-hide="all"> Descrição </th>
        <th data-hide="all">Nome</th>
        
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
                <td><span class="text-muted">
                <?php echo $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'mdi mdi-calendar-remove text-inverse', 'title' => 'Finalizar Agendamento')),
                    array('action' => 'fechamento', $agendamento['Agendamento']['id']),
                    array('escape' => false)
                ); ?></span></td>
                <td><?php
                if($agendamento['Solicitacao']['fechado'] == 0){
                    echo $this->Html->link(
                    '#0'.$agendamento['Agendamento']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'atendimento', $agendamento['Solicitacao']['id'])
                );
                }else{
                    echo $this->Html->link(
                    '#0'.$agendamento['Agendamento']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'atendimentofinalizado', $agendamento['Solicitacao']['id'])
                    );
                }
                ?></td>
                
                <td><span class="text-muted"><i class="mdi mdi-calendar"></i><?php echo $data ?></span></td>
                <td><span class="text-muted"><i class="mdi mdi-clock"></i><?php echo $hora ?></span></td>
                
                <td><span class="text-muted"><i class="mdi mdi-clock"></i>
                    <?php echo $agendamento['Agendamento']['local']; ?></span>
                </td>
                <td>
                    <?php echo $agendamento['Solicitacao']['descricao']; ?>
                </td>
                <td>
                    <?php        echo $agendamento['Usuario']['nome']; ?></td>
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
