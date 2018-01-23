<?php echo $this->Html->link(
        'Registrar usuário',
        array('controller' => 'usuarios', 'action' => 'registro')
); ?>
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend>
            <?php echo __('Acesso ao Sistema'); ?>
        </legend>
        <?php echo $this->Form->input('matricula');
        echo $this->Form->password('senha');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
