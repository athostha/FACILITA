<script>
$(document).ready(function(){    
    
    $('#contact').submit(function(){
        
        // see if selectone is even being used
        var boxes = $(":checkbox:checked");
        if(boxes.length > 0) {
            return true;
        } else {
            alert('Você deve escolher pelo menos um motivo');
            return false;
        }
        //form.submit();       
        
    });
    
});
</script>

<?php  //echo debug($this->request->data); ?>
<h1>Solicitação</h1>
<?php echo $this->Form->create('Solicitacao', array('id' => 'contact')); ?>
<?php echo $this->Form->input('Solicitacao.descricao', array('rows' => '3'));?>
 <table>
    <tr><th>Motivos</th></tr>
<?php foreach ($motivos as $motivo): {?>
<tr>
<td><?php echo $motivo['Motivo']['motivo'];
    echo $this->Form->checkbox('Motivo.Motivo.',
            array('hiddenField' => false, 'value' => $motivo['Motivo']['id'])); ?>
</tr>
<?php    } endforeach; ?>
</table>
<?php echo $this->Form->input('Solicitacao.motivo_outros');?>
<?php echo $this->Form->end('Registrar Demanda');
?>
