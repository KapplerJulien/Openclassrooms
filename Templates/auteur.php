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
    
                <p>Votre nom : <?= $info['NomUtilisateur'];?></p>
                <p>Votre prénom : <?= $info['PrenomUtilisateur'];?></p>
                <p>Votre code postale : <?= $info['CodePostaleUtilisateur'];?></p>
                <p>Votre ville : <?= $info['VilleUtilisateur'];?></p>
                <p>Votre adresse mail : <?= $info['MailUtilisateur'];?></p>
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
                    <h2 class="section-head"><a href="../public/index.php?route=article&articleId=<?= $article->getId();?>"><?= $article->getTitle();?></a></h2>
                    <h3 class="post-subtitle"><?= $article->getChapo();?></h3>
                    <p><?= $article->getContent();?></p>
                    <blockquote class="blockquote">Rédigé par <?= $article->getAuthor();?> ,Modifié le : <?= $article->getCreatedAt();?></blockquote>
                    <form id="formRemPost" action="../public/index.php?route=pageEditArticle&articleId=<?= $article->getId();?>" method="post">
                        <input type="submit" class="btn btn-primary" name="editPostButton" id="editPostButton" value="Modifier l'article">
                    </form>
                    <form id="formEditPost" action="../public/index.php?route=remArticle&articleId=<?= $article->getId();?>" method="post">
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