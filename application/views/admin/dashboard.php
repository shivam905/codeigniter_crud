<?php include('admin_header.php'); ?>

	<div class="container"><br>
		<div class="row">
			<div class="col-lg-9">
				<h1 style="float: left;">Welcome admin</h1>
				<a href="<?php echo base_url('admin/add_article'); ?>" class="btn btn-lg btn-primary float-right">Add Article</a>
			</div>
		</div>
<?php if( $feedback = $this->session->flashdata('feedback') ): 
		$feedback_class = $this->session->flashdata('feedback_class') 
	?>
   
<div class="alert alert-dismissible <?php echo $feedback_class; ?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <!--  <h4 class="alert-heading">Warning!</h4> -->
  <?php echo $feedback; ?>
</div>
<?php endif; ?>
		<table class="table">
			<thead>
				<th>Sr. No.</th>
				<th>Title</th>
				<th>Description</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php if( @count($articles) )
				{ $count = $this->uri->segment(3, 0);

					foreach ($articles as $article) {
				?>
				<tr>
					<td><?php echo ++$count ?></td>
					<td>
						<?php echo $article->title; ?>
					</td>
					<td>
						<?php echo $article->body; ?>
					</td>
					<td>
						<div class="row">
							<div class="col-lg-2">
							<?php echo anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-info']); ?>
							</div>
			
							<div class="col-lg-2">
							<?=
						form_open('admin/delete_article'),
						form_hidden('article_id', $article->id),
						form_submit(['name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-warning']),
						form_close();

						?>
							</div>
						</div>
						<!-- <button type="button" class="btn btn-warning">Delete</button> -->
					</td>
				</tr>
				<?php }}
						else{ ?>
							<tr>
								<td colspan="3">No records founds</td>
							</tr>
							<?php }  ?>
			</tbody>

		</table><br>
					<div>
						<b style="font-size: 20px;"><?php echo $this->pagination->create_links(); ?></b>
					</div>

	</div>
<?php include('admin_footer.php'); ?>
