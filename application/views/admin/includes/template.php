<?php 

	$this->load->view('admin/includes/header');

	$this->load->view('admin/includes/sidebar');

	$this->load->view('admin/includes/topbar'); 

	if ($views && $views != "") {
		foreach ($views as $views_key => $views_value) {
			$this->load->view($views_value);
		}
	}

	$this->load->view('admin/includes/footer'); 
?>