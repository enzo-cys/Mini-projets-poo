<?php
/**
 * 🎮 PROJET 12 : JEU RPG - COMBAT D'ARÈNE
 * Concept : Assembler TOUS les concepts POO dans un mini-jeu
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer le TRAIT Attaquant (compétence commune)
// ─────────────────────────────────────────────────────────────────────────
//
// Crée un trait 'Attaquant' avec :
// - Méthode attaquer($cible) qui :
//   * Inflige $this->attaque points de dégâts à la cible
//   * Affiche "⚔️ [nom] attaque [cible] et inflige X dégâts !"
//   * Appelle $cible->recevoirDegats($degats)
//
// Indice : $this->attaque sera défini dans la classe qui utilise le trait




// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe ABSTRAITE Personnage
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe ABSTRAITE 'Personnage' avec :
// - Propriété STATIC private $totalPersonnages = 0
// - Propriétés PROTECTED : $nom, $vie, $attaque
// - Propriété PRIVATE : $estVivant = true
// - Constructeur qui :
//   * Incrémente $totalPersonnages
//   * Initialise nom, vie, attaque
//   * Affiche "✨ [nom] entre dans l'arène ! (Vie: X, Attaque: Y)"
// - Méthode recevoirDegats($degats) qui :
//   * Réduit $vie
//   * Si vie <= 0 : met $estVivant à false et affiche "💀 [nom] est KO !"
//   * Sinon : affiche "💔 [nom] a X PV restants"
// - Méthode getEstVivant() qui retourne $estVivant
// - Méthode STATIC getTotalPersonnages()
// - Méthode ABSTRAITE crier() (chaque personnage crie différemment)




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer la classe Guerrier
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Guerrier' qui :
// - HÉRITE de Personnage
// - UTILISE le trait Attaquant
// - Constructeur : appelle parent avec vie=100, attaque=20
// - Méthode crier() : "🗡️ POUR L'HONNEUR !"




// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer la classe Mage
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Mage' qui :
// - HÉRITE de Personnage
// - UTILISE le trait Attaquant
// - Constructeur : appelle parent avec vie=70, attaque=35
// - Méthode crier() : "🔮 PAR LA MAGIE !"
// - Méthode BONUS sortSpecial($cible) : inflige 50 dégâts fixes
//   * Affiche "✨ [nom] lance BOULE DE FEU ! 💥"




// ─────────────────────────────────────────────────────────────────────────
// TODO 5 : Créer la classe Archer
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Archer' qui :
// - HÉRITE de Personnage
// - UTILISE le trait Attaquant
// - Constructeur : appelle parent avec vie=80, attaque=25
// - Méthode crier() : "🏹 TIR MORTEL !"




// ─────────────────────────────────────────────────────────────────────────
// TODO 6 : Créer la classe Arene (le jeu)
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Arene' avec :
// - Méthode combat($perso1, $perso2) qui :
//   * Affiche "⚔️ COMBAT : [nom1] VS [nom2]"
//   * Les deux personnages crient
//   * Tour par tour jusqu'à ce qu'un personnage soit KO
//   * Retourne le gagnant




// ─────────────────────────────────────────────────────────────────────────
// TODO 7 : LE GRAND TOURNOI !
// ─────────────────────────────────────────────────────────────────────────
//
// 1. Crée 3 personnages :
//    - Conan le Guerrier
//    - Gandalf le Mage
//    - Legolas l'Archer
//
// 2. Crée une Arene
//
// 3. Fais combattre :
//    - Combat 1 : Conan VS Gandalf
//    - Le mage utilise son sort spécial !
//    - Combat 2 : Le gagnant VS Legolas
//
// 4. Affiche les statistiques :
//    - Total de personnages créés
//    - Le CHAMPION final




// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 12
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Assembler tous les concepts POO dans un projet réel
// ✅ Traits, héritage, polymorphisme, encapsulation, static
// ✅ Créer un mini-jeu de combat avec des classes bien structurées
//
// 🎯 Prochaine étape : Tu es prêt pour Symfony/Laravel !
//
?>
<?php

trait Attaquant
{
    public function attaquer($cible)
    {
        if (!$this->getEstVivant() || !$cible->getEstVivant()) {
            return;
        }
        $degats = $this->attaque;
        echo "⚔️ " . $this->getNom() . " attaque " . $cible->getNom() . " et inflige $degats dégâts !<br>";
        $cible->recevoirDegats($degats);
    }
}

abstract class Personnage
{
    private static $totalPersonnages = 0;
    protected $nom;
    protected $vie;
    protected $attaque;
    private $estVivant = true;

    public function __construct($nom, $vie, $attaque)
    {
        self::$totalPersonnages++;
        $this->nom = $nom;
        $this->vie = $vie;
        $this->attaque = $attaque;
        $this->estVivant = true;
        echo "✨ " . $this->nom . " entre dans l'arène ! (Vie: {$this->vie}, Attaque: {$this->attaque})<br>";
    }
    public function recevoirDegats($degats)
    {
        if (!$this->estVivant) return;
        $this->vie -= $degats;
        if ($this->vie <= 0) {
            $this->vie = 0;
            $this->estVivant = false;
            echo "💀 " . $this->nom . " est KO !<br>";
        } else {
            echo "💔 " . $this->nom . " a {$this->vie} PV restants<br>";
        }
    }

    public function getEstVivant()
    {
        return $this->estVivant;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public static function getTotalPersonnages()
    {
        return self::$totalPersonnages;
    }

    abstract public function crier();
}
class Guerrier extends Personnage
{
    use Attaquant;

    public function __construct($nom)
    {
        parent::__construct($nom, 100, 20);
    }

    public function crier()
    {
        echo "🗡️ POUR L'HONNEUR !<br>";
    }
}
class Mage extends Personnage
{
    use Attaquant;

    public function __construct($nom)
    {
        parent::__construct($nom, 70, 35);
    }

    public function crier()
    {
        echo "🔮 PAR LA MAGIE !<br>";
    }

    public function sortSpecial($cible)
    {
        if (!$this->getEstVivant() || !$cible->getEstVivant()) return;
        $degats = 50;
        echo "✨ " . $this->nom . " lance BOULE DE FEU ! 💥<br>";
        echo "🔥 " . $this->nom . " inflige $degats dégâts magiques à " . $cible->getNom() . " !<br>";
        $cible->recevoirDegats($degats);
    }
}
class Archer extends Personnage
{
    use Attaquant;

    public function __construct($nom)
    {
        parent::__construct($nom, 80, 25);
    }

    public function crier()
    {
        echo "🏹 TIR MORTEL !<br>";
    }
}
class Voleur extends Personnage
{
    use Attaquant;
    public function __construct($nom)
    {
        parent::__construct($nom, 60, 30);
    }
    public function crier()
    {
        echo "🥷 Discrétion et rapidité !<br>";
    }
}
class Paladin extends Personnage 
{
    use Attaquant;
    public function __construct($nom)
    {
        parent::__construct($nom, 110, 18);
    }
    public function crier()
    {
        echo "🛡️ Je protège les innocents !<br>";
    }
}
class Valkyrie extends Personnage 
{
    use Attaquant;
    public function __construct($nom)
    {
        parent::__construct($nom, 120, 22);
    }
    public function crier()
    {
        echo "⚔️ Pour le Valhalla !<br>";
    }
}
class Berserker extends Personnage 
{
    use Attaquant;
    public function __construct($nom)
    {
        parent::__construct($nom, 90, 40);
    }
    public function crier()
    {
        echo "🔥 RAGE ET FUREUR !<br>";
    }
}
class Sorciere extends Personnage
{
    use Attaquant;
    public function __construct($nom)
    {
        parent::__construct($nom, 75, 38);
    }
    public function crier()
    {
        echo "🕸️ Ma magie est noire !<br>";
    }
    public function sortSpecial($cible)
    {
        if (!$this->getEstVivant() || !$cible->getEstVivant()) return;
        $degats = 45;
        echo "🧙‍♀️ " . $this->nom . " lance MALÉDICTION ! 💀<br>";
        echo "⚡ " . $this->nom . " inflige $degats dégâts magiques à " . $cible->getNom() . " !<br>";
        $cible->recevoirDegats($degats);
    }
}
class Tireur extends Personnage
{
    use Attaquant;
    public function __construct($nom)
    {
        parent::__construct($nom, 70, 32);
    }
    public function crier()
    {
        echo "🔫 La précision avant tout !<br>";
    }
}

class Arene
{
    public function combat($perso1, $perso2)
    {
        echo "<br>";
        echo "COMBAT : " . $perso1->getNom() . " VS " . $perso2->getNom() . "<br>";
        $perso1->crier();
        $perso2->crier();

        $tour = 1;
        while ($perso1->getEstVivant() && $perso2->getEstVivant()) {
            echo "<br>--- Tour $tour ---<br>";
            $perso1->attaquer($perso2);
            if (!$perso2->getEstVivant()) break;
            $perso2->attaquer($perso1);
            $tour++;
        }

        $gagnant = null;
        if ($perso1->getEstVivant()) {
            echo "🏆 VICTOIRE DE " . $perso1->getNom() . " !<br>";
            $gagnant = $perso1;
        } elseif ($perso2->getEstVivant()) {
            echo "🏆 VICTOIRE DE " . $perso2->getNom() . " !<br>";
            $gagnant = $perso2;
        } else {
            echo "⚠️ Aucun gagnant, ils sont tous deux KO !<br>";
        }
        return $gagnant;
    }
}

echo "🎮 JEU RPG - COMBAT D'ARÈNE<br>";
echo "🏟️ BIENVENUE AU GRAND TOURNOI !<br><br>";

$combattants = [
    new Guerrier("Conan"),
    new Mage("Gandalf"),
    new Archer("Legolas"),
    new Voleur("Tyrion l'Esquiveur"),
    new Paladin("Arthur le Paladin"),
    new Valkyrie("Hilda la Valkyrie"),
    new Berserker("Ragnar le Berserker"),
    new Sorciere("Morgane la Sorcière"),
    new Tireur("Robin le Tireur"),
];

$arene = new Arene();
echo "<br>--- DÉBUT DU TOURNOI ---<br>";

$gagnant = $combattants[0];
for ($i = 1; $i < count($combattants); $i++) {
    if (!$gagnant->getEstVivant()) {
        echo "<br>😵 Le précédent vainqueur est KO, le suivant prend sa place !<br>";
        $gagnant = $combattants[$i];
        continue;
    }
    $challenger = $combattants[$i];
    echo "<br>NOUVEAU DUEL : " . $gagnant->getNom() . " VS " . $challenger->getNom() . "<br>";

    if ($gagnant instanceof Mage && $challenger->getEstVivant()) {
        echo "→ Gandalf utilise son sort spécial d'entrée !<br>";
        $gagnant->sortSpecial($challenger);
        sleep(1);
    }
    if ($gagnant instanceof Sorciere && $challenger->getEstVivant()) {
        echo "→ Morgane lance sa malédiction !<br>";
        $gagnant->sortSpecial($challenger);
        sleep(1);
    }
    $vainqueur = $arene->combat($gagnant, $challenger);
    if ($vainqueur) {
        $gagnant = $vainqueur;
        echo "<br>⚡ Le vainqueur poursuit le tournoi !<br>";
    } else {
        echo "Aucun vainqueur...<br>";
        $gagnant = $challenger;
    }
    sleep(1);
}
echo "<br>=== TOURNOI TERMINÉ ===<br>";
echo "Total de personnages créés : " . Personnage::getTotalPersonnages() . "<br>";
echo "CHAMPION DE L'ARÈNE : " . ($gagnant ? $gagnant->getNom() : "Aucun (égalité)") . "<br>";
?>