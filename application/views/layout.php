<!DOCTYPE html>
<html>
	<head>
		<title>Ezy Warehouse</title>
		<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
	</head>
	<body>
		<header>
			<h1>Ezy Warehouse</h1>
			<div id="menu">
				<hr/>
				<a href="<?php echo site_url('/');?>">Barang</a> |
				<a href="<?php echo site_url('/warehouse/gudang'); ?>">Gudang</a> |
				<a href="<?php echo site_url('/warehouse/history'); ?>">History</a>
				<hr/>
			</div>
		</header>	
		<div id="content">
			<?php echo $content; ?>
		</div>
		<footer>
			<hr/>
			Ezy Warehouse 2016. This application is built for P.T. Ezy Informatika Programming Test for Web Developer Applicants.
		</footer>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
		<?php echo $script; ?>
	</body>
</html>