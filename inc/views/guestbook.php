<?php require 'header.php'?>
    <h1>Guestbook</h1>
    <ul><?php foreach($this->messages as $message){ ?>
            <li><div id="<?= $message['id']?>"><?= $message['text']?></div></li>
        <?php } ?>


    </ul>
<?php require 'footer.php'?>