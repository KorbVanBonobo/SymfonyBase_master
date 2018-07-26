<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailCommandesRepository")
 */
class DetailCommandes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="commande", inversedBy="detailCommandes")
    * @ORM\JoinColumn(onDelete="CASCADE")
    */
    private $commande;

    /**
    * @ORM\Column(type="integer")
    */
    private $quantite;

    /**
    * @ORM\Column(type="float")
    */
    private $prix;

      /**
    * @ORM\ManyToOne(targetEntity="Oeuvre", inversedBy="DetailCommandes")
    * @ORM\JoinColumn(onDelete="SET NULL")        
    */
    private $oeuvres;





    // GETTER ET SETTER
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of commande
     */ 
    public function getCommande()
    {
        return $this->commande;
    }
    /**
     * Set the value of commande
     *
     * @return  self
     */ 
    public function setCommande($commande)
    {
        $this->commande = $commande;
        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }
    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }
    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
}
