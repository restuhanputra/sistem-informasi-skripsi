<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-sm-8">
			<?php
			if ($this->session->flashdata('msg')) :
				echo $this->session->flashdata('msg');
				unset($_SESSION['msg']);
			endif;
			?>

			<div class="box" style="border-radius: none; border-top: none;">

				<div class='box-header with-border'>
					<div class="text-center">
						<h3 class='box-title text-bold'><?= $title ?></h3>
					</div>

					<?php
					$now          = date('Y-m-d');
					$start        = date('Y-m-d', strtotime($g_jdw_reg_proposal['start_date']));
					$hari         = $g_jdw_reg_proposal['hari'];
					$jangka_waktu = strtotime('+' . $hari . ' days', strtotime($start)); // jangka waktu + 365 hari
					$end          = date('Y-m-d', $jangka_waktu);

					// sidebar
					$mulai   = date('d-m-Y', strtotime($start));
					$selesai = date('d-m-Y', strtotime($end));

					if ($now > $end) {
						NULL;
					} else {
					?>
						<h3 class='box-title'>
							<a href="<?= site_url('proposal/daftar') ?>" class="btn btn-sm btn-flat btn-primary"><i class='fa fa-plus'></i> <b>DAFTAR</b></a>
						</h3>
						<?php

						if (!empty($g_sdg_ppsal_id['daftar_ulang'])) {
							if ($g_sdg_ppsal_id['daftar_ulang'] == 1) {
						?>
								<h3 class='box-title'>
									<a href="<?= site_url('proposal/daftar_ulang') ?>" class="btn btn-sm btn-flat btn-primary"><i class='fa fa-plus'></i> <b>DAFTAR ULANG</b></a>
								</h3>
							<?php
							}
						}

						if (!empty($g_sdg_skripsi_id['daftar_ulang'])) {
							if ($g_sdg_skripsi_id['daftar_ulang'] == 1) {
							?>
								<h3 class='box-title'>
									<a href="<?= site_url('proposal/daftar_ulang') ?>" class="btn btn-sm btn-flat btn-primary"><i class='fa fa-plus'></i> <b>DAFTAR ULANG</b></a>
								</h3>
					<?php
							}
						}
					}
					?>

				</div><!-- /.box-header -->

				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="mytable">
							<thead>
								<tr>
									<th class="text-center" style="width:1%;">No</th>
									<th class="text-center">NPM</th>
									<th class="text-center">Nama Lengkap</th>
									<th class="text-center">No Telp</th>
									<th class="text-center">E-mail</th>
									<th class="text-center">Judul Proposal</th>
									<th class="text-center">View</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($g_proposal)) {
									$no = 1;
									foreach ($g_proposal as $data) :
										$proposal_id    = $data['proposal_id'];
										$npm            = $data['npm'];
										$nama_lkp       = ucfirst($data['nama_lkp']);
										$no_telp        = $data['no_telp'];
										$email          = $data['email'];
										$judul_proposal = $data['judul_proposal'];
								?>
										<!-- Isi Tabel -->
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $npm ?> </td>
											<td><?= $nama_lkp ?> </td>
											<td><?= $no_telp ?> </td>
											<td><?= $email ?> </td>
											<td><?= $judul_proposal ?> </td>
											<td class="text-center">
												<form action="<?= site_url('proposal/detail') ?>" method="post">
													<input type="hidden" name="proposal_id" value="<?= $proposal_id ?>">

													<button name="detail" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-eye"></i></button>
												</form>
											</td>
										</tr>
										<!-- /. Isi Tabel -->
								<?php
									endforeach;
								} else {
									NULL;
								}
								?>

							</tbody>
						</table>
					</div>
				</div> <!-- /. box-body -->

			</div> <!-- /.box -->
		</div> <!-- /.col-sm-8 -->

		<!-- load expired -->
		<?php
		if (isset($start)) {
		?>
			<div class="col-sm-4">
				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-header with-border">
						<i class="fa fa-exclamation-circle"></i>
						<h3 class="box-title text-bold">Info Batas Pendaftaran Proposal Skripsi</h3>
					</div>
					<div class="box-body">
						<ul class="info news-items" style="padding-inline-start: 5px;">
							<div class="news-item-detail">
								<p class="news-item-preview"> <i class="fa fa-calendar color-primary"></i> <?= $mulai . ' s/d ' . $selesai ?> </p>
							</div>
							<div class="news-item-detail">
								<p class="news-item-preview"> <i class="fa fa-info-circle color-primary"></i> &nbsp;Tidak ada toleransi jika sudah melewati batas pendaftaran.</p>
							</div>
						</ul>
					</div> <!-- /.box-body -->
				</div>
			</div>
		<?php
		}
		?>

		<!-- load info_revisi -->
		<?php $this->load->view('template/info_revisi'); ?>

	</div> <!-- /.row -->

</section> <!-- /.section -->

<script>
	$(function() {
		$('#mytable').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true
		});
	});
</script>
