<?php
/**
 * 🏗️ PROJET 02 : LE CONSTRUCTEUR MAGIQUE
 * Concept : Constructeur __construct()
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe CompteBancaire
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'CompteBancaire' avec :
// - Propriété public $titulaire
// - Propriété public $solde




// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Ajouter le constructeur
// ─────────────────────────────────────────────────────────────────────────
//
// Ajoute un constructeur qui :
// 1. Prend 2 paramètres : $titulaire, $soldeInitial
// 2. Initialise les propriétés
// 3. Affiche : "✅ Compte créé pour [titulaire] avec [solde]€"
//
// Indice : public function __construct($param1, $param2) { ... }




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Ajouter des méthodes
// ─────────────────────────────────────────────────────────────────────────
//
// Ajoute 2 méthodes :
//
// 1. deposer($montant) :
//    - Ajoute le montant au solde
//    - Affiche "💰 Dépôt de [montant]€"
//
// 2. afficherSolde() :
//    - Affiche "💰 Solde de [titulaire] : [solde]€"




// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer et tester des comptes
// ─────────────────────────────────────────────────────────────────────────
//
// Crée 2 comptes AVEC LE CONSTRUCTEUR :
//
// Compte 1 : Jean avec 1000€
// Compte 2 : Marie avec 500€
//
// Pour chaque compte :
// - Fais un dépôt de 200€
// - Affiche le solde
//
// Indice : $compte = new CompteBancaire("Jean", 1000);




// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 02
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Le constructeur __construct() pour initialiser automatiquement
// ✅ Créer un objet en 1 ligne au lieu de 4
// ✅ Le constructeur est appelé automatiquement lors de 'new'
//
// 🎯 Prochaine étape : Projet 03 - Public vs Private (Encapsulation)
//
?>

<?php 
class CompteBancaire {
    public $titulaire;
    public $solde;

    public function __construct($titulaire, $soldeInitial) {
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;
        echo "✅ Compte créé pour {$this->titulaire} avec {$this->solde}€<br>";
    }
    public function deposer($montant) {
        $this->solde += $montant;
        echo "💰 Dépôt de {$montant}€<br>";
    }
    public function afficherSolde() {
        echo "💰 Solde de {$this->titulaire} : {$this->solde}€<br>";
    }
}
$compte1 = new CompteBancaire("Jean", 1000);
$compte1->deposer(200);
$compte1->afficherSolde();
$compte2 = new CompteBancaire("Marie", 500);
$compte2->deposer(200);
$compte2->afficherSolde();
?>