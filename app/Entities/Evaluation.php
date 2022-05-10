<?php

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\EvaluationRepository")
 * //@ORM\InheritanceType("JOINED")
 * @ORM\Table(name="evaluations")
 */
class Evaluation
//extends User
{

    protected $table = 'evaluation';

    public $timestamps = false;


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $updatedAt;

}
