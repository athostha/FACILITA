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
<?php } ?>
<?php //echo debug($usuario); ?>
<table>
    <tr>
        <th>Nome</th>
        <td><?php echo $usuario['Usuario']['nome']; ?></td>
    </tr>
    <tr>
        <th>Matrícula</th>
        <td><?php echo $usuario['Usuario']['matricula']; ?></td>
    </tr>
    <tr>
        <th>Data de nascimento</th>
        <td><?php 
        $data = new DateTime($usuario['Usuario']['data_nascimento']);
        echo $data->format('d/m/Y'); ?>
    </tr>
    <tr>
        <th>Sexo</th>
        <td>
            <?php if($usuario['Usuario']['realizou_atendimento_psicologico'] === 'f'){?>
            <?php echo 'femino'; ?>
            <?php }else{
                echo 'masculino';
            } ?>
        </td>
    </tr>
    <tr>
        <th>email</th>
        <td><?php echo $usuario['Usuario']['email']; ?></td>
    </tr>
    <tr>
        <th>telefone</th>
        <td><?php echo $usuario['Usuario']['telefone']; ?></td>
    </tr>
    <tr>
        <th>Estado Civil</th>
        <td><?php echo $usuario['Usuario']['estado_civil']; ?></td>
    </tr>
    <tr>
        <th>setor</th>
        <td><?php echo $usuario['Usuario']['setor']; ?></td>
    </tr>
    <tr>
        <th>Cargo</th>
        <td><?php echo $usuario['Usuario']['cargo']; ?></td>
    </tr>
    <tr>
        <th>Já realizou atendimento psicológico</th>
        <td>
            <?php if($usuario['Usuario']['realizou_atendimento_psicologico'] == 1){?>
            <?php echo 'Sim'; ?>
            <?php }else{
                echo 'não';
            } ?>
        </td>
    </tr>
</table>

<?php $upsi = $this->Session->read('Auth.User.psicologo');
if($upsi == 0){ 
    echo $this->Html->link(
                    'Mudar Senha',
                    array('controller' => 'Usuarios', 'action' => 'novasenha', $this->Session->read('Auth.User.id'))
                );
}?>


<?php if($upsi == 1){ ?>
<table>
    <tr>
        <th>Data</th>
        <th>Comentário</th>
        <th>Comparecimento</th>
    </tr>
        <?php
        //echo debug($agendamentos);
            foreach($agendamentos as $agendamento):
                $date = new DateTime($agendamento['Agendamento']['data']);
                $date = $date->format('d/m/Y H:i:s');
        ?>
            <tr>
                <td><?php echo $date; ?></td>
                <td><?php echo $agendamento['Agendamento']['comentario']; ?></td>
                <td><?php if($agendamento['Agendamento']['comparecimento'] == 1){
                    echo "compareceu";
                }else{
                    echo "Faltou";
                }
                    ; ?></td>
        <?php
            endforeach;
        ?>
    
</table>
<table>
<table>
    <tr>
        <th>Id</th>
        <th>descricao</th>
        <th>Nova mensagem</th>
        <th>motivos</th>
        <th>Fechar solicitação</th>
<!--        <th>debug</th> -->
    </tr>
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
                echo $this->Html->link(
                    $solicitacao['Solicitacao']['id'],
                    array('controller' => 'Mensagens',
                        'action' => 'mensagemsalva', $solicitacao['Solicitacao']['id']));
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
<!--        <td><?php //debug($mot); ?></td> -->
    </tr>
<?php endforeach; ?>

</table>
<?php } ?>