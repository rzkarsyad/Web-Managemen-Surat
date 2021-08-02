<!-- Begin Page Content -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-mail-bulk"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">eSurat</div>
                </a>
            </ul>

            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Page Wrapper -->
        <div id="wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

                <div class="card shadow mb-4 m-auto" style="width: 50rem;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Surat Keluar</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <form action=<?= base_url('operator/addSK'); ?> method="post">
                                    <div class="form-group">
                                        <label name="">Nomor Urut</label>
                                        <input name="nomor_urut" type="text" class="form-control" value="<?= set_value('kode_urut', $kode) ?>" readonly>
                                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label name="">Nomor Surat</label>
                                        <input name="nomor_surat" type="text" class="form-control" required placeholder="Contoh. 000/000/00.0.0">
                                    </div>
                                    <div class="form-group">
                                        <label name="">Tanggal Surat</label>
                                        <input name="tgl_surat" id="t1" type="input" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label name="">Tujuan</label>
                                        <textarea name="tujuan" type="text" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label name="">Perihal</label>
                                        <input name="perihal" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label name="">Tembusan</label>
                                        <textarea name="tembusan" type="text" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label name="">Keterangan</label>
                                            <textarea name="ket_surat" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer col-sm-12 m-0">
                                        <a href="<?= base_url('operator/deletekode'); ?>" class="btn btn-danger">Batal</a>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <script>
            function display_ct7() {
                var x = new Date()

                var month = (x.getMonth() + 1).toString();
                month = month.length == 1 ? 0 + month : month;

                var dt = x.getDate().toString();
                dt = dt.length == 1 ? 0 + dt : dt;

                var x1 = dt + "/" + month + "/" + x.getFullYear();
                x1 = x1;
                document.getElementById('t1').innerHTML = x1;
                document.getElementById('t1').value = x1;
                display_c7();
            }

            function display_c7() {
                var refresh = 1000; // Refresh rate in milli seconds
                mytime = setTimeout('display_ct7()', refresh)
            }
            display_c7()
        </script>