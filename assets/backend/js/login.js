"use strict";

// Class Definition
var KTLogin = function () {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignin = function () {
		var form = KTUtil.getById('login_singin_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('login_singin_form_submit_button');

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
						},
						password: {
							validators: {
								notEmpty: {
									message: 'Password is required'
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
			.on('core.form.valid', function () {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

				// Simulate Ajax request
				setTimeout(function () {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);


				$.ajax({
					type: 'POST',
					url: baseFolder + 'Login/login',
					data: $('#login_singin_form').serialize(),
					dataType: "json",
					beforeSend: function () {
						$("#login_singin_form_submit_button").prop('disabled', true);
						// $("#login_buttonkt_login_singin_form_submit_button").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
					},
					success: function (data) {
						console.log(data);
						if (data.response == 'success') {
							toastr.success('Login successfully...');
							window.location.href = baseFolder + "dashboard";
						}
					},
					error: function (xhr, status, error) {

						// $('#emailError').val(xhr.error);

						var errorMessage = xhr.status + ': ' + xhr.statusText
						switch (xhr.status) {
							case 401:
								toastr.error('Authontication fail...');
								break;
							case 422:
								toastr.info('The login is invalid.', 'Info');
								$('#error').html(xhr.error).fadeIn().delay(3000).fadeOut();
								break;
							default:
								toastr.error('Error - ' + errorMessage, 'Something went wrong');
						}
						$("#login_singin_form_submit_button").prop('disabled', false);
					},
					complete: function (data) {
						//alert(data.responseJSON.token);
						// $('#kt_login_singin_form .csrf_token').val(data.responseJSON.token);
						// $("#login_button").html('<i class="feather icon-unlock"></i> Login');
						$("#login_singin_form_submit_button").prop('disabled', false);
					}
				});

			})
	}

	var _handleFormForgot = function () {
		var form = KTUtil.getById('forgot_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('forgot_form_submit_button');

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
			.on('core.form.valid', function () {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

				// Simulate Ajax request
				setTimeout(function () {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);


			})

	}

	var _handleFormForgototp = function () {
		var form = KTUtil.getById('forgot_form_otp');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('forgot_form_submit_button_otp');

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
			.on('core.form.valid', function () {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

				// Simulate Ajax request
				setTimeout(function () {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);


			})

	}
	
	// Public Functions
	return {
		init: function () {
			_handleFormSignin();
			_handleFormForgot();
			_handleFormForgototp();
		}
	};
}();

// Class Initialization
jQuery(document).ready(function () {
	KTLogin.init();
	// $('.login_form_verify_OTP').hide();
	// $('.login_form_verify_OTP').hide();
});

$(document).on("click", ".field-icon", function () {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password") {
		input.attr("type", "text");
	} else {
		input.attr("type", "password");
	}
});