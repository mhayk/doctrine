<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Blog Post entity
 *
 * @Entity
 */

class Post {
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @Column(type="integer")
     */
    protected $id = null;

    /**
     * @var string
     *
     * @Column(type="text")
     */
    protected $title;

    /**
     * @var string
     *
     * @Column(type="text")
     */
    protected $body;

    /**
     * @var \Datetime
     *
     * @Column(type="datetime");
     */
    protected $publicationDate;

    /**
     * @var Comments[]
     *
     * @OneToMany(targetEntity="Comment", mappedBy="Post")
     */
    protected $comments;

    /**
     * Post constructor.
     * Initializes collections
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Post
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
     * @return Post
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
     * Add comments
     *
     * @param \Blog\Entity\Comment $comments
     * @return Post
     */
    public function addComment(\Blog\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Blog\Entity\Comment $comments
     */
    public function removeComment(\Blog\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
