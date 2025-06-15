<!DOCTYPE html>
<html>
<head>
    <title>Edit Media</title>
</head>
<body>
    <h2>Edit Media</h2>
    <form method="POST" action="<?= base_url('admin/media/update/'.$media->id_foto) ?>" enctype="multipart/form-data">
        <label>Pilih Album:</label>
        <select name="id_album">
            <?php foreach ($albums as $album): ?>
                <option value="<?= $album->id_album ?>" <?= ($album->id_album == $media->id_album) ? 'selected' : '' ?>><?= $album->nama_album ?></option>
            <?php endforeach; ?>
        </select>
        <label>Nama Media:</label>
        <input type="text" name="nama_foto" value="<?= $media->nama_foto ?>" required>
        <label>Upload Foto Baru (opsional):</label>
        <input type="file" name="foto">
        <button type="submit">Update</button>
    </form>
</body>
</html>
