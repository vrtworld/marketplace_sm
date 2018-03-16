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
					<h3><?php print t('Pay order'); ?></h3>
							<div class="description">To complete this transaction please send the amount of VRT noted below to the specified address, as soon as it gets confirmed you will be receiving your assets in your MVP account. If you don't have VRT or you need to buy more, please do so at VRT Cabinet. If you need to learn how to buy VRT please watch the following video.</div>
					<div class="row">
						<div class="col-sm-8">
							
							<div class="item"><?php print t('Order ID'); ?> <span><?php print $order_id; ?></span></div>
							<div class="item"><?php print t('To'); ?> <span><?php print $wallet; ?></span></div>
							
							<div class="bottom">
								<div class="row">
									<div class="col-xs-6">
										<div class="itembt"><?php print t('Send'); ?> <span><?php print $topay; ?> VRT</span></div>
									</div>
									<div class="col-xs-6">
										<div class="itembt"><?php print t('Time left:'); ?> <span id="timer-end"></span></div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div id="qrcode"></div>
							<?php print drupal_render($form); ?>
						</div>
					</div>
			</div>
		</div>
		<div class="white-background"><div class="inner"></div></div>
		</div>
	</div>
	
</div>
</div>

