<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {
  $article = Article::getWithCategories($conn, $_GET['id']);
} else {
  $article = null;
}

//var_dump($article);

?>
<?php require 'includes/header.php'; ?>

<?php if ($article) : ?>

  <atricle>
    <h2><?= htmlspecialchars($article[0]['title']); ?></h2>

    <time datetime="<?= $article[0]['published_at'] ?>"><?php
        $datetime = new Datetime($article[0]['published_at']);
        echo $datetime->format("j F, Y");
     ?></time>

    <?php if ($article[0]['category_name']) : ?>
      <p>Categories:
        <?php foreach ($article as $a) : ?>
          <?= htmlspecialchars($a['category_name']); ?>
        <?php endforeach; ?>
      </p>
    <?php endif; ?>

    <?php if ($article[0]['image_file']) : ?>
      <img src="/uploads/<?= $article[0]['image_file']; ?>"
    <?php endif; ?>

    <p><?= htmlspecialchars($article[0]['content']); ?></p>
  </article>

<?php else: ?>
  <p>Articles not found.</p>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>
