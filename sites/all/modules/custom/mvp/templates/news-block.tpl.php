<div class="news-block owl-carousel owl-theme">
	<?php $i = 0; ?>
	<?php foreach ($items['nodes'] as $key => $value): ?>
		
				<?php print render($value); ?>
			
	<?php endforeach ?>
</div>