<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			<!--begin::Dashboard-->

			<!--begin::Row-->
			<!-- <div class="row"> -->
			<div class="col-lg-12">
				<!--begin::Mixed Widget 1-->
				<div class="card card-custom bg-gray-100 card-stretch gutter-b">

					<!--begin::Body-->
					<div class="card-body p-0 position-relative overflow-hidden">

						<!--begin::Stats-->
						<div class="card-spacer">
							<!--begin::Row-->
							<div class="row m-0">
								<div class="col-md-6">
									<div class="bg-light-dark px-6 py-8 rounded-xl  mb-7 d-flex align-items-center justify-content-between card-spacer flex-grow-1 ">
										<div>
											<span class="svg-icon svg-icon-dark svg-icon-3x d-block my-2">
												<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column text-right">
											<span class="text-dark-75 font-weight-bolder font-size-h3"><?= ($load_data['userCount'] != "") ? $load_data['userCount'] + 1 : 0; ?></span>
											<a href="#" class="text-dark font-weight-bold font-size-h6 mt-2">
												Users
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 ">
									<div class="bg-light-primary px-6 py-8 rounded-xl mb-7 d-flex align-items-center justify-content-between card-spacer flex-grow-1">
										<div><em class="fas fa-user-friends icon-3x text-primary d-block my-2"></em>
										</div>
										<div class="d-flex flex-column text-right">
											<span class="text-dark-75 font-weight-bolder font-size-h3"><?= ($load_data['customerCount'] != "") ? $load_data['customerCount'] : 0; ?></span>
											<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">
												Customers
											</a>
										</div>
									</div>
								</div>

							</div>
							<!--end::Row-->
							<!--begin::Row-->
							<div class="row m-0">
								<div class="col-md-6">
									<div class=" bg-light-info px-6 py-8 rounded-xl mb-7 d-flex align-items-center justify-content-between card-spacer flex-grow-1 ">
										<div><span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
														<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column text-right">
											<span class="text-dark-75 font-weight-bolder font-size-h3"><?= ($load_data['itemCount'] != "") ? $load_data['itemCount'] : 0; ?></span>
											<a href="#" class="text-info font-weight-bold font-size-h6 mt-2">
												Items
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bg-light-warning px-6 py-8 rounded-xl mb-7 d-flex align-items-center justify-content-between card-spacer flex-grow-1">
										<div>
											<span class="svg-icon svg-icon-warning svg-icon-3x">
												<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Box3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3" />
														<polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column text-right">
											<span class="text-dark-75 font-weight-bolder font-size-h3"><?= ($load_data['vendorCount'] != "") ? $load_data['vendorCount'] : 0; ?></span>
											<a href="#" class="text-warning font-weight-bold font-size-h6 mt-2">
												Vendors
											</a>
										</div>
									</div>
								</div>

							</div>
							<!--end::Row-->
							<!--begin::Row-->
							<div class="row m-0">
								<div class="col-md-6">
									<div class=" bg-light-danger px-6 py-8 rounded-xl mb-7 d-flex align-items-center justify-content-between card-spacer flex-grow-1 ">
										<div>
											<i class="fas fa-cart-arrow-down icon-2x text-danger d-block my-2"></i>
										</div>
										<div class="d-flex flex-column text-right">
											<span class="text-dark-75 font-weight-bolder font-size-h3">₹<?= ($load_data['purchaseCount'] != "") ? $load_data['purchasetotal'] . "(" . $load_data['purchaseCount'] . ")" : 0; ?></span>
											<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">
												Purchase
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bg-light-success px-6 py-8 rounded-xl d-flex align-items-center justify-content-between card-spacer flex-grow-1 ">
										<div><span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
														<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
														<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
														<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column text-right">
											<span class="text-dark-75 font-weight-bolder font-size-h3">₹<?= ($load_data['saleCount'] != "") ? $load_data['saletotal'] . "(" . $load_data['saleCount'] . ")" : 0; ?></span>
											<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">
												Sales
											</a>
										</div>
									</div>
								</div>
							</div>
							<!--end::Row-->
						</div>
						<!--end::Stats-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Mixed Widget 1-->
			</div>
			<!-- </div> -->
			<!-- <div class="row">
				<div class="card card-custom wave wave-animate-slow mb-8 mb-lg-0">
					<div class="card-body">
						<div class="d-flex align-items-center p-5">
							<div class="mr-6">
								<span class="svg-icon svg-icon-warning svg-icon-4x">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"></rect>
											<polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"></polygon>
											<polygon fill="#000000" points="11 20 15.5 14 20 20"></polygon>
											<circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"></circle>
										</g>
									</svg>
								</span>
							</div>
							<div class="d-flex flex-column">
								<a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
									Gallery
								</a>
								<div class="text-dark-75">
									Best photos you have.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!--end::Row-->


			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->