<div class="col-md-6">
  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-primary"><?=esc($row['category'] ?? 'Unknown')?></strong>
      
      <a href="<?=ROOT?>/post/<?=$row['slug']?>">
        <h3 class="mb-0"><?=esc($row['title'])?></h3>
      </a>
      <div class="mb-1 text-muted"><?=date("jS M, Y", strtotime($row['date']))?></div>
      <p class="card-text mb-auto">
    <?php
    // Assume $row['content'] contains the full content of the post.
    // Strip any HTML tags from the content and truncate it to 100 characters.
    $preview = strip_tags($row['content']);
    $preview = substr($preview, 0, 100);
    echo htmlspecialchars($preview) . '...';
    ?>
    <a href="<?= ROOT ?>/post/<?= $row['slug'] ?>" class="stretched-link">Continue reading...</a>
</p>

    </div>
    <div class="col-lg-5 col-12 d-lg-block">
      <a href="<?=ROOT?>/post/<?=$row['slug']?>" class="d-block h-100 image-container">
        <img class="img-fluid w-100 h-100" style="object-fit:cover;" src="<?=get_image($row['image'])?>" alt="<?=esc($row['title'])?>">
        <div class="overlay">
          <p><?=esc($row['title'])?></p>
        </div>
      </a>
    </div>
  </div>
</div>
