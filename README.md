# Blueprint Design Portfolio - Template PHP

[![Licence](https://img.shields.io/badge/licence-MIT-blue.svg)](LICENSE.md)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.4-8892BF.svg)](https://www.php.net/)
[![Statut du Déploiement](https://github.com/VOTRE_NOM_UTILISATEUR/VOTRE_DEPOT/actions/workflows/deploy.yml/badge.svg)](https://github.com/VOTRE_NOM_UTILISATEUR/VOTRE_DEPOT/actions)

Un template de portfolio moderne, minimaliste et ultra-performant pour les designers, développeurs et créatifs. Entièrement piloté par un backoffice simple (CMS sans base de données) et basé sur une architecture PHP modulaire.

Ce dépôt contient le **code source du site public (Front-end)**. Le backoffice est volontairement exclu pour la sécurité de la démo en ligne.

➡️ **Voir la démo en direct :** [Lien vers votre site de démo](https://votre-demo.com)
➡️ **Acheter le template complet :** [Lien vers votre boutique Blueprint Cloud](https://votre-boutique.chariow.com)

![Aperçu du Portfolio](https://votre-lien-vers-un-screenshot.com/apercu.jpg)

## ✨ Philosophie du Projet

Ce projet a été conçu avec une architecture logicielle claire et une obsession pour la simplicité, tant pour l'utilisateur final que pour le développeur.

-   **Zéro Base de Données :** Tout le contenu est géré par des fichiers `JSON`, rendant le site extrêmement rapide et facile à héberger n'importe où.
-   **Architecture Modulaire PHP :** Le code est séparé en "briques" logiques (Contrôleurs, Vues, Fonctions), ce qui le rend maintenable et évolutif.
-   **Sécurité par Conception :** L'interface d'administration est séparée du code public et un script d'installation sécurise le premier déploiement.
-   **Déploiement Continu :** Les mises à jour du site de démonstration sont automatisées via GitHub Actions à chaque `push` sur la branche `main`.

## 🚀 Fonctionnalités

-   **Backoffice Complet (CMS) :** Modifiez tous les textes, images, couleurs, liens, projets et pages depuis une interface simple.
-   **Gestion de Projets Dynamique :** Ajoutez, supprimez et mettez en avant vos réalisations en quelques clics.
-   **Pages Détails Projet (Études de Cas) :** Présentez votre méthodologie avec des sections Challenge/Solution et des galeries d'images.
-   **100% Responsive :** Design adaptatif parfait pour mobile, tablette et desktop.
-   **Animations Modernes :** Effets de survol, lueurs "néon", parallaxe subtil et révélations au scroll pour une expérience utilisateur premium.
-   **Formatage de Texte "Magique" :** Écrivez naturellement dans l'admin, le site formate le texte pour vous (`{mot}` pour la couleur, `*mot*` pour le gras).

## 🛠️ Stack Technique

-   **Langage :** PHP 8+ (compatible 7.4)
-   **Styling :** CSS natif (pas de framework lourd)
-   **JavaScript :** Vanilla JS pour les animations, avec la librairie [Lenis](https://github.com/studio-freight/lenis) pour le smooth scroll.
-   **Automatisation :** GitHub Actions pour le déploiement continu via FTP.

## 📦 Installation (Pour le développement)

Ce guide est pour les développeurs souhaitant contribuer. Pour les clients, veuillez vous référer au guide d'installation fourni avec le produit acheté.

1.  **Pré-requis :** Avoir un serveur local (WAMP, XAMPP, Laragon) avec PHP activé.
2.  **Cloner le dépôt :**
    ```bash
    git clone https://github.com/VOTRE_NOM_UTILISATEUR/VOTRE_DEPOT.git
    cd VOTRE_DEPOT
    ```
3.  **Lancer le serveur :**
    ```bash
    # (Exemple avec le serveur intégré de PHP)
    php -S localhost:8000
    ```
4.  Ouvrez `http://localhost:8000` dans votre navigateur.

*Note : Pour tester le backoffice en local, vous devrez recréer manuellement le dossier `src/admin/` et le fichier `admin.php` qui sont exclus de ce dépôt.*

## 🤝 Contribution

Ce projet est maintenu par [Votre Nom]. Les suggestions d'amélioration sont les bienvenues. N'hésitez pas à ouvrir une "Issue" pour signaler un bug ou proposer une nouvelle fonctionnalité.

## 📜 Licence

Le code source de ce dépôt est sous licence [MIT](LICENSE.md).
Cela signifie que vous pouvez l'utiliser et le modifier librement.

Cependant, la version complète du template (incluant le backoffice et la documentation) vendue sur Blueprint Cloud est soumise à une licence commerciale qui interdit la revente et la redistribution.