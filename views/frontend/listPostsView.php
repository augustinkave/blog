<?php $title = 'Blog de Jean Forteroche';

ob_start(); ?>

    <h1>Un billet simple pour l'Alaska</h1>

<?php

while ($data = $post->fetch()) { ?>

    <div class="#">
        <h2>
            <a href="../../index.php?action=post&id=<?= $data['id']; ?>"><?= htmlspecialchars($data['title']) ?></a>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h2>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
        </p>
    </div>
<?php }
$posts->closeCursor();

$content = ob_get_clean();

require 'view/frontend/template.php';
