<?php
    $title = "::Design Studio::";
    $description = "";
    include('head.php');
?>
<!-- ========== Body Starts ========== -->
<body>
  <div class='root'>
    <!-- ========== Header Start ========== -->
    <!-- <div class="">
        <?php include('navbar.php') ?>
    </div> -->
    <!-- ========== Header End ========== -->
    <div class=''>
        <div class='d-flex vw-100'>
            <?php include('left-menu.php') ?>
            <?php include('canvas-area.php') ?>
        </div>
    </div>
  </div>
</body>
<?php include('footer.php') ?>