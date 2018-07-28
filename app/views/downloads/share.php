<div class="share-downloads">
	<div class="container">
		<div class="card-wrapper row">
			<?php foreach($data['Files'] as $key => $school): ?>
			<div class="card col-md-3 col-sm-6 col-xs-3">
				<a href="<?php echo URLROOT; ?>/downloads/<?php echo $school->lertype . '/' . $school->hashname; ?>" class="sharelink">
					<div class="card-body">
						<img class="card-img-top" src="<?php echo URLROOT; ?>/assets/fs324asdf24asd.svg" alt="Card image cap">
						<h5 class="card-title"><?php echo $school->realname; ?></h5>
			  		</div>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php require APPROOT . '/views/inc/footer.inc.php'; ?>