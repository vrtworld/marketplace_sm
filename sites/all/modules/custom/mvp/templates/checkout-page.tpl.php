<div class="checkout-custom">
<div class="row">
	<div class="col-sm-3">
		<div class="region region-sidebar-first">
			<?php print $order; ?>
		</div>
		
	</div>
	<div class="col-sm-9">
		<div class="whitebg-margin">
			<div class="region-content">
				<div class="top">
				<h1 class="page-header"><?php print t('Checkout'); ?></h1>
				<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus iure, reprehenderit saepe, rem, temporibus eligendi illum cupiditate quam voluptatum repellat rerum. Aut nulla expedita et obcaecati odit, facilis ad iste.</div>
				</div>
				<div class="billing-info">
				<h3><?php print t('Billing information'); ?></h3>
				<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus iure, reprehenderit saepe, rem, temporibus eligendi illum cupiditate quam voluptatum repellat rerum. Aut nulla expedita et obcaecati odit, facilis ad iste.</div>
				<div class="item"><?php print t('E-mail address:'); ?> <span><?php print $user->mail; ?></span></div>
				<div class="item"><?php print t('User:'); ?> <span><?php print $user->name; ?></span></div>
				<div class="pull-right">
					<?php print drupal_render($form); ?>
				</div>
				
		</div>
		</div>
		<div class="white-background"><div class="inner"></div></div>
		</div>
	</div>
	
</div>
</div>