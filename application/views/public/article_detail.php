<?php include('public_header.php'); ?>
<br>
<div class="container">

	<h3><?php echo $article->title ?></h3>
	<br>
	<h5><?php echo $article->body ?></h5>

<?php if( ! is_null($article->image_path) ): ?>
	<img src="<?= $article->image_path ?>" alt="">
<?php endif; ?>

</div>

<?php include('public_footer.php'); ?>
