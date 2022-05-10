<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\NiveauRepository")
 * @ORM\Table(name="niveaux")
 */
class Niveau extends Model
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Ecole", inversedBy="niveaux", cascade={"persist"})
     * @ORM\JoinColumn(name="ecole_id", referencedColumnName="id")
     */
    private $ecoleid;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Classes", mappedBy="niveau", cascade={"persist"})
     */
    private $classes;
}
