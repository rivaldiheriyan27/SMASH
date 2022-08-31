<div class="container-fluid">
	<div class="col-md-12 margin-bottom" style="padding: 20px;padding-top: 5vh;">
		<h1><?=$judul_halaman;?></h1>
		<a href="<?=base_url('article/tambah');?>" class="btn btn-primary">Tambah Artikel</a>
		<a href="<?=base_url('login/logout');?>" class="btn btn-danger">Logout</a>
	</div>
	<div class="col-md-12 margin-bottom" style="padding: 20px;">
		<?=$this->session->flashdata('message_arc');?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="6%">NO</th>
						<th width="10%">Aksi</th>
						<th>Judul Artikel</th>
						<th>Artikel</th>
						<th width="10%">Dibuat Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $num=0; foreach($data_artikel as $dartikel): $num++;?>
						<tr>
							<td><?=$num;?></td>
							<td>
								<a href="<?=base_url('article/edit/') . $dartikel['artikel_id'];?>" class="btn btn-sm btn-info">Ubah</a>
								<a href="<?=base_url('article/hapus/') . $dartikel['artikel_id'];?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
							<td><?=$dartikel['judul_artikel'];?></td>
							<td><?=$dartikel['konten_artikel'];?></td>
							<td><?=$dartikel['dibuat_tanggal'];?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>