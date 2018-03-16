<?php if ($teaser): ?>
	<?php if ($zebra == 'odd'): ?>
	<div class="row study-small left">
		<div class="col-sm-6">
			<div class="photo">
				<a href="<?php print $node_url;?>">
					<?php print render($content['field_gallery_photos'][0]); ?>
					<span><?php print t('Read mode'); ?></span>
						
				</a>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="inner">
			<h4><?php print $title; ?></h4>
			<div class="study-date"><?php print render($content['field_date']); ?></div>
			<div class="text">
				<?php print render($content['body']); ?>
			</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="row study-small right">
		
		<div class="col-sm-6">
			<div class="inner">
			<h4><?php print $title; ?></h4>
			<div class="study-date"><?php print render($content['field_date']); ?></div>
			<div class="text">
				<?php print render($content['body']); ?>
			</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="photo">
				<a href="<?php print $node_url;?>">
					<?php print render($content['field_gallery_photos'][0]); ?>
					<span><?php print t('Read mode'); ?></span>
						
				</a>
			</div>
		</div>
	</div>
	<?php endif ?>
	
<?php else: ?>
	<div class="big-study">
		<div class="product-slider-carousel owl-carousel owl-theme">
			<?php if (!empty($content['field_gallery_photos'])): ?>
				<?php foreach ($content['field_gallery_photos']['#items'] as $key => $value): ?>
					<div class="item" style="width:700px">
						<img src="<?php print image_style_url('700x450', $value['uri']); ?>" class="img-responsive" />
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		<h4><?php print t('Send request') ?></h4>
		<div class="study-date"><?php print render($content['field_date']); ?></div>
		<div class="text">
			<?php print render($content['body']); ?>
		</div>
			
			<a href="#contact-popup" class="contact-popup btn btn-blue-dark"><?php print t('Send request');?></a>
			<div id="contact-popup" class="mfp-hide">
				<?php $form = drupal_get_form('mvp_contact_form', $node, $form_type);
					print drupal_render($form);
		 		?>
	 		</div>
		
	</div>
	
<?php endif ?>