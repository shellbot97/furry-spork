<body>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-persistent-drawer mdc-persistent-drawer--open">
      <nav class="mdc-persistent-drawer__drawer">
        <div class="mdc-persistent-drawer__toolbar-spacer">
          <a href="<?php echo base_url(); ?>assets/index.html" class="brand-logo">
						<img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="logo">
					</a>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url(); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">desktop_mac</i>
                Dashboard
              </a>
            </div>

            <div class="mdc-list-item mdc-drawer-item" data-toggle="expansionPanel" target-panel="ui-sub-menu">
              <a class="mdc-drawer-link" >
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                Forms
                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
              </a>
              <div class="mdc-expansion-panel" id="ui-sub-menu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo site_url('admin/add/room'); ?>">
                      Room Onboarding
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url(); ?>assets/pages/ui-features/typography.html">
                      User Onboarding
                    </a>
                  </div>
                </nav>
              </div>
            </div>

            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo site_url('admin/masters'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
                Masters
              </a>
            </div>

            <div class="mdc-list-item mdc-drawer-item"  data-toggle="expansionPanel" target-panel="sample-page-submenu">
              <a class="mdc-drawer-link" >
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">receipt</i>
                Receipts
                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url(); ?>assets/pages/samples/blank-page.html">
                      Bill Receipt
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url(); ?>assets/pages/samples/403.html">
                      Donation Receipt
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url(); ?>assets/pages/samples/404.html">
                      Staff tip Receipt
                    </a>
                  </div>
                  

                </nav>
              </div>
            </div>
            
          </nav>
        </div>
      </nav>
    </aside>