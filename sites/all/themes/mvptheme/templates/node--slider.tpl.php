<div class="slide" style="background:url(<?php print file_create_url($node->field_photo['und'][0]['uri']);?>) no-repeat center">
		<?php if (!empty($content['field_label'])): ?>
			<div class="label"><?php print render($content['field_label']); ?></div>
		<?php endif ?>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-8">
				
				<div class="text"><?php print render($content['body']); ?></div>
			</div>
		</div>
		

</div>