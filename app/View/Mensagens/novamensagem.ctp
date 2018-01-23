<?php $upsi = $this->Session->read('Auth.User.psicologo'); ?>
<?php //debug($upsi); ?>
<?php if($upsi == 1){ ?>
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
<?php }; ?>

<?php if($upsi == 0){ ?>
<nav>
    <ul>
		<li><?php echo $this->Html->link(
        'Página inicial',
        array('controller' => 'solicitacoes', 'action' => 'index')); ?></li>
		<li>
        <?php
                echo $this->Html->link(
                    'Ver perfil',
                    array('controller' => 'Usuarios', 'action' => 'perfil', $this->Session->read('Auth.User.id'))
                );
        ?></li>
        <li><?php echo $this->Html->link(
        'log out',
            array('controller' => 'usuarios', 'action' => 'logout')
); ?></li>
    </ul>
</nav>
<?php }; ?>
<?php //debug($descricaosolicitacao); ?>
<h1>Nova mensagem</h1>
<?php
echo $this->Form->create('Mensagem'); ?>
<?php echo $this->Form->input('Mensagem.conteudo', array('rows' => '3'));?>
<?php echo $this->Form->end('Registrar mensagem'); ?>
<table>
    <tr>
        <th>Solicitacao</th>
    </tr>
    <tr>
        <td><?php echo $descricaosolicitacao['Solicitacao']['descricao'] ?></td>
    </tr>
</table>
    <?php if($this->Session->read('Auth.User.psicologo') == 1){ ?>
<table>
    <tr>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>
      $(function() {
        $( "#datepicker" ).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
});
      });
      
      </script>
      <td>
    <?php echo $this->Form->create('Agendar'); ?>
    <?php echo $this->Form->input('Agendar.dia',array('id'=>'datepicker'));
    ?></td><td><?php echo $this->Form->input('Agendar.hora', array(
        'type' => 'time',
        'timeFormat'=>'24',
        'selected' => '12:00',
        'interval' => 15
        ));?></td><td><?php
            echo $this->Form->end('Agendar')?>
      </td></tr>
</table>
    <?php } ?>
<table>
    <tr>
        <th>Mensagem</th>
        <th>Enviado</th>
        <th>Autor</th>
    </tr>
    <?php foreach ($mensagens as $mensagem): ?>
    <?php $date = new DateTime($mensagem['Mensagem']['created']);
    $date = $date->format('d/m/Y H:i:s'); ?>
    <?php //debug($mensagem); ?>
    <tr>
        <td><?php echo $mensagem['Mensagem']['conteudo']; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $mensagem['Usuario']['nome']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>