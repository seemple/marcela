<!DOCTYPE html>
<html lang="en-US" class="homepage">
<?php echo $this->load->get_section('header'); ?>
<body>
    <!-- Page Loading Animation #ID -->
    <div id="loading"></div>
    <?php echo $output;?>
    <?php echo $this->load->get_section('menu'); ?>
    <?php echo $this->load->get_section('footer'); ?>
    <!-- Scripts -->
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/libs/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/libs/jquery.flexslider-min.js"></script>

    <!-- Custom -->
    <script src="<?php echo base_url("assets/themes/samurai");?>/js/scripts.js"></script>

    <!-- For This Page Only  -->
    <script type="text/javascript">
        // Menu Active Page Link
        $('.menu-left > li > a:eq(3)').addClass('active');

        // Other Stuff
        InitHome();
    </script>
</body>
</html>
