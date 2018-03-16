<?php foreach ($items as $key => $value): ?>
	
	<div class="cats-block">
		<?php if (!empty($value['name'])): ?>
			<div class="top">
				<div class="cat-title">
					<?php print $value['name']; ?>
				</div>
				<?php print $value['decription']; ?>
			</div>
		<div id="productsnav<?php print $value['tid']; ?>" class="owl-nav"></div>
		<?php endif ?>
		
		
		<?php $i = 0; ?>
		<?php if (!empty($value['node'])): ?>
			
		
		<div class="category-products owl-carousel owl-theme">
		
		<?php foreach ($value['node']['nodes'] as $node): ?>
			
			<?php $width = 'style="width:300px"'; ?>
			<?php if ($i % 3 == 0): ?>
				<?php $width = 'style="width:500px"'; ?>
			<?php endif ?>
			<div <?php print $width; ?>>
				<?php print render($node); ?>
			</div>
			<?php $i++; ?>
		<?php endforeach ?>
		</div>
		<?php endif ?>
	<?php print render($value['bottom']); ?>
	</div>
<?php endforeach ?>