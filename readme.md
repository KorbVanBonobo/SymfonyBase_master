# Memo Symfony
## Installation
Via composer (gestionaire de bibliothèques PHP externes)
```
composer create-project symfony/website-skeleton MonProject
```

## Dossiers
**assets:** Fichier js/scss
**bin:** Fichiers binaires tel que la console
**config:** Fichiers de configuration des modules (Sf < 4: un seul fichier config.yml)
**public:** Contient l'index.php et les fichiers statiques créés par WebPack
**src:** Tout le code source de l'application
**templates:** Contient toutes les vues (fichiers Twig)
**tests:** Fichiers pour les tests unitaires
**translations:** Fichiers de traduction (Sf < 4: les vues sont dans le dossier Resource/Views des Bundle)
**var:** Contient le cache et les fichiers log
**vendor:** Bibliothèques externes

## Webpack
Webpack permet de condenser tous les fichiers assets dans un seul
Ex tous les fichier js sont minifiés et placés dans un seul fichier

Pour installer les modules 
```
npm install --save-dev
```

## Route
Afficher les routes
```
php bin/console debug:router
```

### Annotation
Les annotations sont des instructions définies dans un commentaire doc (/** */), elles permettent de définir des paramètres rapidement sans aller dans les fichiers config
Par exemple pour définir les routes dans un controller
```
/**
 * @Route("/chemin/de/la/route")
 */
```
Avec paramètres
```
/**
 * @Route("/edit/{id}", requirements={"id":"\d+"})
 */
```

## Entity

### Annotations
Définir l'entité, annotation à mettre au dessus de la déclaration de classe
```
/**
 * @ORM\Entity(repositoryClass="Namespace\De\La\Classe")
 * @ORM\Table(name="nom_de_la_table")
 */
```

Définir une colonne
```
/**
 * @ORM\Column(name="nom_du_champ", type="string|text|integer|float|datetime|json_array", nullable=true, length=255)
 */
```

Définir une relation

Un seul objet peut être associé à un seul autre
```
/**
 * @ORM\OneToOne(targetEntity="Namespace\De\La\Classe")
 */
```

Plusieurs objets peuvent être associés à un seul autre
```
/**
 * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
 */
```
Pour une relation inverse (ex: obtenir les articles d'une catégorie)

```
/**
 * @ORM\OneToMany(targetEntity"Article", mappedBy="category")
 */
``` 

Plusieurs objets peuvent être associés à plusieurs autres
```
/**
 * @ORM\ManyToMany(targetEntity="Classe")
 */
```

Pour faire une relation ManyToMany avec paramètres il faut créer une entité intermédiaire
```
// Panier
/**
 * @ORM\OneToMany(targetEntity="PanierProduit")
 */
```
```
// PanierProduit
/**
 * @ORM\ManyToOne(targetEntity="Panier")
 */

 /**
  * @ORM\ManyToOne(targetEntity="Produit")
  */
```
 ```
// Produit
/**
 * @ORM\ManyToOne(targetEntity="PanierProduit")
 */
```

### Lifecycle

Il est possible d'indiquer à Doctrine d'appeler automatiquement des méthodes d'une entité
Par exemple avant de faire un persist

Avant la déclaration de la classe, indique à Doctrine qu'il y a des méthodes à appeler:
```
/**
 * @ORM\HasLifecycleCallbacks
 */
```

```
/**
 * @ORM\PrePersist()
 * @ORM\PreUpdate()
 * @ORM\PreRemove()
 * @ORM\PostPersist()
 * @ORM\PostUpdate()
 * @ORM\PostRemove()
 */
```
## Twig
Tester si l'utilisateur est identifié
```
{% if is_granted('IS_AUTHENTICATED_REMEMBERED') %}
{% endif %}
```

## Controller

### Ajax
Pour retourner du Json dans un controller
```
use Symfony\Component\HttpFoundation\JsonResponse;
.
.
return new JsonResponse(array(...));
```

Pour tester si la requête est en Ajax
```
if ($request->isXmlHttpRequest()) {
  ...
}
``` 