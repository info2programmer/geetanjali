<?php $site_setting = $this->db->query("select * from td_site_settings")->row(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $head; ?>
</head>
<body class="sidebar-mini fixed">
<div class="loader-bg">
    <div class="loader-bar">
    </div>
</div>
<div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
  </div> -->
    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        <?php echo $header; ?>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print ">
        <?php echo $left_sidebar; ?>
    </aside>

    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <?php echo $maincontent; ?>
        <!-- Container-fluid ends -->
    </div>
</div>

<!-- Required Jqurey -->
<script src="<?php echo base_url(); ?>material/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="<?php echo base_url(); ?>material/assets/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="<?php echo base_url(); ?>material/assets/plugins/waves/js/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="<?php echo base_url(); ?>material/assets/plugins/slimscroll/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/slimscroll/js/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="<?php echo base_url(); ?>material/assets/plugins/search/js/classie.js"></script>

<!-- notification -->
<script src="<?php echo base_url(); ?>material/assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- data-table js -->
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/data-table/js/responsive.bootstrap4.min.js"></script>

<!-- Sparkline charts -->
<script src="<?php echo base_url(); ?>material/assets/plugins/charts/sparkline/js/jquery.sparkline.js"></script>

<!-- Counter js  -->
<script src="<?php echo base_url(); ?>material/assets/plugins/countdown/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/countdown/js/jquery.counterup.js"></script>

<!--form validation Custom js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<!--<script src="<?php echo base_url(); ?>material/assets/plugins/forms-wizard-validation/js/validate.js"></script>-->

<!-- Date picker.js -->
<script src="<?php echo base_url(); ?>material/assets/plugins/datepicker/js/moment-with-locales.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/datepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Highliter js -->
<script type="text/javascript" src="<?php echo base_url(); ?>material/assets/plugins/highlighter/js/shCore.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>material/assets/plugins/highlighter/js/shBrushJScript.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>material/assets/plugins/highlighter/js/shBrushXml.js"></script>
<script type="text/javascript">SyntaxHighlighter.all();</script>
<!-- Morris Chart js -->
<script src="<?php echo base_url(); ?>material/assets/plugins/charts/morris/js/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>material/assets/plugins/charts/morris/js/morris.js"></script>
<!-- Chart js -->

<script src="<?php echo base_url(); ?>material/assets/plugins/charts/chart/js/Chart.js"></script>


<!--<script src="<?php echo base_url(); ?>material/assets/pages/form-validation.js"></script>-->
<script src="<?php echo base_url(); ?>material/assets/pages/data-table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>material/assets/pages/dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>material/assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>material/assets/pages/material-icon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>material/assets/pages/elements.js"></script>
<script src="<?php echo base_url(); ?>material/assets/js/menu.js"></script>
<script src="<?php echo base_url(); ?>material/assets/js/valid8.js"></script>

</body>

</html>
