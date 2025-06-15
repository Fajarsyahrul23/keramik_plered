<div class="bs-callout bs-callout-primary mt-3">
  <h4><i class="fa fa-newspaper-o"></i> berita Terbaru</h4>
</div>
<ul class="list-group">
  <?php
  foreach ($berita_sidebar as $berita_sidebar) {
  ?>
    <li class="list-group-item">
      <span class="badge">NEW</span>
      <?php echo anchor('berita/read/' . $berita_sidebar->slug_berita . '', '' . $berita_sidebar->nama_berita . '') ?>
    </li>
  <?php } ?>
</ul>