<?php
$data = $load_js;
if ($data['nofooter'] != 'nofooter') { ?>
    <!--begin::Footer-->
    <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
        <!--begin::Container-->
        <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2"><?= date('Y') ?> &copy;</span>
                <a href="#" target="_blank" class="text-black text-hover-primary">CRM Pvt. Ltd.</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Nav-->
            <div class="nav nav-dark order-1 order-md-2">
                <a href="#" class="nav-link pr-3 pl-0 text-muted text-hover-primary">About</a>
                <a href="#" class="nav-link px-3 text-muted text-hover-primary">Team</a>
                <a href="#" class="nav-link pl-3 pr-0 text-muted text-hover-primary">Contact</a>
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->

<?php } ?>
<!-- END: Footer-->

</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->

<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?= base_url() ?>assets/backend/plugins/global/plugins.bundle.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="<?= base_url() ?>assets/backend/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->


<!--begin::Page Scripts(used by this page)-->

<?php
if (!empty($data['template_js'])) {
    foreach ($data['template_js'] as $val) {
        echo '<script type="text/javascript" defer src="' . base_url($val) . '"></script>';
    }
}
?>
<!--end::Page Scripts-->


<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url();?>assets/backend/js/pages/widgets.js"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>