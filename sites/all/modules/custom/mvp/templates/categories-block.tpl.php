<div class="categories-main owl-carousel owl-theme">
<?php foreach ($terms as $key => $value): ?>
	<div class="item">
		<a href="<?php print drupal_get_path_alias('taxonomy/term/'.$value->tid); ?>">
			<div class="image"><img src="<?php print image_style_url('cat-photo', $value->field_photo['und'][0]['uri']);?>" class="img-responsive"></div>
			<div class="title"><?php print $value->name; ?></div>
		</a>
	</div>
<?php endforeach ?>
</div>