<?php if ($teaser): ?>
    <div class="small-product">
        <a href="<?php print $node_url;?>">
            <div class="inner" style="background: url(<?php print image_style_url('500x500', $content['field_photos']['#items'][0]['uri']);?>) no-repeat center;">
                <div class="bottom">
                    <?php if (!empty($content['field_label'])): ?>
                    	<div class="product-label"><?php print $content['field_label']['#items'][0]['value']; ?></div>
                    <?php endif ?>
                    <div class="price"><?php print $content['field_price']['#items'][0]['value']; ?><span>VRT</span></div>
                </div>
                
            </div>
            <div class="title"><?php print $title; ?></div>
        </a>
    </div>
<?php else: ?>
	<div class="full-product">
		<div class="addbasket-top">
								<?php 
					$form = drupal_get_form('mvp_cart_form', $node);
					print render($form); ?>
							</div>
		<div class="product-slider-carousel owl-carousel owl-theme">
			<?php if (!empty($content['field_video_gallery'])): ?>
				<?php foreach ($content['field_video_gallery']['#items'] as $key => $value): ?>
					<div class="item" style="width:700px">
						<iframe height="450" width="700" src="https://www.youtube.com/embed/<?php print $value['value'];?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media"></iframe>
					</div>
				<?php endforeach ?>
			<?php endif ?>
			<?php if (!empty($content['field_gallery_photos'])): ?>
				<?php foreach ($content['field_gallery_photos']['#items'] as $key => $value): ?>
					<div class="item" style="width:700px">
						<img src="<?php print image_style_url('700x450', $value['uri']); ?>" class="img-responsive" />
					</div>
				<?php endforeach ?>
			<?php endif ?>

		</div>
		<div class="inner">
			<?php if (!empty($content['field_subtitle'])): ?>
				<div class="subtitle"><?php print render($content['field_subtitle']);?></div>
			<?php endif ?>
			
			<div class="row padtop70">
				<div class="col-sm-7">
					<div class="desc-title"><?php print t('Description'); ?></div>
					<div class="text">
						<?php print render($content['body']); ?>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="right-section">
						<div class="row">
							<div class="col-xs-6">
								<div class="label-desc"><?php print t('Price'); ?>:</div>
							</div>
							<div class="col-xs-6">
								<div class="price"><?php print $content['field_price']['#items'][0]['value']; ?><span>VRT</span></div>
							</div>
						</div>
						
							<?php if (!empty($content['field_supported_platforms'])): ?>
							<div class="row">
								<div class="col-xs-6">
									<div class="label-desc"><?php print t('Supported Platforms'); ?>:</div>
								</div>
								<div class="col-xs-6">
									<div class="platforms"><?php print render($content['field_supported_platforms']); ?></div>
								</div>
							</div>
							<?php endif ?>
							<?php if (!empty($content['field_engine_version'])): ?>
							<div class="row">
								<div class="col-xs-6">
									<div class="label-desc"><?php print t('Supported Engine Versions'); ?>:</div>
								</div>
								<div class="col-xs-6">
									<div class="engine"><?php print render($content['field_engine_version']); ?></div>
								</div>
							</div>
							<?php endif ?>
							<div class="right">
								<?php 
					$form = drupal_get_form('mvp_cart_form', $node);
					print render($form); ?>
							</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
<?php endif ?>