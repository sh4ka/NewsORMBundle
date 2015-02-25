<?php

namespace Sh4ka\NewsORMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\MaxDepth;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TagRepository")
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="tags")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * @MaxDepth(1)
     **/
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     * @MaxDepth(1)
     **/
    private $articles;

    public function __construct() {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addArticle(Article $article)
    {
        $this->articles[] = $article;
    }

    /**
     * <description>
     *
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * <description>
     *
     * @param mixed $articles <param_description>
     *
     * @return $this
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
        return $this;
    }

    /**
     * <description>
     *
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * <description>
     *
     * @param mixed $parent <param_description>
     *
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
