<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title><?= ucfirst($load_css['site_title']) . " - " . ucfirst($load_css['sitename']) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->


    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?= base_url() ?>assets/backend/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url() ?>assets/backend/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/backend/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/backend/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="<?= base_url() ?>assets/backend/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/backend/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/backend/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/backend/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    
    <!--begin::Page css(used by this page)-->

    <?php
      if(!empty($load_css['template_css'])){
          foreach($load_css['template_css'] as $val){
              echo link_tag($val,$rel = 'stylesheet',$type = 'text/css');
          }
      }
    ?>
    <!--end::Page css-->

    <!-- Web Tab Icon setting path -->
    <!-- <link rel="shortcut icon" href="assets/backend/media/logos/favicon.ico" /> -->
    <script>
        var baseUrl = '<?= base_url() ?>';
        var baseFolder = '<?= base_url('backend/') ?>';
    </script>

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">