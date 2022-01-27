"use strict";

// Class Definition
var KTLogin = function () {
    var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
    var _handleFormForgot = function () {
        var form = KTUtil.getById('forgot_form');

        if (!form) {
            return;
        }

        FormValidation
            .formValidation(
                form,
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                            //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
                        })
                    }
                }
            )
    }

    var _handleFormForgototp = function () {
        var form = KTUtil.getById('forgot_form_otp');

        if (!form) {
            return;
        }

        FormValidation
            .formValidation(
                form,
                {
                    fields: {
                        otp: {
                            validators: {
                                notEmpty: {
                                    message: 'OTP is required'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                            //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
                        })
                    }
                }
            )

    }

    var _handleFormForgotpassword = function () {
        var form = KTUtil.getById('forgot_form_password');
        if (!form) {
            return;
        }

        FormValidation
            .formValidation(
                form,
                {
                    fields: {
                        set_pass: {
                            validators: {
                                notEmpty: {
                                    message: 'New password is required'
                                }
                            }
                        },
                        confirm_set_pass: {
                            validators: {
                                notEmpty: {
                                    message: 'confirm password is required'
                                }
                            }
                        }
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                            //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
                        }),
                    }
                }
            )

    }

    // Public Functions
    return {
        init: function () {
            _handleFormForgot();
            _handleFormForgototp();
            _handleFormForgotpassword();
        }
    };
}();

jQuery(document).ready(function () {
    KTLogin.init();
});
$(document).on("click", "#forgot_form_submit_button", function (e) {
    e.preventDefault();
    var email = $('#email').val();
    $.ajax({
        type: 'POST',
        url: baseFolder + 'ForgetPassword/check_email',
        data: { email: email },
        dataType: "json",
        beforeSend: function () {
            $("#forgot_form_submit_button").prop('disabled', true);
            $("#forgot_form_submit_button").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
        },
        success: function (data) {
           
            if (data.status == "success") {
                var user_id = data.check_email.user_id;
                // console.log(data.check_email.user_id);
                $.ajax({
                    url: baseFolder + 'ForgetPassword/for_send_otp',
                    type: "post",
                    dataType: "json",
                    data: { email: email },
                    success: function (data) {
                        // console.log(data);
                        if (data.status == "success") {
                            toastr.success(data.msg);
                            $('#login_form').addClass('d-none');
                            $('#login_form_verify_OTP').removeClass('d-none');

                            $(document).on('click', '#forgot_form_submit_button_otp', function () {
                                var fill_otp = $('#otp').val();
                                if (data.otp == fill_otp) {
                                    $('#login_form_verify_OTP').addClass('d-none');
                                    $('#login_form_setpassword').removeClass('d-none');

                                    $(document).on("click", "#forgot_form_submit_button_setpassword", function () {
                                        var set_pass = $('#set_pass').val();
                                        var con_set_pass = $('#confirm_set_pass').val();
                                        if (set_pass != con_set_pass) {
                                            toastr.warning('Password Miss Match');
                                        } else {
                                            $.ajax({
                                                url: baseFolder + 'ForgetPassword/forget_pass',
                                                type: "post",
                                                dataType: "json",
                                                data: {
                                                    user_id: user_id,
                                                    password: set_pass,
                                                },
                                                beforeSend: function () {
                                                    $("#forgot_form_submit_button_setpassword").prop('disabled', true);
                                                    $("#forgot_form_submit_button_setpassword").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
                                                },
                                                success: function (data) {
                                                    // console.log(data); 
                                                    if (data.status == "success") {
                                                        toastr.success(data.msg);
                                                        setInterval(function () {
                                                            window.location.href = baseFolder + "login";
                                                        }, 1000);
                                                    } else {
                                                        toastr.error(data.msg);
                                                    }
                                                }
                                            });
                                        }
                                    });
                                } else {
                                    toastr.error('Invalid OTP');
                                }
                            });
                        } else {
                            toastr.error(data.msg);
                        }
                    }
                });
            } else {
                toastr.error(data.msg);
            }
        }
    });
});