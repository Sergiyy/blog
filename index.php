<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

//$paginator = new Paginator(isset($_GET['page']) ? $_GET['page'] : 1, 4);
$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

?>

<?php require 'includes/header.php'; ?>

  <?php if (empty($articles)): ?>
    <p>No articles found.</p>
  <?php else: ?>

      <ul id="index">
        <?php foreach ($articles as $article): ?>
          <li>
            <atricle>
              <h2><a href="article.php?id=<?= $article['id']; ?>"><?=
              htmlspecialchars($article['title']); ?></a></h2>

              <time datetime="<?= $article['published_at'] ?>"><?php
                  $datetime = new Datetime($article['published_at']);
                  echo $datetime->format("j F, Y");
               ?></time>

              <?php if ($article['category_names']) : ?>
                <p> Categories:
                  <?php foreach ($article['category_names'] as $name) : ?>
                    <?= htmlspecialchars($name); ?>
                  <?php endforeach; ?>
                </p>
              <?php endif; ?>

              <p><?= htmlspecialchars($article['content']); ?></p>
            </article>
          </li>
        <?php endforeach; ?>
      </ul>

<?php require 'includes/pagination.php'; ?>


    <?php endif; ?>

<?php require 'includes/footer.php'; ?>
