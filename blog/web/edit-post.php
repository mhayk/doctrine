<?php

use Blog\Entity\Post;

require_once __DIR__ . '/../src/bootstrap.php';

if(isset($_GET['id']))
{
    $post = $entityManager->find('Blog\Entity\Post',$_GET['id']);

    if(!$post) {
        throw new \Exception('Post not found');
    }
}

if( 'POST' === $_SERVER['REQUEST_METHOD'] ) {

    if(!isset($post)) {
        $post = new Post();
        $entityManager->persist($post);
        $post->setPublicationDate(new \DateTime());
    }

    $post
        ->setTitle($_POST['title'])
        ->setBody($_POST['body']);

    $entityManager->flush();

    header('Location: index.php');
    exit;
}

$pageTitle = isset($post) ? sprintf('Edit post #%d',$post->getId()) : 'Create a new post'; ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title><?=$pageTitle?> - My blog</title>
</head>
<body>
<h1>
    <?=$pageTitle?>
</h1>
<form method="post">
    <label>
        Title
        <input type="text" name="title" value="<?=isset($post) ? htmlspecialchars($post->getTitle()) : ''?>" maxlength="255" required>
    </label><br>
    <label>
        Body
        <textarea name="body" id="" cols="20" rows="10" required>
            <?=isset($post) ? htmlspecialchars($post->getBody()) : '' ?>
        </textarea><br>
        <input type="submit">
    </label>
</form>
<a href="index.php">Back to the index</a>
</body>
</html>
