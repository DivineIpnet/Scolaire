<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\PaysRepository")
 * @ORM\Table(name="pays")
 */
class Pays
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


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nameFr
     */
    public function getNameFr()
    {
        return $this->nameFr;
    }

    /**
     * Set the value of nameFr
     *
     * @return  self
     */
    public function setNameFr($nameFr)
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    /**
     * Get the value of nameEn
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set the value of nameEn
     *
     * @return  self
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get the value of iso2
     */
    public function getIso2()
    {
        return $this->iso2;
    }

    /**
     * Set the value of iso2
     *
     * @return  self
     */
    public function setIso2($iso2)
    {
        $this->iso2 = $iso2;

        return $this;
    }

    /**
     * Get the value of phoneCode
     */
    public function getPhoneCode()
    {
        return $this->phoneCode;
    }

    /**
     * Set the value of phoneCode
     *
     * @return  self
     */
    public function setPhoneCode($phoneCode)
    {
        $this->phoneCode = $phoneCode;

        return $this;
    }

    /**
     * Get the value of capital
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set the value of capital
     *
     * @return  self
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get the value of currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get the value of currencySymbol
     */
    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    /**
     * Set the value of currencySymbol
     *
     * @return  self
     */
    public function setCurrencySymbol($currencySymbol)
    {
        $this->currencySymbol = $currencySymbol;

        return $this;
    }

    /**
     * Get the value of tld
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * Set the value of tld
     *
     * @return  self
     */
    public function setTld($tld)
    {
        $this->tld = $tld;

        return $this;
    }

    /**
     * Get the value of latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude
     *
     * @return  self
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the value of longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude
     *
     * @return  self
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get the value of flag
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set the value of flag
     *
     * @return  self
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get the value of villes
     */
    public function getVilles()
    {
        return $this->villes;
    }

    /**
     * Set the value of villes
     *
     * @return  self
     */
    public function setVilles($villes)
    {
        $this->villes = $villes;

        return $this;
    }

}
