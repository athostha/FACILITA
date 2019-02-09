<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
<div>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="modal-title">Finalizar Agendamento</h4>
<?php echo $this->Form->create('Agendamento', array(
    'onsubmit' => "return confirm(\"Você realmente deseja finalizar este agendamento?\");",
    'label' => 'Fechar Agendamento'
)); ?>
                                                </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                      <label class="control-label">Comentário</label>
                                                      <?php echo $this->Form->input('comentario', array('label' => '','rows' => 3, 'class' =>'form-control')); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Presença</label>
                                                        <?php echo $this->Form->input('comparecimento', array('label' => '','options' => array(1 => 'compareceu', 0 =>'faltou'), 'class' =>'form-control'));?>
                                                    </div>
<!--
                                                    <div class="form-group">
                                                        <label class="control-label">Local:</label>
                                                        <input type="text" class="form-control" id="local">
                                                    </div> -->
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <?php echo $this->Form->button('Finalizar', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
                                                <?php echo $this->Form->end();?>
                        </div>
                </div>

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