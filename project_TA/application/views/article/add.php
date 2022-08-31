<div class="container-fluid">
	<div class="col-md-12 margin-bottom" style="padding: 20px;padding-top: 5vh;">
		<h1><?=$judul_halaman;?></h1>
		<button class="btn btn-default" onclick="window.history.back()">Kembali</button>
	</div>
	<div class="col-md-12 margin-bottom" style="padding: 20px;">
		<form action="<?=base_url('article/tambah');?>" method="POST">
			<div class="row margin-bottom">
				<div class="col-md-4">
					Judul Artikel
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" name="judul_artikel" required>
				</div>
			</div>
			<div class="row margin-bottom">
				<div class="col-md-4">
					Artikel
				</div>
				<div class="col-md-8">
					<textarea class="form-control" name="artikel" required></textarea>
				</div>
			</div>
			<div class="row margin-bottom">
				<div class="col-md-12 text-right">
					<button type="submit" class="btn btn-primary">Simpan Data</button>
				</div>
			</div>
		</form>
	</div>
</div>