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
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Page Wrapper -->
                <div id="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4 ">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <!-- <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="width:40% class=" card-img"> -->
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h4 class="text-primary"><strong>Tambah Agenda Surat Keluar</strong></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-8">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Surat Keluar</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action=<?= base_url('user/addsuratK'); ?> method="post">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label name="">Nomor Urut</label>
                                                        <input name="nomor_urut" type="text" class="form-control" value="<?= $kode ?>" readonly>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label name="">Tanggal Surat</label>
                                                        <input name="tgl_surat" id="t1" type="input" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label name="">Nomor Surat</label>
                                                        <input name="nomor_surat" type="text" class="form-control" required placeholder="Contoh. 000/000/00.0.0">
                                                        <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label name="">Perihal</label>
                                                        <input name="perihal" type="text" class="form-control" value="<?= set_value('perihal') ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label name="">Tujuan</label>
                                                        <textarea name="tujuan" type="text" class="form-control"><?= set_value('tujuan') ?></textarea>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label name="">Tembusan</label>
                                                        <textarea name="tembusan" type="text" class="form-control"><?= set_value('tembusan') ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <div class="col-sm-12">
                                                    <label name="">Keterangan</label>
                                                    <textarea name="ket_surat" class="form-control"><?= set_value('ket_surat') ?></textarea>
                                                </div>
                                            </div>
                                            <div class=" modal-footer col-sm-12 m-0">
                                                <a href="<?= base_url('user/deletekode'); ?>" class="btn btn-danger">Batal</a>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="nav-sticky">
                                    <!-- Collapsable Card Example -->
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Accordion -->
                                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                            <h6 class="m-0 font-weight-bold text-primary">Catatan Menambah Surat Keluar Baru</h6>
                                        </a>
                                        <!-- Card Content - Collapse -->
                                        <div class="collapse show" id="collapseCardExample">
                                            <div class="card-body">
                                                <p>Tekan tombol "Batal" untuk membatalkan masukan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        </div>

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