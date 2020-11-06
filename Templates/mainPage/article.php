<?php
$this->title = "Article";
$this->userConnect = $userConnect;

?>


<?php
            foreach ($article as $articleAffiche)
            {
                // var_dump($articleAffiche);
                ?>
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto">
                                <h2 class="section-head"><?= htmlspecialchars($articleAffiche->getTitle());?></h2>
                                <p><?= htmlspecialchars($articleAffiche->getContent());?></p>
                                <blockquote class="blockquote">Rédigé par <?= htmlspecialchars($articleAffiche->getAuthor());?> ,Modifié le : <?= htmlspecialchars($articleAffiche->getCreatedAt());?></blockquote>
                            </div>
                        </div>
                    </div>
                </article>
                <?php
            }

            if(!isset($comments['errorComment'])){
                // var_dump($sumComment);
                ?>
                <section>
                    <div class="section-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-10 mx-auto">
                                    <div class="row">
                                        <div class="col-sm-12 single-post-content">
                                            <div id="comments-list" class="col-sm-8 col-sm-offset-2 gap wow">
                                                <div class="mt60 mb50 single-section-title">
                                                    <h3><?= htmlspecialchars($sumComment['sumComment']);?> Comments</h3>
                                                </div>
                <?php
                foreach($comments as $comment){
                    ?>
                    <div class="media">
                        <div class="media-body">
                                <div class="well">
                                    <div class="media-heading">
                                        <span class="heading-font"><?= htmlspecialchars($comment->getAuthor());?></span>&nbsp; <small class="secondary-font"><?= htmlspecialchars($comment->getCreatedAt());?></small>
                                    </div>
                                    <p><?= htmlspecialchars($comment->getContent());?></p>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            } else { ?>
                <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto">
                                <p><?= $comments['errorComment']; ?></p>
                            </div>
                        </div>
                </div>
            <?php }

            if ($userConnect === 'connect'){ ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <hr>
                        <blockquote> Rédiger votre commentaire : </blockquote>
                        <form id="formulaireCommentaire" action="../public/index.php?route=commentArticle&articleId=<?= $articleAffiche->getId(); ?>" method="post">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                            <label>Votre message :</label>
                            <textarea rows="5" class="form-control" placeholder="Votre commentaire." name="message" id="message" required data-validation-required-message="Veuillez entrer un commentaire."></textarea>
                            <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="formCommentaireBoutonVal">
                            <input type="submit" class="btn btn-primary" name="valButton" id="valButton" value="Envoyez"> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

