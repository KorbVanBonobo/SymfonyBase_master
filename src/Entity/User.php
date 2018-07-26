<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\Column(type="string", length=255, nullable=true )
    */
    private $nom;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    private $prenom;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    private $adresse;

    /**
    * @ORM\Column(type="string" , length=5, nullable=true)
    */
    private $codePostal;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="User")       
     */
    private $commandes;

     /**
     * @ORM\OneToMany(targetEntity="Oeuvre", mappedBy="User")       
     */
    private $oeuvres;

    public function __construct()
    {
        parent::__construct();
        $this->addRole('ROLE_ACHETEUR');
    }

    public function getId()
    {
        return $this->id;
    }

    

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }
    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }
    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * Get the value of commandes
     */ 
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Set the value of commandes
     *
     * @return  self
     */ 
    public function setCommandes($commandes)
    {
        $this->commandes = $commandes;

        return $this;
    }

    /**
     * Get the value of oeuvres
     */ 
    public function getOeuvres()
    {
        return $this->oeuvres;
    }

    /**
     * Set the value of oeuvres
     *
     * @return  self
     */ 
    public function setOeuvres($oeuvres)
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    
    public function __toString()
    {
        return $this->getPrenom() . ' ' . $this->getNom();
    }
}
