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