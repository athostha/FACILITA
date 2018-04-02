<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'facilita - Atendimento Psicológico' ?>
	</title>
	<?php		              
                echo $this->element('head');
                echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');  
	?>
</head>

<body class="fix-header fix-sidebar card-no-border">

    <?php echo $this->element('preloader'); ?>  
<?php if(null !==($this->Session->read('Auth.User'))){ ?>
    <div id="main-wrapper">
 
       <?php echo $this->element('header'); ?>  
    
        <!-- Menu Esquerdo Left Sidebar - style you can find in sidebar.scss  -->
        <?php echo $this->element('menu'); ?>  
     
        <div class="page-wrapper">
     
           <div class="container-fluid">
                <?php //echo debug($this->params); ?>
                <!-- Caminho de Pao -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <?php if($this->request->here !== '/facilita/Solicitacoes/index'){ ?>
                        <h3 class="text-megna m-b-0 m-t-0"><?php echo $this->params['action'] ?></h3>
                        <?php }else{ ?>
                        <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Principal'; ?></h3>
                        <?php } ?>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/facilita\Solicitacoes\index">Home</a></li>
                            <?php if($this->request->here !== '/facilita/Solicitacoes/index'){ ?>
                            <li class="breadcrumb-item active"><?php echo $this->params['action'] ?></li>
                            <?php } ?>
                        </ol>
                        
                    </div>
<?php if($this->Session->read('Auth.User.psicologo')==0){ ?>
                <div class="col-md-7 col-4 align-self-center">
                <a href="/facilita/Solicitacoes/novoatendimento/" class="btn waves-effect waves-light btn-danger pull-right"><i class="fa fa-plus-circle"></i>Novo Atendimento</a>
                </div>
<?php } ?>
<?php if($this->params['action']=='gerenciarmotivos'){ ?>
    <div class="col-md-7 col-4 align-self-center">
    <button class="btn waves-effect waves-light btn-danger pull-right" type="button" data-toggle="modal" data-target="#modalAgenda" data-whatever="@agenda">
    <span class="btn-label"><i class="fa fa-plus-circle"></i></span>Novo Motivo</button></div>
<?php } ?>
<?php if($this->params['action']=='usuarios'){ ?>
    <div class="col-md-7 col-4 align-self-center">
    <button class="btn waves-effect waves-light btn-danger pull-right" type="button" data-toggle="modal" data-target="#modalAgenda" data-whatever="@agenda">
    Buscar Usuário</button></div>
<?php } ?>

                </div>
               
          <!-- Start Page Content -->
          <div class="row">
                 <?php echo $this->fetch('content'); ?>  
          </div>

            </div>
         
            <!-- footer -->
            <?php echo $this->element('footer'); ?>  
          <?php }else{ ?>
          <?php echo $this->fetch('content');} ?>
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    
    <!-- All Jquery -->
    <?php echo $this->element('scripts'); ?>  


</body>

</html>

