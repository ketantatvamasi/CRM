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
				<!--begin::Signin-->
				<div class="login-form">
					<!--begin::Form-->
					<form class="form" id="login_singin_form" action="#">
						<!--begin::Title-->
						<div class="pb-5 pb-lg-8">
							<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>

						</div>
						<!--begin::Title-->

						<!--begin::Form group-->
						<div class="form-group">
							<label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
							<input class="form-control h-auto py-4 px-6 rounded-lg border-0" type="text" name="email" id="email" placeholder="Enter Your Email" autocomplete="off" />
						</div>
						<!--end::Form group-->

						<!--begin::Form group-->
						<div class="form-group">
							<div class="d-flex justify-content-between mt-n5">
								<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>

								<a href="<?= base_url('backend/forgetpassword');?>" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">
									Forgot Password ?
								</a>
							</div>
							<div class="input-group-append">
								<input class="form-control h-auto py-4 px-6 rounded-lg border-0" type="password" name="password" id="password" placeholder="Enter Your Password" autocomplete="off" />
								<span class="input-group-text" style="background: white;">
								<i class="icon far field-icon toggle-password fa-eye" toggle="#password"></i>
								</span>
							</div>
						</div>
						<!--end::Form group-->
						<!--begin::Action-->
						<div class="pb-lg-0 pb-5">
							<button type="submit" id="login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
						</div>
						<!--end::Action-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Signin-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Login-->
</div>
<!--end::Main-->