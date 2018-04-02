<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <div>
           <div class="container-fluid">
<div class="row">
                    <div class="col-12">
                      <div class="card">
                            <div class="card-block">
                                    <div class="form-body">
                                        <h3 class="card-title">Dados Pessoais</h3>
                                        <hr>
<?php echo $this->Form->create('Usuario'); ?>
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Nome</label>
        <?php echo $this->Form->input('nome', array('label' => '','class'=>'form-control')); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Data de Nascimento</label>
        <?php echo $this->Form->date('data_nascimento', array( 'label' => '', 
            'dateFormat' => 'DMY', 
            'minYear' => date('Y') - 70,
            'maxYear' => date('Y') - 18,
                'class'=>'form-control')); ?> 
        </div>
    </div>
</div>
<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <div class="input-group">
            <div class="input-group-addon"><i class="ti-email"></i></div>
        <?php echo $this->Form->email('email', array('label' => '','class'=>'form-control', 'id'=>'exampleInputEmail1')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Telefone</label>
        <?php echo $this->Form->input('telefone',array('label' => '','class'=>'form-control')); ?>
        </div>
    </div>
</div>
<h3 class="box-title m-t-40">Dados Funcionais</h3>
<hr>
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Matricula</label>
        <?php echo $this->Form->input('matricula',array('label' => '','class'=>'form-control')); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Cargo</label>
        <?php echo $this->Form->input('cargo',array('label' => '','class'=>'form-control')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Setor</label>
        <?php echo $this->Form->input('setor',array('label' => '','class'=>'form-control')); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Finalizar</label>
        <div class="form-actions">
            <?php echo $this->Form->button('<i class="fa fa-check"></i> Salvar', array('type'=>'submit', 'class'=>'btn btn-info')); ?>
            <?php echo $this->Form->end(); ?>
            <a href="/facilita/Solicitacoes/index" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
        </div>
        </div>
    </div>
</div>

</div>
</div>   
</div>
                      <div class="card">
                            <div class="card-block">
                                    <div class="form-body">
                                        
                                        <h3 class="card-title">Mudar Senha</h3>
                                        <hr>
    <?php echo $this->Form->create('Usuario'); ?>
 <div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="pwd1">Senha</label>
<?php echo $this->Form->input('senha', array(
            'type' => 'password','label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pwd2">Confirmar Senha</label>
<?php echo $this->Form->input('confirm_password',array(
            'type'  =>  'password','label' => '','class'=>'form-control')); ?>
                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                </div>
                            </div>
 </div>
<div class="form-actions">
<?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')); ?>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
    <div class="card-body"><h3 class="card-title">Mudar Foto</h3>
        <hr><div class="row">
                         <div class="col-md-4">
                             <div class="form-group"><?php echo $this->Form->create('Usuario', array('type'=>'post','enctype' => 'multipart/form-data')); ?>
                <?php echo $this->Form->input('upload', array('type' => 'file')); ?>
                         </div>
        </div><div class="col-md-4">
                             <div class="form-group">
                <?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')); ?>
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
</div>
</body>