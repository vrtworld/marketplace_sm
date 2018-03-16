<?php if (!empty($nodes)): ?>
	<div class="row category-page-full">
		<?php $i = 0; ?>
		<?php foreach ($nodes['items']['nodes'] as $key => $value): ?>
			<?php $col = 'col-sm-3'; ?>
			<?php if ($i % 4 == 0 || $i % 7 == 0): ?>
				<?php $col = 'col-sm-6'; ?>
			<?php endif ?>
			<div class="<?php print $col;?> product-in-cat">
				<?php print render($value); ?>
			</div>
			<?php $i++; ?>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (!empty($childs)): ?>
<?php if (!empty($childs['image'])): ?>
		<div class="slider-cat"><img src="<?php print image_style_url('news-full', $childs['image']); ?>" class="img-responsive" ></div>
	<?php endif ?>
	<?php foreach ($childs as $key => $value): ?>
	
	<div class="cats-block">
		<?php if (!empty($value['name'])): ?>
			<div class="top subcat">
				<div class="cat-title smaller">
					<?php print $value['name']; ?>
				</div>
				<?php print $value['decription']; ?>
				
			</div>
		<div id="productsnav<?php print $value['tid']; ?>" class="owl-nav"></div>
		<?php endif ?>
		
		
		<?php $i = 0; ?>
		<?php if (!empty($value['items'])): ?>
			
		
		<div class="category-products owl-carousel owl-theme">
		
		<?php foreach ($value['items']['nodes'] as $node): ?>
			
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
	
	</div>
<?php endforeach ?>
<?php endif ?>