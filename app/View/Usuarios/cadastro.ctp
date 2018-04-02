<body class="modal-open">
     <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-color: #eef5f9; padding: 3% 0">        
        <div class="login-box m-b-20" style="width:950px;"><img class="logo" src="../assets/images/logo-facilita-color.png" alt="logo" />  
        </div>
        <div class="login-box card" style="width:950px;">
            <div class="card-body">
                   <h3 class="box-title m-b-20">Cadastro no Sistema</h3>
                   <hr>  
                   <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nome</label>
<?php echo $this->Form->create('Usuario', array('url' => array('action' => 'cadastro'))); ?>
<?php echo $this->Form->input('nome', array('label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Data de Nascimento</label>
<?php echo $this->Form->date('data_nascimento', array( 'label' => '', 'class'=>'form-control',
            'dateFormat' => 'DMY', 
            'minYear' => date('Y') - 70,
            'maxYear' => date('Y') - 18)
            ); ?>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Estado Civil</label>
<?php echo $this->Form->input('estado_civil',array('label' => '','class'=>'form-control','options' => array('solteiro' => 'solteiro',
            'casado' => 'casado', 'viuvo' => 'viúvo'))); ?>
                            </div>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Sexo</label>
<?php echo $this->Form->input('sexo', array('options' => array('m' => 'masculino',
            'f' => 'feminino'),'label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
        <?php echo $this->Form->email('email', array('label' => '','class'=>'form-control', 'id'=>'exampleInputEmail1')); ?>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Telefone</label>
<?php echo $this->Form->input('telefone',array('label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <!--/span-->
                    </div>   
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Matrícula</label>
<?php echo $this->Form->input('matricula',array('label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cargo</label>
<?php echo $this->Form->input('cargo',array('label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Setor</label>
<?php echo $this->Form->input('setor',array('label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                    </div>
<div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="pwd1">Senha</label>
<?php echo $this->Form->input('senha', array(
            'label' => 'Senha',
            'type' => 'password','label' => '','class'=>'form-control')); ?>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pwd2">Confirmar Senha</label>
<?php echo $this->Form->input('confirm_password',array(
            'label' => 'Confirmação de senha',
            'type'  =>  'password','label' => '','class'=>'form-control')); ?>
                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pwd2">Atendimentos Anteriores</label>
<?php echo $this->Form->input('realizou_atendimento_psicologico', array('options' => array(1 => 'Já realizei atendimento psicológico', 0 =>'Nunca realizei atendimento psicológico'),'label' => '','class'=>'form-control'));?>
                                </div>
                            </div>
                        <!--/span-->
                        <div class="form-actions">
<?php echo $this->Form->button('<i class="fa fa-check"></i>Salvar', array('class'=>'btn btn-info')); ?>
<?php echo $this->Form->end(); ?>
<a href="login" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
                    </div>               
            </div>
          </div>
        </div>
           <div class="login-box m-t-40" style="width:950px;font-size: 13px; text-align:center">
                <p>SEMAS - Secretaria de Estado de Meio Ambiente e Sustentabilidade © 2018. <br>
                Coordenadoria de Gestão de Pessoal (CGP): 3184-3370
                </p>

            </div>

        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->         
          
    
    <!-- All Jquery -->


</body>