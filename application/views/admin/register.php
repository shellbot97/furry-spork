<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Material Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/node_modules/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="body-wrapper">
    <div class="page-wrapper">
      <main class="content-wrapper auth-screen">
        <div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
							<div class="mdc-card">
								<section class="mdc-card__primary bg-white">
                  <form>
                    <div class="mdc-layout-grid">
            					<div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">First Name</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Last Name</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Phone Number</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Email</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Username</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Password</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-form-field">
                            <div class="mdc-checkbox">
                              <input type="checkbox" id="my-checkbox" class="mdc-checkbox__native-control"/>
                              <div class="mdc-checkbox__background">
                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                  <path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                </svg>
                                <div class="mdc-checkbox__mixedmark"></div>
                              </div>
                            </div>
                            <label for="my-checkbox">Admin</label>
                          </div>
                        </div>
                      
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <button class="mdc-button mdc-button--raised w-100" data-mdc-auto-init="MDCRipple">
                            Sign Up
                          </button>
                        </div>
            					</div>
            				</div>
                  </form>
								</section>
							</div>
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
					</div>
				</div>
      </main>
    </div>
  </div>
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>assets/node_modules/material-components-web/dist/material-components-web.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
	<script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/material.js"></script>
	<!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>