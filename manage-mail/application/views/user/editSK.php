<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container">

        <div class="row">
            <div class="col-lg-8 m-auto">
                <!-- <div class="mb-4">
                    <div class="card m-auto">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <img src="<?= base_url('assets/img/stikes-min.png'); ?>" style="width: 20;" class="card-img img-account-profile rounded-circle mb-2">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h1 class="card-title text-dark"><strong>AGENDA KELUAR</strong></h1>
                                        <hr align="left" width="65%" color="#599ADA" style="height: 5px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="card m-auto">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Surat Keluar</h6>
                    </div>
                    <div class="card-body">
                        <?php foreach ($suratkeluar as $sk) : ?>
                            <form class="form-horizontal" action=<?= base_url('user/usk'); ?> method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label name="">Nomor Urut</label>
                                            <input name="nomor_urut" type="text" class="form-control" value="<?= $sk['nomor_urut'] ?>" readonly>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label name="">Tanggal Surat</label>
                                            <input name="tgl_surat" id="t1" type="input" class="form-control" value="<?= $sk['tgl_surat'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label name="">Nomor Surat</label>
                                            <textarea name="nomor_surat" type="text" class="form-control" required><?= $sk['nomor_surat'] ?></textarea>
                                            <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label name="">Perihal</label>
                                            <textarea name="perihal" type="text" class="form-control" required><?= $sk['perihal'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label name="">Tujuan</label>
                                            <textarea name="tujuan" type="text" class="form-control"><?= $sk['tujuan'] ?></textarea>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label name="">Tembusan</label>
                                            <textarea name="tembusan" type="text" class="form-control"><?= $sk['tembusan'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label name="">Keterangan</label>
                                        <textarea name="ket_surat" class="form-control"><?= $sk['keterangan'] ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('user/sk') ?>" style="float: left;" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->