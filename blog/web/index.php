<?php

require_once __DIR__ . '/../src/bootstrap.php';

$posts = $entityManager->getRepository('Blog\Entity\Post')->findAll();

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>My blog</title>
</head>
<body>
<h1>My blog</h1>
<?php foreach ($posts as $post) :?>
<article>
    <h1>
        <?= htmlspecialchars($post->getTitle())?>
    </h1>
    Date of publication: <?= $post->getPublicationDate()->format('Y-m-d H:i:s') ?>
    <p>
        <?= nl2br(htmlspecialchars($post->getBody()))?>
    </p>
    <ul>
        <li>
            <a href="edit-post.php?id=<?=$post->getId()?>">Edit this post</a>
        </li>
        <li>
            <a href="delete-post.php?id=<?=$post->getId()?>">Delete this post</a>
        </li>
    </ul>
</article>
<?php endforeach;
if (empty($posts)):
endif ?>
<a href="edit-post.php">
    Create a new post
</a>
</body>
</html>