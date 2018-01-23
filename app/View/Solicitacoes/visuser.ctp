<h1>Olá <?php echo $uid = $this->Session->read('Auth.User.id'); ?></h1>
<?php //debug($_SESSION); ?>
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
            <?php foreach ($solicitacao['Motivo'] as $mot): ?>
            <?php echo $mot['motivo']; ?>
            <?php endforeach; ?>

        </td>
        
        <td>
            <?php echo $solicitacao['Usuario']['nome']; ?>   
        </td>
<!--        <td><?php //debug($mot); ?></td> -->
    </tr>
<?php endforeach; ?>

</table>