<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    public function getId()
    {
        return $this->id;
    }

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="commande")
    * @ORM\JoinColumn(onDelete="SET NULL")        
    */
    private $user;  

    /**
    * @ORM\Column(type="float")
    */
    private $montant;

    /**
    * @ORM\Column(type="datetime")
    */
    private $date_enregistrement;

    /**
    * @ORM\Column(type="string", length=50)
    */
    private $etat;

    /**
    *  @ORM\OneToMany(targetEntity="DetailCommandes", mappedBy="commande" , cascade="all")
    */
    private $detailCommandes;


    // CONSTRUCTEUR
    public function __construct(){
        $this->date_enregistrement = new \DateTime;
    } 
    


    // GETTER ET SETTER
    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }
    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;
        return $this;
    }

    /**
     * Get the value of date_enregistrement
     */ 
    public function getDateEnregistrement()
    {
        return $this->date_enregistrement;
    }
    /**
     * Set the value of date_enregistrement
     *
     * @return  self
     */ 
    public function setDateEnregistrement($date_enregistrement)
    {
        $this->date_enregistrement = $date_enregistrement;
        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }
    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * Get the value of detailCommandes
     */ 
    public function getDetailCommandes()
    {
        return $this->detailCommandes;
    }
    /**
     * Set the value of detailCommandes
     *
     * @return  self
     */ 
    public function setDetailCommandes($detailCommandes)
    {
        $this->detailCommandes = $detailCommandes;
        return $this;
    }

    public function __toString()
    {
        return  $this->etat   ;
    }
}
