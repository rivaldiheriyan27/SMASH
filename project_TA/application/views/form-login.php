<div class="col-sm-12 col-md-12 col-lg-12 text-center" style="padding: 20px; padding-top: 10vh;">

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-4 offset-lg-4" style="padding: 15px;">
			<h4>Login</h4>
			<hr>
			<?php if(!is_null($this->session->flashdata('message'))):?>
				<div class="alert alert-sm alert-danger">
					<?=$this->session->flashdata('message');?>
				</div>
			<?php endif;?>
			<form action="<?php echo base_url('index.php/login/auth');?>" method="POST">
				<div class="col-sm-12 col-md-12 col-lg-12 margin-bottom">
					<input type="text" class="form-control" name="username" placeholder="Masukan Username" autocomplete="off" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 margin-bottom">
					<input type="password" class="form-control" name="password" placeholder="Masukan Password" autocomplete="off" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 margin-bottom text-center">
					<button type="submit" class="btn btn-sm btn-outline-primary">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>