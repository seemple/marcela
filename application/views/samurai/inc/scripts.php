    <!-- Plugins -->
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/libs/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/jquery.tools.min.js"></script>
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/libs/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/libs/jquery.mousewheel.js"></script>
    <!-- Custom -->
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/scripts.js"></script>

    <!-- For This Page Only  -->
    <script type="text/javascript">
        // Menu Active Page Link
        $('.menu-left > li > a:eq(3)').addClass('active');

        // Other Stuff
        Init<?php echo ucFirst($init);?>();
    </script>
