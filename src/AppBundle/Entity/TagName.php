<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagName
 *
 * @ORM\Table(name="tag_name")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagNameRepository")
 */
class TagName
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="suggested", type="boolean")
     */
    private $suggested;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var TagContent[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TagContent", mappedBy="tag", fetch="EXTRA_LAZY")
     */
    private $contents;

    public function __construct()
    {
        $this->suggested = true;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * Set id
     *
     * @param $id
     *
     * @return TagName
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TagName
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
     * Set suggested
     *
     * @param boolean $suggested
     *
     * @return TagName
     */
    public function setSuggested($suggested)
    {
        $this->suggested = $suggested;

        return $this;
    }

    /**
     * Get suggested
     *
     * @return bool
     */
    public function getSuggested()
    {
        return $this->suggested;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return TagName
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return TagContent[]
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param TagContent[] $contents
     *
     * @return TagName
     */
    public function setContents($contents)
    {
        $this->contents = $contents;

        return $this;
    }
}

