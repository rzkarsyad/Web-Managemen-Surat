<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <?= $this->session->flashdata('message'); ?>    -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 card-angles">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col-md-8">
                            <h4 class="text-primary"><strong>Hi, Selamat Datang di Managemen Surat!</strong></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quasi ipsum laudantium quis
                                modi odio temporibus aliquam nobis iste necessitatibus! Excepturi unde obcaecati quos nisi, fugiat repellat ea magnam cumque.
                            </p>
                        </div>
                        <div class="col-xxl-12 text-center col-md-4 rounded float-right">
                            <!-- <img src="assets/img/stikes-min.png" style="width:50%" class="rounded float-right card-img img-account-profile mb-2"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Surat Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->