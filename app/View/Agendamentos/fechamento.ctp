<?php 
echo $this->Form->create('Agendamento', array(
    'onsubmit' => "return confirm(\"Are you sure?\");",
    'label' => 'Fechar Agendamento'
));
?>
<?php echo $this->Form->input('comentario', array('rows' => 3)); ?>
<?php echo $this->Form->input('comparecimento', array('options' => array(1 => 'compareceu', 0 =>'faltou')));?>
<?php echo $this->Form->end(__('Finalizar')); ?>