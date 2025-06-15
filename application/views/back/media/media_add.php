<!DOCTYPE html>
<html>
<head>
    <title>Tambah Media</title>
</head>
<body>
    <h2>Tambah Media</h2>
    <form method="POST" action="<?= base_url('admin/media/insert') ?>" enctype="multipart/form-data">
        <label>Pilih Album:</label>
        <select name="id_album">
            <?php foreach ($albums as $album): ?>
                <option value="<?= $album->id_album ?>"><?= $album->nama_album ?></option>
            <?php endforeach; ?>
        </select>
        <label>Nama Media:</label>
        <input type="text" name="nama_foto" required>
        <label>Upload Foto:</label>
        <input type="file" name="foto">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
