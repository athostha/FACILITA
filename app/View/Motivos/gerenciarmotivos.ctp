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
                                            <th data-toggle="true"> Ações </th>
                                            <th> Id</th>
                                            <th>Motivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php foreach($motivs as $motivo): ?>
    <tr>
        <?php //echo debug($motivo); ?>
    
    <td>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-close text-danger','data-original-title'=>'Finalizar', 'title' => 'Excluir Motivo')),
                        array('action' => 'delete', $motivo['Motivo']['id']),
                        array('escape'=>false),
                        __('Você realmente deseja deletar este motivo?'),
                       array('class' => 'btn btn-mini')
                        ); ?></td>
    <td><?php echo $motivo['Motivo']['id']; ?></td>
    <td><?php echo $motivo['Motivo']['motivo']; ?></td>
    </tr>
<?php endforeach; ?>
                                    </tbody>
                                </table>        
                               </div>
                           </div>
                       </div>
                       <!-- column -->
                
</br>

<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Novo Motivo</h4>
                                                <?php echo $this->Form->create('Motivo', array('type' => 'post')); ?>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                      <label class="control-label">Motivo</label>
                                                      <?php echo $this->Form->input('Motivo.motivo', array(
                                                        'label' => '',
                                                        'class' => 'form-control'
                                                        ));?>
                                                      </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <?php echo $this->Form->button('Novo Motivo', array('type'=>'submit', 'class'=>'btn waves-effect waves-light btn-danger pull-right')); ?>
                                                <?php echo $this->Form->end(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</div>
</div>
</div>
</div>
</body>
