<table>
    <?php echo $this->Form->create('Usuario'); ?>
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
</table>
<?php echo $this->Form->end(__('Submit')); ?>