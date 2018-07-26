<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OeuvreRepository")
 */
class Oeuvre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $largeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $hauteur;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tableau;

       /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $compteur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="Oeuvre")
    * @ORM\JoinColumn(onDelete="SET NULL")        
    */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="DetailCommandes", mappedBy="Oeuvre")       
     */
    private $details_commande;  



    public function __construct()
    {
        $this->largeur = 5;
        $this->hauteur = 5;
        $this->status = false;
        $this->categorie = 'nouveau';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(int $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?int
    {
        return $this->hauteur;
    }

    public function setHauteur(int $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getTableau()
    {
        return $this->tableau;
    }

    public function setTableau($tableau): self
    {
        $this->tableau = $tableau;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

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
     * Get the value of details_commande
     */ 
    public function getDetails_commande()
    {
        return $this->details_commande;
    }

    /**
     * Set the value of details_commande
     *
     * @return  self
     */ 
    public function setDetails_commande($details_commande)
    {
        $this->details_commande = $details_commande;

        return $this;
    }

    public function __toString()
    {
        return  $this->nom   ;
    }

    /**
     * Get the value of compteur
     */ 
    public function getCompteur()
    {
        return $this->compteur;
    }

    /**
     * Set the value of compteur
     *
     * @return  self
     */ 
    public function setCompteur($compteur)
    {
        $this->compteur = $compteur;

        return $this;
    }
}
