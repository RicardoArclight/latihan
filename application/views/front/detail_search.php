<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-text">
                    <h2>Cari Pengaduan</h2>
                    <div class="div-dec"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="top-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Pengaduan</h3>
                                    <div class="card-body">


                                        <div class="row">
                                            <div class="col-lg-12">



                                                <br />
                                                <br />

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Pengaduan</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <?php foreach ($pengaduan as $k) { ?>

                                                            <form method="post" action="<?php echo base_url('dashboard/pengaduan_kirim') ?>">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label>Nama Pengadu</label>
                                                                        <input type="hidden" name="id" value="<?php echo $k->id; ?>">
                                                                        <input type="text" name="pengadu" class="form-control" placeholder="Masukkan nama pengaduan .." value="<?php echo $k->nama_pengadu; ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email Pengadu</label>
                                                                        <input type="text" name="email" class="form-control" placeholder="Masukkan nama pengaduan .." value="<?php echo $k->email_pengadu; ?>" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Subject</label>
                                                                        <input type="text" name="subject" class="form-control" placeholder="Masukkan subject" value="<?php echo $k->subjek; ?>" readonly>
                                                                        <?php echo form_error('subject'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status Pengaduan</label>
                                                                        <input type="text" name="subject" class="form-control" placeholder="" value="<?php
                                                                                                                                                        if ($k->status_pengaduan == "Sudah") {
                                                                                                                                                            echo "Sudah Ditanggapi";
                                                                                                                                                        } else {
                                                                                                                                                            echo "Belum Ditanggapi";
                                                                                                                                                        }
                                                                                                                                                        ?>" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="card card-primary card-outline">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">detail pesan</h3>

                                                                        <div class="card-tools">

                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body p-0">
                                                                        <div class="mailbox-read-info">
                                                                            <center>
                                                                                <h5>isi pengaduan</h5>
                                                                            </center>
                                                                            <h6>
                                                                                <span class="mailbox-read-time float-right"></span>
                                                                            </h6>
                                                                        </div>
                                                                        <!-- /.mailbox-read-info -->
                                                                        <div class="mailbox-controls with-border text-center">
                                                                            <div class="btn-group">

                                                                            </div>

                                                                            </button>
                                                                        </div>
                                                                        <!-- /.mailbox-controls -->
                                                                        <div class="mailbox-read-message">
                                                                            <center>
                                                                                <p><?php echo $k->isi_pengaduan; ?></p>
                                                                            </center>

                                                                        </div>
                                                                        <!-- /.mailbox-read-message -->
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="card-footer bg-white">
                                                                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                                            <li>
                                                                                <span class="mailbox-attachment-icon"><i class=""></i></span>

                                                                                <div class="mailbox-attachment-info">
                                                                                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i></a>
                                                                                    <span class="mailbox-attachment-size clearfix mt-1">
                                                                                        <span></span>
                                                                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                                                                    </span>
                                                                                </div>
                                                                            </li>
                                                                            <li>

                                                                                <span class="mailbox-attachment-icon"><i class=""></i></span>

                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.card-footer -->
                                                                    <div class="card-footer">
                                                                        <div class="float-right">
                                                                        </div>
                                                                        <center>
                                                                            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                                                                        </center>
                                                                    </div>

                                                                </div>
                                                    </div>
                                                </div>

                                                </form>

                                            <?php } ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>

</section>