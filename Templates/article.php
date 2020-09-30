<?php
$this->title = "Article";

?>

<?php
            foreach ($article as $articleAffiche)
            {
                // var_dump($articleAffiche);
                ?>
                <div>
                    <h2><?= htmlspecialchars($articleAffiche->getTitle());?></h2>
                    <p><?= htmlspecialchars($articleAffiche->getContent());?></p>
                    <p><?= htmlspecialchars($articleAffiche->getAuthor());?></p>
                    <p>Créé le : <?= htmlspecialchars($articleAffiche->getCreatedAt());?></p>
                </div>
                <br>
                <?php
            }

            if ($connect === True){ ?>
                <form id="formulaireCommentaire" action="../public/index.php?route=commentaire&articleId=<?= $articleAffiche->getId(); ?>" method="post">
                <div class="formCommentaireMessage">
                    <label for="message">Votre message</label>
                    <textarea name="message" id="message" cols="40" rows="10" aria-invalid="false"> </textarea>
                </div>
                <div class="formCommentaireBoutonVal">
                    <input type="submit" name="boutonVal" id="boutonVal" value="Envoyez">
                </div>
                </form>
            <?php
            }
            ?>