<?php require 'header.php'?>
    <h1>Guestbook</h1>
    <ul><?php foreach($this->comments as $comment){ ?>
            <li><div id="<?= $comment['id_comment']?>"><?= $comment['text']?></div></li>
        <?php } ?>


    </ul>

<?php

require 'paginator.php';
require 'form_add_comment.php';
require 'footer.php'?>