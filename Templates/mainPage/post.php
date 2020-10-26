<?php
$this->title = "Post"; 
$this->userConnect = $userConnect;

?>

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
        <?php
            foreach ($articles as $article)
            {
                
                ?>
                <div class="container">
                    <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">
                        <h2 class="post-title">
                            <?= htmlspecialchars($article->getTitle());?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= htmlspecialchars($article->getChapo());?>
                        </h3>
                    </a>
                    <p class="post-meta"><blockquote class="blockquote">Créé par
                    <?= htmlspecialchars($article->getAuthor());?>
                    modifié le <?= htmlspecialchars($article->getCreatedAt());?></blockquote></p>
                </div>
                <hr>
                <?php
            }
            ?>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>