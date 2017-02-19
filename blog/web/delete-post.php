<?php

require_once __DIR__ . '/../src/bootstrap.php';

$post = $entityManager->find('Blog\Entity\Post',$_GET['id']);

if(!$post)
{
    throw new \Exception('Post not found');
}

$entityManager->remove($post);
$entityManager->flush();

header('Location: index.php');
exit;