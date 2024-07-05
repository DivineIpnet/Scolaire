<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\VilleRepository")
 * @ORM\Table(name="villes")
 */
class Ville
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Pays", inversedBy="villes", cascade={"persist"})
     * @ORM\JoinColumn(name="countries_id", referencedColumnName="id")
     */
    //private $pays;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Ecole", mappedBy="ville", cascade={"persist"})
     */
    private $ecole;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of pays
     */
    /*public function getPays()
    {
        return $this->pays;
    }*/

    /**
     * Set the value of pays
     *
     * @return  self
     */
   /* public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }*/

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of ecole
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * Set the value of ecole
     *
     * @return  self
     */
    public function setEcoles($ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }
}
