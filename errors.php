
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><h3><strong><?php echo $error ?></strong></h3></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>