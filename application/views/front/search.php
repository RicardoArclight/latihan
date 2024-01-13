<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-text">
                    <h2>Cek Status Pengaduan</h2>
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
                                    <h3 class="card-title">Hasil Pencarian</h3>
                                    <div class="card-body">
                                        <?php if ($pengaduan) : ?>
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>

                                                        <th>Tiket</th>
                                                        <th width="15%">Nama</th>
                                                        <th>Email</th>
                                                        <th>Subjek</th>
                                                        <th>Tanggal</th>
                                                        <th>Status</th>
                                                        <th width="10%">lihat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>

                                                        <td><?php echo $pengaduan->tiket; ?></td>
                                                        <td><?php echo $pengaduan->nama_pengadu; ?></td>
                                                        <td><?php echo $pengaduan->email_pengadu; ?></td>
                                                        <td><?php echo $pengaduan->subjek; ?></td>
                                                        <td><?php echo $pengaduan->tanggal_pengaduan; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($pengaduan->status_pengaduan == "Sudah") {
                                                                echo "<span class='label label-success'>Sudah Ditanggapi</span>";
                                                            } else {
                                                                echo "<span class='label label-danger'>Belum Ditanggapi</span>";
                                                            }
                                                            ?>

                                                        </td>
                                                        <td>

                                                            <a href="<?php echo base_url() . 'welcome/search_detail/' . $pengaduan->tiket; ?>" class="btn btn-warning btn-sm"> <i class="fa-sharp fa-regular fa-eye"></i> </a>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php else : ?>
                                            <p>Data tidak ditemukan.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</section>