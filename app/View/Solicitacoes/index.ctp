<h1>Olá <?php echo $uid = $this->Session->read('Auth.User.nome'); ?></h1>
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
<?php }; ?>

<?php if($upsi == 0){ ?>
<script>
$(document).ready(function(){    
    
    $('#contact').submit(function(){
        
        // see if selectone is even being used
        var boxes = $(":checkbox:checked");
        if(boxes.length > 0 || document.getElementById('question').value !== '') {
            return true;
        }else {
            alert('Você deve escolher pelo menos um motivo');
            return false;
        }

    });
    
});
</script>
<nav>
    <ul>
		<li>
        <?php
                echo $this->Html->link(
                    'Perfil',
                    array('controller' => 'Usuarios', 'action' => 'perfil', $this->Session->read('Auth.User.id'))
                );
        ?></li>
        <li><?php echo $this->Html->link(
        'log out',
            array('controller' => 'usuarios', 'action' => 'logout')
); ?></li>
    </ul>
</nav>
<table>
    <tr>
        <th>Id</th>
        <th>descricao</th>
        <th>Nova mensagem</th>
        <th>motivos</th>
        <th>autor</th>
<!--        <th>debug</th> -->
    </tr>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($solicitacoes); ?>
<?php foreach ($solicitacoes as $solicitacao): ?>
    <tr>
        <td><?php
                echo $this->Html->link(
                    $solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'novamensagem', $solicitacao['Solicitacao']['id'])
                );
                ?></td>
        
        <td><?php echo $solicitacao['Solicitacao']['descricao']; ?></td>
                
        <td>
            
            <?php
            //debug($solicitacao['Mensagem']);
                foreach ($solicitacao['Mensagem'] as $primeiramensagem):
                    //debug($primeiramensagem);

                endforeach;
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
            <?php echo $solicitacao['Usuario']['nome']; ?>   
        </td>
<!--        <td><?php //debug($mot); ?></td> -->
    </tr>
<?php endforeach; ?>
</table>
<h2>Solicitação</h2>
<?php echo $this->Form->create('Solicitacao', array( 'id' => 'contact')); ?>
<?php echo $this->Form->input('Solicitacao.descricao', array('rows' => '3',
    'label' => 'Descrição'));?>
 <table>
     <h3>Motivos</h3>

<?php foreach ($motivos as $motivo): {?>

<td><?php echo $motivo['Motivo']['motivo'];
    echo $this->Form->checkbox('Motivo.Motivo.',
            array('hiddenField' => false, 'value' => $motivo['Motivo']['id'])); ?></td>
<?php    } endforeach; ?>
</table>
<?php echo $this->Form->input('Solicitacao.motivo_outros',
        array('label' => 'Outros motivos',
            'id' => 'question'));?>
<?php echo $this->Form->end('Registrar Demanda'); ?>
<?php }; ?>

<?php //debug($_SESSION); ?>

