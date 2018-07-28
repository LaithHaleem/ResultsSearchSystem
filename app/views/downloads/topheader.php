<?php require APPROOT . '/views/inc/header.inc.php'; ?>
<div class="card">
	<div class="card-header downloads-header">
		<div class="container">
			<div class="cat-path">
				<<?php echo ($data['HeaderTop']['selected'] != null) ? 'a href="'. URLROOT .'/downloads"' : 'span' ?> class="path-static">
					<span class="download-path">مركز التحميل</span>
					<i class="fas fa-chevron-left"></i>
				</<?php echo ($data['HeaderTop']['selected'] != null) ? 'a' : 'span' ?>>
				<span><?php echo ($data['HeaderTop']['selected'] != null) ? $data['HeaderTop']['selected'] : ''; ?></span>
			</div>
		</div>
	</div>