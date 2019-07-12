<?php

namespace app\entities\models;

use Doctrine\ORM\Persisters\Entity;

/**
 * @Entity @table(name="brands")
 */
class Brand
{
    /** @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="string") */
    protected $title;

    /** @Column(type="string") */
    protected $alias;

    /** @Column(type="strting") */
    protected $img;

    /** @Column(type="string") */
    protected $descption;

    /**
     * Brand constructor.
     * @param $id
     * @param $title
     * @param $alias
     * @param $img
     * @param $descption
     */
    public function __construct($id, $title, $alias, $img, $descption)
    {
        $this->id = $id;
        $this->title = $title;
        $this->alias = $alias;
        $this->img = $img;
        $this->descption = $descption;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param mixed $alias
     */
    public function setAlias($alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getDescption()
    {
        return $this->descption;
    }

    /**
     * @param mixed $descption
     */
    public function setDescption($descption): void
    {
        $this->descption = $descption;
    }




}