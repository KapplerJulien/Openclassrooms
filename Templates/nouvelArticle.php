<?php
$this->title = "Nouvel article"; 

?>



        <form id="formulaireNouvelArticle" action="../public/index.php?route=ajoutArticle" method="post" >
            <div class="formNouvelArticle">
                    <label for="titre">Titre :</label> </br>
                    <input type="text" name="titre" id="titre" required>
                    <br>
                    <label for="chapo">Chapo:</label> </br>
                    <input type="text" name="chapo" id="chapo" required>
                    <br>
                    <label for="contenu">Contenu :</label> </br>
                    <textarea name="contenu" id="contenu" cols="40" rows="10" aria-invalid="false"> </textarea>
                    
            </div>
            </br>
            <div class="formNouvelArticleBoutonVal">
                <input type="submit" name="boutonVal" id="boutonVal" value="Envoyez">
            </div>
        </form>
