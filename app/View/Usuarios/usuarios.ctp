<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
<div>
<div class="container-fluid">

<div class="row">
                           <!-- column -->
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
                                  <table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
                                    <thead>
                                        <tr>
        <th>Editar</th>
        <th>Id</th>
        <th>Nome</th>
        <th>Matrícula</th>
        <th>telefone</th>
        <th>email</th>  
    </tr>
</thead>
<tbody>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($this->request); ?>
<?php if(isset($usuarios)) { ?>
<?php foreach ($usuarios as $usuario): ?>
<tr>
        <td>
            <?php /*echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-close text-danger','data-original-title'=>'Finalizar')),
                        array('action' => 'delete', $usuario['Usuario']['id']),
                        array('escape'=>false),
                        __('Are you sure?'),
                       array('class' => 'btn btn-mini')
                        ); */?>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-pencil text-inverse m-l-5')),
                array('action' => 'perfil', $usuario['Usuario']['id']),
                array('escape' => false)
            ); ?>
        </td>
        <td><?php echo $usuario['Usuario']['id']; ?></td>
        <td>
            <?php   echo $usuario['Usuario']['nome']
                /*echo $this->Html->link(
                    $usuario['Usuario']['nome'],
                    array('action' => 'perfil', $usuario['Usuario']['id'])
                );*/
            ?>
        </td>
        
        <td>
            <?php echo $usuario['Usuario']['matricula']; ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['telefone']; ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['email']; ?>
        </td>
        </tr>
<?php endforeach; ?>


</tbody>
</table>
</div>
</div>
</div>
</div>
<?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>
<?php } ?>
</div>   
</div>
</div>
    <div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Buscar Usuário</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                      <label class="control-label">Nome</label>
                                                          <?php echo $this->Form->create('buscar', array('url' => array('controller' => 'usuarios', 'action' => 'usuarios')));
    
                                                          echo $this->Form->input('Nome', array('label' => '','class'=>'form-control')); ?>
                                                      </div>
                                                    <div class="form-group">
                                                      <label class="control-label">Matricula</label>
                                                          <?php echo $this->Form->input('Matricula', array('label' => '','class'=>'form-control')); ?>
                                                      </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <?php echo $this->Form->button('Buscar', array('type'=>'submit', 'class'=>'btn waves-effect waves-light btn-danger pull-right'));
                                                echo $this->Form->end(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</body>