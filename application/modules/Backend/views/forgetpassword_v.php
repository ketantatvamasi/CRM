<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-1 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="login-logo text-center pt-lg-25 pb-10">
                    Put image here
                </a>
                <!--end::Aside header-->

                <!--begin::Aside Title-->
                <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">
                    Line 1<br />
                    Line 2
                </h3>
                <!--end::Aside Title-->
            </div>
            <!--end::Aside Top-->

            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-position-y: calc(100% ); background-image: url(<?= base_url(); ?>assets/backend/media/svg/illustrations/login-visual-5.svg)">
            </div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->

        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column p-10">


            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                <!--begin::Forgot-->
                <div class="login-form" id="login_form">
                    <!--begin::Form-->
                    <form class="form" id="forgot_form" action="" method="post">
                        <!--begin::Title-->
                        <div class="pb-5">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Forgotten Password ?</h3>
                            <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                        </div>
                        <!--end::Title-->

                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                            <input class="form-control h-auto py-4 px-6 rounded-lg border-0" type="email" name="email" id="email" placeholder="Email" autocomplete="off" />
                        </div>
                        <!--end::Form group-->

                        <!--begin::Form group-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Send OTP</button>
                            <a href="<?= base_url('backend/login'); ?>" id="forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                        </div>
                        <!--end::Form group-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Forgot-->

                <div class="login-form d-none" id="login_form_verify_OTP">
                    <!--begin::Form-->
                    <form class="form" id="forgot_form_otp" action="" method="post">
                        <!--begin::Title-->
                        <div class="pb-5">
                            <h4 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Verify OTP</h4>
                        </div>
                        <!--end::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">One Time Password</label>
                            <input class="form-control h-auto py-4 px-6 rounded-lg border-0" type="text" placeholder="Enter OTP" name="otp" id="otp" autocomplete="off" />
                        </div>
                        <!--end::Form group-->

                        <!--begin::Form group-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="forgot_form_submit_button_otp" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Submit</button>
                            <a href="<?= base_url('backend/forgetpassword'); ?>" id="forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                        </div>
                        <!--end::Form group-->
                    </form>
                    <!--end::Form-->
                </div>

                <div class="login-form d-none" id="login_form_setpassword">
                    <!--begin::Form-->
                    <form class="form" id="forgot_form_password" action="" method="post">
                        <!--begin::Title-->
                        <div class="pb-5">
                            <h4 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Set password</h4>
                        </div>
                        <!--end::Title-->

                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">New Password</label>
                            <input class="form-control h-auto py-4 px-6 rounded-lg border-0" id="set_pass" name="set_pass" type="password" placeholder="New password" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Confirm Password</label>
                            <input class="form-control h-auto py-4 px-6 rounded-lg border-0" id="confirm_set_pass" name="confirm_set_pass" type="password" placeholder="Confirm Password" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="forgot_form_submit_button_setpassword" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Submit</button>
                            <a href="<?= base_url('backend/forgetpassword'); ?>" id="forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                        </div>
                        <!--end::Form group-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->