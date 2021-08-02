<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center mb-4">
        <a href="<?= base_url('user/lapsk'); ?>" style="float: left;" class="btn btn-sm btn-secondary">Kembali</a>
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> -->

    <div class="card mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Surat Keluar</h6>
            <form action="" method="POST">
                <a href="#" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-outline-danger">
                    <i class="fas fa-file-pdf fa-sm "></i> Export PDF</a>
                <a href="#" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-outline-success">
                    <i class="fas fa-file-excel fa-sm "></i> Export Excel</a>
                <a href="#" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary">
                    <i class="fas fa-print fa-sm "></i> Cetak Laporan</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="flapsk" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
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
                        <?php foreach ($dateFilter as $df) : ?>
                            <tr>
                                <!-- <th scope="row"><?= ++$start; ?></th> -->
                                <td><?= $df['nomor_urut']; ?></td>
                                <td><?= nl2br($df['nomor_surat']); ?></td>
                                <td style="word-break: normal;"><?= date('d/m/Y', strtotime($df["tgl_surat"])); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($df['tujuan']); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($df['tembusan']); ?></td>
                                <td style="word-break: break-all;"><?= $df['perihal']; ?></td>
                                <td style="word-break: break-all;"><?= $df['keterangan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->