<?php if ($teaser): ?>
	 <div class="small-product">
        <a href="<?php print $node_url;?>">
            <div class="inner" style="background: url(<?php print image_style_url('news-small', $content['field_photo']['#items'][0]['uri']);?>) no-repeat center;">
                <div class="bottom">
                    <?php if (!empty($content['field_label'])): ?>
                    	<div class="product-label"><?php print $content['field_label']['#items'][0]['value']; ?></div>
                    <?php endif ?>
                    
                </div>
                
            </div>
            <div class="title"><?php print $title; ?></div>
        </a>
    </div>
<?php else: ?>
	<div class="full-product full-news">
        
            <div class="banner">
                <img src="<?php print image_style_url('news-full', $content['field_photo']['#items'][0]['uri']); ?>" class="img-responsive" />
          </div>
     
        <div class="inner">
            <div class="padtop70">
                <div class="text">
                    <?php print render($content['body']); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>