<?php

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\PaysRepository")
 * @ORM\Table(name="pays")
 */
    class Pays extends Model
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $nameFr;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $nameEn;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $iso2;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $phoneCode;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $capital;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $currency;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $currencySymbol;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $tld;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $latitude;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $flag;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Ville", mappedBy="pays", cascade={"persist"})
     */
    private $villes;
}
