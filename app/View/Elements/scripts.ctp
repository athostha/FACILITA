    <?php echo $this->Html->script('../assets/plugins/jquery/jquery.min.js'); ?>
    <!-- Bootstrap tether Core JavaScript -->
    <?php echo $this->Html->script('../assets/plugins/bootstrap/js/tether.min.js'); ?>
    <?php echo $this->Html->script('../assets/plugins/popper/popper.min.js'); ?>
    <?php echo $this->Html->script('../assets/plugins/bootstrap/js/bootstrap.min.js'); ?>
    <!-- slimscrollbar scrollbar JavaScript -->
    <?php echo $this->Html->script('/js/jquery.slimscroll.js'); ?>
    <!--Wave Effects -->
    <?php echo $this->Html->script('/js/waves.js'); ?>
    <!--Menu sidebar -->
    <?php echo $this->Html->script('/js/sidebarmenu.js'); ?>
    <!--stickey kit -->
    <?php echo $this->Html->script('../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>
    <?php echo $this->Html->script('../assets/plugins/sparkline/jquery.sparkline.min.js'); ?>
     <!-- Footable -->
    <?php echo $this->Html->script('../assets/plugins/footable/js/footable.all.min.js'); ?>
    <!--FooTable init-->
    <?php echo $this->Html->script('/js/footable-init.js'); ?>
    <!--Custom JavaScript -->
    <?php echo $this->Html->script('/js/custom.min.js'); ?>
    <?php echo $this->Html->script('/js/chat.js'); ?>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <<?php echo $this->Html->script('../assets/plugins/styleswitcher/jQuery.style.switcher.js'); ?>
    <!-- Sweet-Alert  -->
    <?php echo $this->Html->script('../assets/plugins/sweetalert/sweetalert.min.js'); ?>
    <?php echo $this->Html->script('../assets/plugins/sweetalert/jquery.sweet-alert.custom.js'); ?>
    <!-- Select page plugins -->
    <!-- ============================================================== -->
    <?php echo $this->Html->script('/assets/plugins/switchery/dist/switchery.min'); ?>
    <?php echo $this->Html->script('/assets/plugins/select2/dist/js/select2.full.min.js'); ?>
    <?php echo $this->Html->script('/assets/plugins/bootstrap-select/bootstrap-select.min'); ?>
    <?php echo $this->Html->script('/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min'); ?>
    <?php echo $this->Html->script('/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin'); ?>
    <?php echo $this->Html->script('/assets/plugins/multiselect/js/jquery.multi-select'); ?>
    <script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
$(document).ready(function(){    
    
    $('#contact').submit(function(){
        
        // see if selectone is even being used
        var boxes = document.getElementById("MotivoMotivo").selectedIndex;
        var x = document.getElementById("motivo_outros").value.length;
        if(boxes != -1 || x > 0) {
            return true;
        } else {
            alert('Você deve escolher pelo menos um motivo');
            return false;
        }
        //form.submit();       
        
    });
    
});
    </script>
 <!--
$(document).ready(function(){    
    
    $('#contact').submit(function(){
        
        // see if selectone is even being used
        var boxes = $(":checkbox:checked");
        if(boxes.length > 0) {
            return true;
        } else {
            alert('Você deve escolher pelo menos um motivo');
            return false;
        }
        //form.submit();       
        
    });
    
});
-->
    
    