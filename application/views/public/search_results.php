<?php include('public_header.php'); ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h1>Search Results</h1>
		</div>
		<div class="col-lg-6">
			<?php echo form_open("user/search",['class'=>'form-inline my-2 my-lg-0', 'role'=>'search']); ?>
	
      			<input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
      			<button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
    		</form>
    		<?php echo form_error('query',"<p class='navbar-text text-danger'>",'</p>'); ?>
		</div>
	</div>
		<hr>
			<table class="table">
				<thead>
					<th>Sr. No.</th>
					<th>Article Title</th>
					<th>Published On</th>
				</thead>
				<tbody>
				
					<tr>
					<?php if( @count($articles) )
					{ $count = $this->uri->segment(4, 0);

					foreach ($articles as $article) {
					?>
					<td><?php echo ++$count ?></td>
					<td>
						<?php echo anchor("user/article/{$article->id}",$article->title) ?>
					</td>
					<td>
						<?php echo date('d M y H:i:s', strtotime($article->created_at)) ?>
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

<?php include('public_footer.php'); ?>
