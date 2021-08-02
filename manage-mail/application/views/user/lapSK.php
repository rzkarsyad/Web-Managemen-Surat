<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <?= $this->session->flashdata('message'); ?>    -->

    <div class="row">
        <div class="col-xl-9 col-md-9 mb-4 m-auto">
            <div class="card py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pilih Tanggal</h6>
                </div>
                <div class="card-body">
                    <form class="form" action="<?= base_url('user/flapsk'); ?>" method="post">
                        <div class="row">
                            <div class="col-12 m-auto">
                                <div class="col-12">
                                    <div class="form-row">
                                        <div class="col-xl-5">
                                            <label name="">Dari Tanggal</label>
                                            <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                                            <input type="date" name="startdate" class="form-control daterange-single" value="" maxlength="10" required>
                                        </div>
                                        <div class="col-xl-5">
                                            <label name="">Sampai Tanggal</label>
                                            <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                                            <input type="date" name="enddate" class="form-control daterange-single" value="" maxlength="10" required>
                                        </div>
                                        <div class="col-xl-2">
                                            <button type="submit" name="data_lap" style="margin-top: 2rem;" class="btn btn-primary float-left">Periksa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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