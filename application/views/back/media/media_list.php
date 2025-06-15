<h2>Media dalam Album: <?= $album->nama_album ?></h2>
<a href="<?= site_url('admin/album') ?>">Kembali ke Album</a>

<form action="<?= site_url('admin/media/upload') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_album" value="<?= $album->id_album ?>">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>

<ul>
    <?php foreach ($media as $m): ?>
        <li>
            <?= ($m->tipe == 'foto') ? "<img src='".base_url($m->file_path)."' width='100'>" : "<video width='100' controls><source src='".base_url($m->file_path)."' type='video/mp4'></video>"; ?>
            <a href="<?= site_url('admin/media/delete/'.$m->id_media) ?>">Hapus</a>
        </li>
    <?php endforeach; ?>
</ul>
