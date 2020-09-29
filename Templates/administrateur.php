<?php
$this->title = "Administrateur"; 

?>

<?php

    foreach ($comments as $comment)
    {
        ?>
        <p><?= htmlspecialchars($comment->getPostName());?> </p>
        <p><?= htmlspecialchars($comment->getContent());?> </p>
        <p><?= htmlspecialchars($comment->getCreatedAt());?> </p>
        <p><?= htmlspecialchars($comment->getAuthor());?> </p>

        <form id='formReplyComment' action="../public/index.php?route=ReplyComment&idComment=<?= htmlspecialchars($comment->getId());?>" method='post'>
            <div class="formValidationButton">
                <input type="submit" name="validationButton" id="validationButton" value="Valider">
            </div>

            <div class="formRefusalButton">
                <input type="submit" name="refusalButton" id="refusalButton" value="Refuser">
            </div>
        </form>
        <?php
    }

?>


