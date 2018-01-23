<?php //debug($descricaosolicitacao); ?>
<table>
    <tr>
        <th>Solicitacao</th>
    </tr>
    <tr>
        <td><?php echo $descricaosolicitacao['Solicitacao']['descricao'] ?></td>
    </tr>
</table>
<table>
    <tr>
        <th>Mensagem</th>
        <th>Autor</th>
    </tr>
    <?php foreach ($mensagens as $mensagem): ?>
    <?php //debug($mensagem); ?>
    <tr>
        <td><?php echo $mensagem['Mensagem']['conteudo']; ?></td>
        <td><?php echo $mensagem['Usuario']['nome']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>