<body class="modal-open">

     <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-color: #eef5f9;">        
            <div class="login-box m-b-20"><img class="logo" src="../assets/images/logo-facilita-color.png" alt="logo" />  
            </div>
            <div class="login-box card">
                <div class="card-body">
                        <h3 class="box-title m-b-20">Acesse o Sistema</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label class="control-label">Matricula</label>

<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('Usuario'); ?>
        <?php echo $this->Form->input('matricula', array('class'=>'form-control', 'label'=>'')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                            <label class="control-label">Senha</label>
    <?php    echo $this->Form->password('senha', array('class'=>'form-control', 'label'=>''));?>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
<?php echo $this->Form->button('Entrar', array('class'=>'btn btn-semas btn-lg btn-block text-uppercase waves-effect waves-light', 'type'=>'submit')); ?>
<?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    
                        <div class="form-group m-b-0" style="font-size: 13px;">
                            <div class="col-sm-12 text-center">
                                
                                <p>  Ainda não possui acesso? <?php echo $this->Html->link(
        'Cadastre-se!',
        array('controller' => 'usuarios', 'action' => 'cadastro'), array('class'=>'text-info m-l-5')
); ?><br>
                                <!-- <a href="#" class="text-info"><i class="fa fa-lock m-r-5"></i><b>Esqueceu sua senha?</b></a> -->
                                </p>
                            </div>
                        </div>
                </div>

            </div>
            
            <div class="login-box m-t-40" style="font-size: 13px; text-align:center">
                 <p>SEMAS - Secretaria de Estado de Meio Ambiente e Sustentabilidade © 2018. <br>
                Coordenadoria de Gestão de Pessoal (CGP): 3184-3370
                </p>
            </div>

        </div>

        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->         
          
    
    <!-- All Jquery -->
    <?php include ROOT ."\app\View\Elements\scripts.ctp"; ?>  

    <script language="javascript">
        function check(form)/*function to check userid & password*/
        {
         /*the following code checkes whether the entered userid and password are matching*/
         if(form.matricula.value == "111111" && form.senha.value == "111111")
          {
            window.open('index2.php');/*opens the target page while Id & password matches*/
          } 

          if(form.matricula.value == "222222" && form.senha.value == "222222") {
            window.open('index.php');/*opens the target page while Id & password matches*/
          }

         else
         {
           alert("Matrícula ou Senha Incorreta!")/*displays error message*/
          }
        }
    </script>



</body>
