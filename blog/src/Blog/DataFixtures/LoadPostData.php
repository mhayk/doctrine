<?php

namespace Blog\DataFixtures;

use Blog\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData implements FixtureInterface {
    const NUMBER_OF_POSTS = 10;

    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= self::NUMBER_OF_POSTS; $i++) {
            $post = new Post();
            $post->setTitle(sprintf('Blog post number %d',$i));
            $post->setBody("Lorem ipsum dolor sit amet, consectetur adipiscing elit.");
            $post->setPublicationDate(new \DateTime(sprintf('-%d days', self::NUMBER_OF_POSTS - $i)));

            $manager->persist($post);
        }

        $manager->flush();
    }
}