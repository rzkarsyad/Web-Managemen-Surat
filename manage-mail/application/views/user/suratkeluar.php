<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <form action="<?= base_url('user/addKode'); ?>" method="POST">
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Surat Keluar</button>
        </form>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="flapsk" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No. Urut</th>
                            <th scope="col">No. Surat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Tembusan</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suratkeluar as $sk) : ?>
                            <tr>
                                <td><?= $sk['nomor_urut']; ?></td>
                                <td><?= nl2br($sk['nomor_surat']); ?></td>
                                <td style="word-break: normal;"><?= date('d/m/Y', strtotime($sk["tgl_surat"])); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($sk['tujuan']); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($sk['tembusan']); ?></td>
                                <td style="word-break: break-all;"><?= $sk['perihal']; ?></td>
                                <td style="word-break: break-all;"><?= $sk['keterangan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableSK" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No. Urut</th>
                            <th scope="col">No. Surat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Tembusan</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suratkeluar as $sk) : ?>
                            <tr>
                                <th scope="row"><?= ++$start; ?></th>
                                <td><?= $sk['nomor_urut']; ?></td>
                                <td><?= nl2br($sk['nomor_surat']); ?></td>
                                <td style="word-break: normal;"><?= date('d/m/Y', strtotime($sk["tgl_surat"])); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($sk['tujuan']); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($sk['tembusan']); ?></td>
                                <td style="word-break: break-all;"><?= $sk['perihal']; ?></td>
                                <td style="word-break: break-all;"><?= $sk['keterangan']; ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#vsk<?= $sk['id']; ?>" class="badge badge-warning badge-sm">Lihat</a>
                                    <a href="<?= base_url(); ?>user/esk/<?= $sk['id']; ?>" class="badge badge-success badge-sm">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
</div>
</div>
<!-- /.container-fluid -->


<!-- Modal -->
<?php foreach ($suratkeluar as $sk) : ?>
    <div class="modal fade" id="vsk<?= $sk['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMemberMenuModalLabel">Detail Surat Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('operator/member'); ?>" method="post">
                    <div class="modal-body">
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>