<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	header('location: http://localhost/loan-management/application/pages/error-pages/403-error.php');
	exit();
};
?>
<nav class="main-header navbar navbar-expand navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" role="button">
				<i class="fa-solid fa-bars"></i>
			</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<span class="navbar-brand font-weight-light">Web-Based Loan Management System of NMSCST Credit Cooperative</span>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Philippine Standard Time -->
		<li class="nav-item">
			<div class="ph-time pt-2" style="font-family: 'Courier Prime', monospace;"></div>
		</li>

		<script type="text/javascript" id="gwt-pst">
			(function(d, eId) {
				var js, gjs = d.getElementById(eId);
				js = d.createElement('script');
				js.id = 'gwt-pst-jsdk';
				js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?" + new Date().getTime();
				gjs.parentNode.insertBefore(js, gjs);
			}(document, 'gwt-pst'));

			var gwtpstReady = function() {
				var otherFormat = 'dddd mmm dd, yyyy HH:MM:ss TT';
				var firstPst = new gwtpstTime({
					timerClass: 'ph-time',
					format: otherFormat
				});
			}
		</script>

		<li class="nav-item">
			<div class="theme-switch-wrapper nav-link">
				<label class="theme-switch" for="checkbox">
					<input type="checkbox" id="checkbox" />
					<span class="slider round"></span>
				</label>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link btn btn-outline-secondary" data-delay="1000" title="Logout" data-toggle="tooltip" data-placement="left" href="../../logout.php" role="button" onclick="return confirm('Confirm logout?');">
				<i class="fa-solid fa-right-from-bracket"></i>
			</a>
		</li>
	</ul>
</nav>
<!-- /.navbar -->