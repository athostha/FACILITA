<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
<div>
<div class="container-fluid">
<?php  //echo debug($this->request->data); ?>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
<?php echo $this->Form->create('Solicitacao', array('id' => 'contact')); ?>
<label class="control-label">Descrição</label>
<?php echo $this->Form->input('Solicitacao.descricao', array('rows' => '5', 'label' => '','class'=>'form-control'));?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Motivos</label>
                                            <?php $options = array() ?>
                                            <?php foreach($motivos as $motivo): ?>
                                            <?php $options[$motivo['Motivo']['id']] = $motivo['Motivo']['motivo']; ?>
                                            <!--/span-->
                                            <?php endforeach; ?>
                                            <?php //echo debug($motivo['Motivo']) ?>
                                            <?php echo $this->Form->input('Motivos', array('type'=>'select','options' => $options, 'class'=>'select2 m-b-10 select2-multiple','label'=>'','hiddenField' => false, 'type'=>'select', 'style'=>'width: 100%', 'multiple'=>'multiple', 'data-placeholder'=>'Selecione um ou mais', 'id'=>'MotivoMotivo')); ?>
                                            <!--
                                  					      <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Selecione um ou mais">
							                                        <option value="AK">Problemas no trabalho</option>
							                                        <option value="HI">Luto</option>
							                                        <option value="AL">Dificuldade de ambientação</option>
							                                        <option value="AR">Problemas de saúde</option>
							                                        <option value="IL">Problemas interpessoais</option>
							                                        <option value="IA">Problemas pessoais</option>
							                                        <option value="KS">Visita técnica</option>
							                                </select>	-->
									            </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Outro(s) motivo(s) não listado(s) acima</label>
<?php echo $this->Form->input('Solicitacao.motivo_outros', array('label'=>'','class'=>"form-control", 'rows'=>'5', 'id'=>'motivo_outros'));?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>   
<div class="form-actions">
<?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')) ?>
<?php echo $this->Form->end();?>
    <a href="index.php" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
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