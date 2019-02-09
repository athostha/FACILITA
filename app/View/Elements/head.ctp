<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>FACILITA - Atendimento Psicológico</title>
    <!-- Bootstrap Core CSS -->
    <?php
    echo $this->Html->meta('favicon.png','assets/images/favicon.png',array('type' => 'icon'));
    ?>
    <?php 
    echo $this->Html->css('/assets/plugins/bootstrap/css/bootstrap.min');    
    ?>
    <!--alerts CSS -->
    <?php
    echo $this->Html->css('/assets/plugins/sweetalert/sweetalert');
    
    ?>
    <!-- Select CSS -->
    <?php
    echo $this->Html->css('/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min');
    echo $this->Html->css('/assets/plugins/select2/dist/css/select2.min');//\assets\plugins\select2\dist\css
    echo $this->Html->css('/assets/plugins/switchery/dist/switchery.min');
    echo $this->Html->css('/assets/plugins/bootstrap-select/bootstrap-select.min');
    echo $this->Html->css('/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput');
    echo $this->Html->css('/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min');
    echo $this->Html->css('/assets/plugins/multiselect/css/multi-select');
    ?>
    <!-- Footable CSS -->
    <?php
    echo $this->Html->css('/assets/plugins/footable/css/footable.core');
    ?>
    <!-- Custom CSS -->
    <?php
    echo $this->Html->css('style');
    ?>
    <!-- You can change the theme colors from here -->
    <?php
    echo $this->Html->css('colors/semas');
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->