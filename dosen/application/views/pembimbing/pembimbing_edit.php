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
					<h3 class='box-title text-bold'><?= $title ?></h3>

					<h3 class='box-title pull-right'>
						<form action="<?= site_url('pembimbing/data') ?>" method="post">
							<input type="hidden" name="tahun_akademik_id" value="<?= $g_tahun_akademik_id ?>">

							<button class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-undo"></i> KEMBALI</button>
						</form>
					</h3>
				</div><!-- /.box-header -->

				<div class="box-body">
					<form class="form" enctype="multipart/form-data" action="" method="post">

						<input type="hidden" name="thn_akdmk_id" value="<?= $g_pembimbing_id['tahun_akademik_id'] ?>">
						<input type="hidden" name="bimbingan_id" value="<?= $g_pembimbing_id['bimbingan_id'] ?>">

						<div class="form-group row <?= form_error('npm') ? 'has-error' : null ?>">
							<label for="NPM" class="col-sm-4 control-label">NPM</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="npm" placeholder="NPM" value="<?= $g_pembimbing_id['npm'] ?>" readonly>
								<?= form_error('npm') ?>
							</div>
						</div>

						<div class="form-group row <?= form_error('nama_lkp') ? 'has-error' : null ?>">
							<label for="nama_lkp" class="col-sm-4 control-label">Nama Lengkap</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama_lkp" id="nama_lkp" placeholder="Nama Lengkap" value="<?= $g_pembimbing_id['nama_lkp'] ?>" readonly>
								<?= form_error('nama_lkp') ?>
							</div>
						</div>

						<div class="form-group row <?= form_error('judul_proposal') ? 'has-error' : null ?>">
							<label for="judul_proposal" class="col-sm-4 control-label">Judul Proposal</label>

							<div class="col-sm-8">
								<textarea class="form-control" rows="5" name="judul_proposal" id="judul_proposal" placeholder="Judul Proposal" readonly><?= $g_pembimbing_id['judul_proposal'] ?></textarea>
								<?= form_error('judul_proposal') ?>
							</div>
						</div>

						<div class="form-group row <?= form_error('pbb_satu') ? 'has-error' : null ?>">
							<label for="pbb_satu" class="col-sm-4 control-label">Dosen Pembimbing I *</label>

							<div class="col-sm-8">
								<select class="form-control" name="pbb_satu">
									<?php
									if (!empty($g_pembimbing_id['pbb_satu'])) {
										foreach ($g_dosen as $data) :
											$nidn     = $data['nidn'];
											$nama_dsn = strtoupper($data['nama_lkp']);

											if ($g_pembimbing_id['pbb_satu'] == $nidn) {
									?>
												<option value="<?= $nidn ?>" selected><?= $nama_dsn ?></option>
											<?php
											} else {
											?>
												<option value="<?= $nidn ?>"><?= $nama_dsn ?></option>
									<?php
											}
										endforeach;
									} else {
										echo '<option value="">404 Not found</option>';
									}
									?>
								</select>
								<?= form_error('pbb_satu') ?>
							</div>
						</div>

						<div class="form-group row <?= form_error('pbb_dua') ? 'has-error' : null ?>">
							<label for="pbb_dua" class="col-sm-4 control-label">Dosen Pembimbing II *</label>

							<div class="col-sm-8">
								<select class="form-control" name="pbb_dua">
									<?php
									if (!empty($g_pembimbing_id['pbb_dua'])) {
										foreach ($g_dosen as $data) :
											$nidn     = $data['nidn'];
											$nama_dsn = strtoupper($data['nama_lkp']);

											if ($g_pembimbing_id['pbb_dua'] == $nidn) {
									?>
												<option value="<?= $nidn ?>" selected><?= $nama_dsn ?></option>
											<?php
											} else {
											?>
												<option value="<?= $nidn ?>"><?= $nama_dsn ?></option>
									<?php
											}
										endforeach;
									} else {
										echo '<option value="">404 Not found</option>';
									}
									?>
								</select>
								<?= form_error('pbb_dua') ?>
							</div>
						</div>

						<div class="box-footer text-center">
							<button type="reset" class="btn btn-flat btn-default">Reset</button>
							&nbsp;
							<button type="submit" name="edit" class="btn btn-flat btn-success"><i class='fa fa-paper-plane'></i> Update</button>
						</div> <!-- /.box-footer -->
					</form>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->

		</div> <!-- /.col-md-3 -->

		<div class="col-sm-4">
			<div class="box" style="border-radius: none; border-top: none;">
				<div class="box-header with-border">
					<i class="fa fa-bullhorn"></i>
					<h3 class="box-title text-bold">CATATAN</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<ol style="padding-inline-start: 20px !important;">
						<li>Setiap field yang bertanda <b>*</b> wajib diisi.</li>
					</ol>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->
		</div> <!-- /.col-sm-4 -->

	</div> <!-- /.row -->

</section> <!-- /.section -->
