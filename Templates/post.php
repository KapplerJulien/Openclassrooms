<?php
$this->title = "Post";

?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Les articles</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
                </div>
            </div>
            </div>
        </header>

<?php
            foreach ($articles as $article)
            {
                ?>
                <div>
                    <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
                    <p><?= htmlspecialchars($article->getContent());?></p>
                    <p><?= htmlspecialchars($article->getAuthor());?></p>
                    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
                </div>
                <br>
                <?php
            }
            ?>