<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item">DETAIL PENGAJUAN</li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-12">
            <h3 style="text-align: center; color:rgb(17, 99, 53)">DETAIL PENGAJUAN</h3>
            <a href="<?= base_url('pengajuan/form') ?>" class="btn btn-info">➕ Ajukan Surat</a><br><br>

            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>

            <div class="box-body table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                    <thead  class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Perusahaan</th>
                            <th class="text-center">NPWP</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Penanggung Jawab</th>
                            <th class="text-center">Kontak</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Negara Tujuan</th>
                            <th class="text-center">Metode Pengiriman</th>
                            <th class="text-center">Dokumen</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pengajuan as $p): ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->nama_perusahaan); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->npwp_perusahaan); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->alamat_perusahaan); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->pj_perusahaan); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->kontak); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->nama_produk); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->jumlah_barang); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->negara_tujuan); ?></td>
                            <td class="text-center"><?= htmlspecialchars($p->metode_pengiriman); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('uploads/' . $p->dokumen_pendukung); ?>" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fa fa-file"></i> Lihat Dokumen
                                </a>
                            </td>
                            <td class="text-center">
    <?php if ($p->status_pengajuan == 'Disetujui'): ?>
        <a href="<?= base_url('uploads/surat/' . $p->surat_rekomendasi); ?>" target="_blank" class="btn btn-success btn-sm">
            <i class="fa fa-download"></i> Unduh Surat
        </a>
    <?php elseif ($p->status_pengajuan == 'Ditolak'): ?>
        <span class="label label-warning">Ditolak</span>
        <br>
        <small><strong>Alasan:</strong> <?= htmlspecialchars($p->alasan_penolakan, ENT_QUOTES, 'UTF-8'); ?></small>
    <?php else: ?>
        <span class="badge bg-warning"><?= htmlspecialchars($p->status_pengajuan); ?></span>
    <?php endif; ?>
</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php $this->load->view('front/footer'); ?>

<link href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css"/>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "pageLength": 5, 
            "bPaginate": true, 
            "bLengthChange": true, 
            "bFilter": true,
            "bSort": true, 
            "bInfo": true, 
            "bAutoWidth": false, 
            "aaSorting": [[0, 'asc']], 
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]] 
        });
    });
</script>
