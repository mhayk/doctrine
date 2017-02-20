<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 *
 * @Entity
 */
class Comment {

    /**
     * @var int
     *
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $body;

    /**
     * @var \DateTime
     *
     * @Column(type="datetime")
     */
    protected $publicationDate;

    /**
     * @var Post
     *
     * @ManyToOne(targetEntity="Post", inversedBy="comments")
     */
    protected $post;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return Comment
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Add post
     *
     * @param \Blog\Entity\Post $post
     * @return Comment
     */
    public function addPost(\Blog\Entity\Post $post)
    {
        $this->post[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \Blog\Entity\Post $post
     */
    public function removePost(\Blog\Entity\Post $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPost()
    {
        return $this->post;
    }
}
