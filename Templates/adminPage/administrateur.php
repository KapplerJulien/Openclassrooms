<?php
$this->title = "Administrateur"; 
$this->userConnect = $userConnect;

?>
<section>
        <div class="section-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="row">
                            <div class="col-sm-12 single-post-content">
                                <div id="comments-list" class="col-sm-8 col-sm-offset-2 gap wow">
<?php

if(!isset($comments['errorComment'])){
    ?>
                                    <div class="mt60 mb50 single-section-title">
                                        <h3><?= htmlspecialchars($sumComment['sumComment']);?> Commentaire(s) à valider/refuser.</h3>
                                    </div>
    <?php
    foreach($comments as $comment){
        // var_dump($comment);
        ?>
        <div class="media">
            <div class="media-body">
                    <div class="well">
                        <div class="media-heading">
                            <span class="heading-font"><?= htmlspecialchars($comment->getAuthor());?>(<?= htmlspecialchars($comment->getPostName());?>)</span>&nbsp; <small class="secondary-font"><?= htmlspecialchars($comment->getCreatedAt());?></small>
                        </div>
                        <p><?= htmlspecialchars($comment->getContent());?></p>
                        <form id='formReplyComment' action="../public/index.php?route=ReplyComment&idComment=<?= htmlspecialchars($comment->getId());?>" method='post'>
                        <input type="submit" class="btn btn-primary" name="validationButton" id="validationButton" value="Valider">
                        <input type="submit" class="btn btn-primary" name="refusalButton" id="refusalButton" value="Refuser">
                        </form>
                    </div>
            </div>
        </div>
        <hr>
        <?php
    }
} else {
echo $comments['errorComment'];
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
    




