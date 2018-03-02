<table>
<?php echo $this->Form->create('Usuario', array('url' => array('action' => 'registro'), 'enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <tr>
            <th>
        <legend><?php echo __('Registrar Usuário'); ?></legend>
            </th>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('nome'); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('matricula'); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('senha', array(
            'label' => 'Senha',
            'type' => 'password')); ?>
            </td>
            <td>
        <?php echo $this->Form->input('confirm_password',array(
            'label' => 'Confirmação de senha',
            'type'  =>  'password')); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('email'); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('telefone'); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('sexo', array('options' => array('m' => 'masculino',
            'f' => 'feminino'))); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('data_nascimento', array( 'label' => 'Data de nascimento', 
            'dateFormat' => 'DMY', 
            'minYear' => date('Y') - 70,
            'maxYear' => date('Y') - 18 )); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('estado_civil', array('options' => array('solteiro' => 'solteiro',
            'casado' => 'casado', 'viuvo' => 'viúvo'))); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('setor'); ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php echo $this->Form->input('cargo'); ?>
            </td>
        </tr>
        <tr>
        
            <td>
        <?php echo $this->Form->input('realizou_atendimento_psicologico', array('options' => array(1 => 'sim', 0 =>'não')));?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</table>