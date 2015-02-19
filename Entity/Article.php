<?php

namespace Sh4ka\NewsORMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Article
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
     * @ORM\Column(name="url", type="string", length=2000)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=2000, nullable=true)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tagged", type="boolean", nullable=true, options={"default":0})
     */
    private $tagged;

    /**
     * @ORM\ManyToOne(targetEntity="Source")
     **/
    private $source;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="articles_tags")
     **/
    private $tags;

    public function __construct() {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addTag(Tag $tag)
    {
        $tag->addArticle($this); // synchronously updating inverse side
        $this->tags[] = $tag;
    }

    /**
     * <description>
     *
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * <description>
     *
     * @param mixed $tags <param_description>
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
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
     * Set url
     *
     * @param string $url
     * @return Article
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * <description>
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * <description>
     *
     * @param string $title <param_description>
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }



    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     * @return Article
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * <description>
     *
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * <description>
     *
     * @param mixed $source <param_description>
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * <description>
     *
     * @return boolean
     */
    public function isTagged()
    {
        return $this->tagged;
    }

    /**
     * <description>
     *
     * @param boolean $tagged <param_description>
     *
     * @return $this
     */
    public function setTagged($tagged)
    {
        $this->tagged = $tagged;
        return $this;
    }



}
