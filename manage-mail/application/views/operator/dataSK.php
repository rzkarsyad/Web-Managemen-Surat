<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <form action="<?= base_url('operator/addKode'); ?>" method="POST">
            <!-- <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Surat Keluar</button> -->
        </form>
    </div>

    <?php if ($this->session->flashdata('flash')) : ?>
        <?= $this->session->flashdata('flash'); ?>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- <col style="width: 5%" /> -->
                    <col style="width: 5%" />
                    <col style="width: 10%" />
                    <col style="width: 10%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 15%" />
                    <col style="width: 5%" />
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">No. Urut</th>
                            <th scope="col">No. Surat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Tembusan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suratkeluar as $sk) : ?>
                            <tr>
                                <!-- <th scope="row"><?= ++$start; ?></th> -->
                                <td><?= $sk['nomor_urut']; ?></td>
                                <td><?= $sk['nomor_surat']; ?></td>
                                <td style="word-break: normal;"><?= date('d/m/Y', strtotime($sk["tgl_surat"])); ?></td>
                                <td style="word-break: break-all;"><?= nl2br($sk['tujuan']); ?></td>
                                <td style="word-break: break-all;"><?= $sk['perihal']; ?></td>
                                <td style="word-break: break-all;"><?= nl2br($sk['tembusan']); ?></td>
                                <td style="word-break: break-all;"><?= $sk['keterangan']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>" class="badge badge-warning badge-sm">lihat</a>
                                    <a href="<?= base_url(); ?>" class="badge badge-success badge-sm">sunting</a>
                                    <a href="<?= base_url(); ?>operator/delsk/<?= $sk['id']; ?>" class="badge badge-danger badge-sm" onclick="return confirm('Anda yakin ingin menghapus surat nomor <?= $sk['nomor_surat']; ?> ?');">hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>