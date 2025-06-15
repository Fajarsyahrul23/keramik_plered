<?php $this->load->view('back/meta'); ?>
<div class="wrapper">
    <?php $this->load->view('back/navbar'); ?>
    <?php $this->load->view('back/sidebar'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1 style="text-align: center; color:rgb(17, 99, 53)">DAFTAR PENGAJUAN SURAT</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active"><?php echo $title ?></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="table-responsive no-padding">
                                <table id="datatable" class="table table-striped">
                                <thead>
    <tr>
        <th style="text-align: center">No</th>
        <th style="text-align: center">Nama Perusahaan</th>
        <th style="text-align: center">NPWP</th>
        <th style="text-align: center">Alamat Perusahaan</th>
        <th style="text-align: center">Penanggung Jawab</th>
        <th style="text-align: center">Kontak</th>
        <th style="text-align: center">Produk</th>
        <th style="text-align: center">Jumlah Barang Perkontainer</th>
        <th style="text-align: center">Negara Tujuan</th>
        <th style="text-align: center">Metode Pengiriman</th>
        <th style="text-align: center">Dokumen Pendukung</th>
        <th style="text-align: center">Status</th>
        <th style="text-align: center">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; foreach ($pengajuan as $p): ?>
    <tr>
        <td style="text-align: center;"><?= $no++; ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->nama_perusahaan); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->npwp_perusahaan); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->alamat_perusahaan); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->pj_perusahaan); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->kontak); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->nama_produk); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->jumlah_barang); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->negara_tujuan); ?></td>
        <td style="text-align: center;"><?= htmlspecialchars($p->metode_pengiriman); ?></td>
        <td style="text-align: center;">
            <a href="<?= base_url('uploads/' . $p->dokumen_pendukung); ?>" target="_blank" class="btn btn-info btn-sm">
                <i class="fa fa-file"></i> Lihat Dokumen
            </a>
        </td>
        </td>
        <td style="text-align: center;">
            <?php if ($p->status_pengajuan == 'Pending'): ?>
                <a href="<?= base_url('admin/pengajuan/preview_surat/' . $p->id_pengajuan); ?>" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fa fa-eye"></i> Preview Surat
                </a>
                <a href="<?= base_url('admin/pengajuan/setujui/' . $p->id_pengajuan); ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-check"></i> Setujui
                </a>
            <?php elseif ($p->status_pengajuan == 'Ditolak'): ?>
                <span class="label label-warning">Ditolak</span><br>
                <small><strong>Alasan:</strong> <?= htmlspecialchars($p->alasan_penolakan); ?></small>
            <?php else: ?>
                <span class="label label-success">Disetujui</span><br>
                <a href="<?= base_url('uploads/surat/' . $p->surat_rekomendasi); ?>" target="_blank" class="btn btn-info btn-sm">
                    <i class="fa fa-download"></i> Unduh Surat
                </a>
            <?php endif; ?>
        </td>
        <td style="text-align: center;">
            <?php if ($p->status_pengajuan == 'Pending'): ?>
                <form action="<?= base_url('admin/pengajuan/tolak/' . $p->id_pengajuan); ?>" method="post" style="display:inline;">
                    <input type="text" name="alasan_penolakan" class="form-control input-sm" placeholder="Alasan Penolakan" required>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Tolak
                    </button>
                </form>
            <?php endif; ?>
            <a href="<?= base_url('admin/pengajuan/hapus/' . $p->id_pengajuan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                <i class="fa fa-trash"></i> Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

 </table>
    </div>
          </div>
         </div>
         </div>
</div>
        </section>
    </div>
    <?php $this->load->view('back/footer'); ?>
</div>
<?php $this->load->view('back/js'); ?>
<link href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css"/>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        "pageLength": 5, 
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "aaSorting": [[0,'asc']],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]]
    });
</script>
</body>
</html>
