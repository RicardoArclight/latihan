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
                                    <!-- <h3 class="card-title">Detail Pengaduan</h3> -->
                                    <div class="card-body">


                                        <div class="row">
                                            <div class="col-lg-12">



                                                <br />
                                                <br />

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Detail Pengaduan</h3>
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
                                                                        <h4 class="card-title">detail pesan</h4>

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

                                                                        <div class="mailbox-controls with-border text-center">
                                                                            <div class="btn-group">

                                                                            </div>

                                                                            </button>
                                                                        </div>

                                                                        <div class="mailbox-read-message">
                                                                            <center>
                                                                                <p><?php echo $k->isi_pengaduan; ?></p>
                                                                            </center>

                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">file terlampir</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <?php if (file_exists('asset/assets/dokumen/' . $k->upload_file)) : ?>
                                                                                <p><strong>Nama File:</strong> <?= $k->upload_file; ?></p>
                                                                                <p><strong>Ukuran File:</strong> <?= get_file_size('asset/assets/dokumen/' . $k->upload_file); ?></p>
                                                                                <a href="<?= base_url('asset/assets/dokumen/' . $k->upload_file); ?>" class="btn btn-primary" download>
                                                                                    <i class="fas fa-cloud-download-alt"></i> Download
                                                                                </a>
                                                                            <?php else : ?>
                                                                                <p>Belum ada file yang di-upload atau file tidak ditemukan.</p>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-footer -->
                                                                    <div class="card-footer">
                                                                        <div class="float-right">
                                                                        </div>
                                                                        <center>
                                                                            <button type="button" class="btn btn-default" onclick="printContent()"><i class="fas fa-print"></i> Print</button>
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

<script>
    function printContent() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Cetak Pengaduan</title></head><body>');

        // Menambahkan bagian-bagian yang diinginkan
        printWindow.document.write('<h3>Nama Pengadu: <?php echo $k->nama_pengadu; ?></h3>');
        printWindow.document.write('<h3>Email Pengadu: <?php echo $k->email_pengadu; ?></h3>');
        printWindow.document.write('<h3>Subject: <?php echo $k->subjek; ?></h3>');
        printWindow.document.write('<p>Detail Pesan: <?php echo $k->isi_pengaduan; ?></p>');

        // Menambahkan informasi file terlampir jika ada
        <?php if (file_exists('asset/assets/dokumen/' . $k->upload_file)) : ?>
            printWindow.document.write('<p><strong>Nama File Terlampir:</strong> <?= $k->upload_file; ?></p>');
            printWindow.document.write('<p><strong>Ukuran File Terlampir:</strong> <?= get_file_size('asset/assets/dokumen/' . $k->upload_file); ?></p>');

            // Menambahkan tag img untuk menampilkan gambar
            var imgPath = '<?php echo base_url('asset/assets/dokumen/' . $k->upload_file); ?>';
            printWindow.document.write('<img src="' + imgPath + '" style="max-width: 50%;" />');
        <?php endif; ?>

        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>