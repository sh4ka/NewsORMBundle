<?php
/*
 * This file is part of the Mundoreader Symfony Base package.
 *
 * (c) Mundo Reader S.L.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sh4ka\NewsORMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="parent")
     **/
    private $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * <description>
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * <description>
     *
     * @param int $id <param_description>
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * <description>
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * <description>
     *
     * @param string $name <param_description>
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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


}