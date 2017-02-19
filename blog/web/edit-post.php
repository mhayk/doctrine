<?php

use Blog\Entity\Post;

require_once __DIR__ . '/../src/bootstrap.php';

if(isset($_GET['id']))
{
    $post = $entityManager->find('Blog\Entity\Post'),$_GET['id']);

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
<form action="POST">
    
</form>
</body>
</html>
