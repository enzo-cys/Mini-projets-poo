<?php
/**
 * 🥷 PROJET 08 : TRAITS
 * Concept : Traits (réutilisation horizontale de code)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer les traits (compétences)
// ─────────────────────────────────────────────────────────────────────────
//
// Crée 3 TRAITS :
//
// Nageable :
// - Méthode nager() : "🏊 [nom] nage comme un poisson !"
//
// Volant :
// - Méthode voler() : "🦅 [nom] vole dans les airs !"
//
// Invisible :
// - Méthode seRendreInvisible() : "👻 [nom] devient invisible !"
//
// Indice : trait NomTrait { ... }




// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe Guerrier
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Guerrier' qui :
// - Utilise le trait Nageable (use Nageable;)
// - A une propriété public $nom
// - A un constructeur
// - A une méthode attaquer() : "⚔️ [nom] attaque avec son épée !"




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer la classe Magicien
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Magicien' qui :
// - Utilise PLUSIEURS traits : Nageable, Volant, Invisible
// - A une propriété public $nom
// - A un constructeur
// - A une méthode lancerSort() : "🔮 [nom] lance un sort !"
//
// Indice : use Nageable, Volant, Invisible;




// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer et tester des personnages
// ─────────────────────────────────────────────────────────────────────────
//
// Crée :
// - Un guerrier "Conan"
// - Un magicien "Gandalf"
//
// Pour le guerrier, teste :
// - attaquer()
// - nager() (du trait !)
//
// Pour le magicien, teste :
// - lancerSort()
// - voler()
// - nager()
// - seRendreInvisible()




// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 08
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Les traits : morceaux de code réutilisables comme des LEGO
// ✅ Le mot-clé use pour "clipser" des compétences
// ✅ Combiner plusieurs traits dans une seule classe
//
// 🎯 Prochaine étape : Projet 09 - Static (propriétés et méthodes partagées)
//
?>
<?php
trait Nageable {
    public function nager() {
        echo "🏊 {$this->nom} nage comme un poisson !<br>";
    }
}
trait Volant {
    public function voler() {
        echo "🦅 {$this->nom} vole dans les airs !<br>";
    }
}
trait Invisible {
    public function seRendreInvisible() {
        echo "👻 {$this->nom} devient invisible !<br>";
    }
}
class Guerrier {
    use Nageable;

    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function attaquer() {
        echo "⚔️ {$this->nom} attaque avec son épée !<br>";
    }
}
class Magicien {
    use Nageable, Volant, Invisible;

    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function lancerSort() {
        echo "🔮 {$this->nom} lance un sort !<br>";
    }
}
$guerrier = new Guerrier("Conan");
$guerrier->attaquer();
$guerrier->nager();
$magicien = new Magicien("Gandalf");
$magicien->lancerSort();
$magicien->voler();
$magicien->nager();
$magicien->seRendreInvisible();
?>