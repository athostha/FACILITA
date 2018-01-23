<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Registrar Psicologo'); ?></legend>
        <?php echo $this->Form->input('nome');
        echo $this->Form->password('senha');
        echo $this->Form->input('matricula');
        echo $this->Form->input('email');
        echo $this->Form->input('telefone');
        echo $this->Form->input('sexo', array('options' => array('m' => 'masculino',
            'f' => 'feminino')));
        echo $this->Form->input('data_nascimento', array( 'label' => 'Data de nascimento', 
            'dateFormat' => 'DMY', 
            'minYear' => date('Y') - 70,
            'maxYear' => date('Y') - 18 ));
        echo $this->Form->input('estado_civil', array('options' => array('solteiro' => 'solteiro',
            'casado' => 'casado', 'viuvo' => 'viuvo')));
        echo $this->Form->input('setor');
        echo $this->Form->input('cargo');
        echo $this->Form->input('realizou_atendimento_psicologico', array('options' => array(1 => 'sim', 0 =>'não')));
        
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>