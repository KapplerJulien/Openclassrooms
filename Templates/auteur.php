<?php
$this->title = "Auteur"; 

?>

<?php
// var_dump($compteAuteur);
foreach ($compteAuteur as $parametre){
    // var_dump($parametre);
    // Modifier getter et setter de User.
    ?>
                <div>
                    <p><?= htmlspecialchars($parametre['NomUtilisateur']);?></p>
                    <p><?= htmlspecialchars($parametre['PrenomUtilisateur']);?></p>
                    <p><?= htmlspecialchars($parametre['CodePostaleUtilisateur']);?></p>
                    <p><?= htmlspecialchars($parametre['VilleUtilisateur']);?></p>
                    <p><?= htmlspecialchars($parametre['MailUtilisateur']);?></p>
                </div>
                <br>
                <?php
}
?>

<a href="../public/index.php?route=nouvelArticle"> Nouvel article </a>

<?php
foreach ($articlesId as $article)
            {
                ?>
                <div>
                    <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
                    <p><?= htmlspecialchars($article->getContent());?></p>
                    <p><?= htmlspecialchars($article->getAuthor());?></p>
                    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
                    <a href="../public/index.php?route=suppressionArticle&articleId=<?= htmlspecialchars($article->getId());?>">Supprimer le post</a>
                    <a href="../public/index.php?route=pageModifArticle&articleId=<?= htmlspecialchars($article->getId());?>">Modifier le post</a>
                </div>
                <br>   
                <?php
                // var_dump($article->getId());
            }
            ?>        