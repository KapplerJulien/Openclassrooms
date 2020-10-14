<?php
$this->title = "Auteur"; 
// var_dump($userConnect);
$this->userConnect = $userConnect;

?>
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
<?php
// var_dump($compteAuteur);
foreach ($authorAccount as $info){
    // var_dump($parametre);
    // Modifier getter et setter de User.
    ?>
    
                <p>Votre nom : <?= htmlspecialchars($info['NomUtilisateur']);?></p>
                <p>Votre prénom : <?= htmlspecialchars($info['PrenomUtilisateur']);?></p>
                <p>Votre code postale : <?= htmlspecialchars($info['CodePostaleUtilisateur']);?></p>
                <p>Votre ville : <?= htmlspecialchars($info['VilleUtilisateur']);?></p>
                <p>Votre adresse mail : <?= htmlspecialchars($info['MailUtilisateur']);?></p>
                <form id="formChangeUser" action="../public/index.php?route=editUser" method="post">
                    <input type="submit" class="btn btn-primary" name="editUserButton" id="editUserButton" value="Modifier son compte">
                </form>
                <hr>
                <?php
}
?>

<form id="formAddArticle" action="../public/index.php?route=pageAddArticle" method="post">
    <input type="submit" class="btn btn-primary" name="addPostButton" id="addPostButton" value="Créer un article">
</form>
<hr>

<?php
foreach ($articlesId as $article)
            {
                ?>
                <div>
                    <h2 class="section-head"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
                    <h3 class="post-subtitle"><?= htmlspecialchars($article->getChapo());?></h3>
                    <p><?= htmlspecialchars($article->getContent());?></p>
                    <blockquote class="blockquote">Rédigé par <?= htmlspecialchars($article->getAuthor());?> ,Modifié le : <?= htmlspecialchars($article->getCreatedAt());?></blockquote>
                    <form id="formRemPost" action="../public/index.php?route=pageEditArticle&articleId=<?= htmlspecialchars($article->getId());?>" method="post">
                        <input type="submit" class="btn btn-primary" name="editPostButton" id="editPostButton" value="Modifier l'article">
                    </form>
                    <form id="formEditPost" action="../public/index.php?route=remArticle&articleId=<?= htmlspecialchars($article->getId());?>" method="post">
                        <input type="submit" class="btn btn-primary" name="remPostButton" id="remPostButton" value="Supprimer l'article">
                    </form>
                </div>
                <hr>   
                <?php
                // var_dump($article->getId());
            }
            ?>  
        </div>
    </div>
</div>      