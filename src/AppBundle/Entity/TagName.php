<?php

namespace AppBundle\Entity;

use AppBundle\Service\FieldUtils;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @var int
     *
     * @ORM\Version
     * @ORM\Column(name="version", type="integer")
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="approved", type="boolean")
     */
    private $approved;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="example", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $example;

    /**
     * @var bool
     *
     * @ORM\Column(name="use_as_filter", type="boolean")
     */
    private $useAsFilter;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $showInSearchResults;

    /**
     * @var TagContent[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TagContent", mappedBy="tag", fetch="EXTRA_LAZY", orphanRemoval=true)
     */
    private $contents;

    /**
     * @var string
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string", nullable=true)
     */
    private $createdBy;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Gedmo\Blameable(on="update")
     */
    private $updatedBy;

    public function __construct()
    {
        $this->approved = true;
        $this->type = FieldUtils::defaultType;
        $this->useAsFilter = false;
        $this->showInSearchResults = false;
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
     * Set approved
     *
     * @param boolean $approved
     *
     * @return TagName
     */
    public function setApproved(bool $approved): TagName
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Is approved
     *
     * @return bool
     */
    public function isApproved()
    {
        return $this->approved;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return TagName
     */
    public function setDescription(string $description): TagName
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getExample()
    {
        return $this->example;
    }

    /**
     * @param string $example
     * @return TagName
     */
    public function setExample(string $example): TagName
    {
        $this->example = $example;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseAsFilter()
    {
        return $this->useAsFilter;
    }

    /**
     * @param bool $useAsFilter
     * @return TagName
     */
    public function setUseAsFilter(bool $useAsFilter): TagName
    {
        $this->useAsFilter = $useAsFilter;
        return $this;
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

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function isShowInSearchResults()
    {
        return $this->showInSearchResults;
    }

    /**
     * @param bool $showInSearchResults
     *
     * @return TagName
     */
    public function setShowInSearchResults(bool $showInSearchResults)
    {
        $this->showInSearchResults = $showInSearchResults;

        return $this;
    }
}

