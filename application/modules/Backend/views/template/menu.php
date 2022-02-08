<?php
$userPermissionArr =  $this->session->userdata('permission');
?>
<script>
    var session_permission = [<?= implode(',',$userPermissionArr) ?>];
</script>
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed d-print-none">
    <!--begin::Logo-->
    <a href="index.html">
        <img alt="Logo" src="<?= base_url(); ?>assets/backend/media/logos/logo-light.png" />
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
            <span class="svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span> </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto " id="kt_brand">
                <!--begin::Logo-->
                <a href="index.html" class="brand-logo">
                    <img alt="Logo" src="<?= base_url(); ?>assets/backend/media/logos/logo-light.png" />
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                    <span class="svg-icon svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span> </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav ">
                        <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/dashboard'); ?>" class="menu-link "><span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span><span class="menu-text">Dashboard</span></a>
                        </li>

                        <?php
                        if (in_array(1, $userPermissionArr) || in_array(5, $userPermissionArr) || in_array(9, $userPermissionArr)) { ?>
                            <li class="menu-section">
                                <h4 class="menu-text">Buyers & Sellers</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                        <?php }

                        if (in_array(1, $userPermissionArr)) { ?>
                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/users'); ?>" class="menu-link ">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Users</span></a>
                            </li>
                        <?php
                        }
                        if (in_array(5, $userPermissionArr)) { ?>

                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/vendor'); ?>" class="menu-link ">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Box3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3" />
                                                <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Vendors</span></a>
                            </li>
                        <?php
                        }
                        if (in_array(9, $userPermissionArr)) { ?>
                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/customer'); ?>" class="menu-link ">
                                    <i class="menu-icon flaticon-users icon-lg"></i>
                                    <!--end::Svg Icon-->
                                    </span><span class="menu-text">Customers</span>
                                </a>
                            </li>
                        <?php }
                        if (in_array(13, $userPermissionArr) || in_array(17, $userPermissionArr) || in_array(21, $userPermissionArr)) { ?>
                            <li class="menu-section">
                                <h4 class="menu-text">Items Inventory</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                        <?php }
                        if (in_array(13, $userPermissionArr)) { ?>
                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/item'); ?>" class="menu-link ">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Gift.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000" />
                                                <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Items</span></a>
                            </li>
                        <?php
                        }
                        if (in_array(17, $userPermissionArr)) { ?>
                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/purchase'); ?>" class="menu-link ">
                                    <i class="menu-icon icon-md fas fa-cart-arrow-down"></i>
                                    <span class="menu-text"> Purchase</span></a>
                            </li>
                        <?php
                        }
                        if (in_array(21, $userPermissionArr)) { ?>
                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/sale'); ?>" class="menu-link ">
                                    <i class="menu-icon flaticon-coins icon-lg"></i>
                                    <span class="menu-text">Sale</span></a>
                            </li>
                        <?php
                        } ?>

                        <?php

                        if (in_array(25, $userPermissionArr)) { ?>

                            <li class="menu-section">
                                <h4 class="menu-text">Roles & Permissions</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('backend/role'); ?>" class="menu-link ">
                                    <i class="menu-icon flaticon-coins icon-lg"></i>
                                    <span class="menu-text">Role</span></a>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed d-print-none">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper"></div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <!--begin::User-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
                                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?= ucfirst($this->session->userdata('user_name')) ?></span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold"><?= ucfirst($this->session->userdata('user_name')[0]) ?></span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                                <!--begin::Header-->
                                <div class="d-flex align-items-center p-8 rounded-top">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
                                        <img src="<?= base_url(); ?>assets/backend/media/users/300_21.jpg" alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5"><?= ucfirst($this->session->userdata('user_name')) ?></div>
                                    <span class="label label-light-success label-lg font-weight-bold label-inline">3 messages</span>
                                    <!--end::Text-->
                                </div>
                                <div class="separator separator-solid"></div>
                                <!--end::Header-->
                                <!--begin::Nav-->
                                <div class="navi navi-spacer-x-0 pt-5">
                                    <!--begin::Item-->
                                    <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item px-8">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-calendar-3 text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    My Profile
                                                </div>
                                                <div class="text-muted">
                                                    Account settings and more
                                                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="custom/apps/user/profile-2.html" class="navi-item px-8">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-rocket-1 text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    My Activities
                                                </div>
                                                <div class="text-muted">
                                                    Logs and notifications
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="custom/apps/userprofile-1/overview.html" class="navi-item px-8">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-hourglass text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    My Tasks
                                                </div>
                                                <div class="text-muted">
                                                    latest tasks and projects
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Footer-->
                                    <div class="navi-separator mt-3"></div>
                                    <div class="navi-footer  px-8 py-5">
                                        <a href="<?= base_url(); ?><?= 'backend/Login/logout' ?>" class="btn btn-light-primary font-weight-bold">Sign Out</a>
                                    </div>
                                    <!--end::Footer-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Subheader-->
            <div class="subheader py-2 py-lg-4  subheader-solid d-print-none" id="kt_subheader">
                <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center flex-wrap mr-2">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            <?= ucfirst($load_css['site_title']); ?> </h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center">
                        <!--begin::Daterange-->
                        <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
                            <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
                            <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                        </a>
                        <!--end::Daterange-->
                    </div>
                    <!--end::Toolbar-->
                </div>
            </div>
            <!--end::Subheader-->