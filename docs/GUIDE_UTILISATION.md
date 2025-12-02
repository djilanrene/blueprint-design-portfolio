# Guide d'Utilisation - Template "Blueprint Design Portfolio"

## 1. Introduction

Félicitations et merci d'avoir choisi le template **Blueprint Design Portfolio** !

Ce guide a été conçu pour vous accompagner, étape par étape, de l'installation à la personnalisation complète de votre nouveau site. L'objectif est simple : vous permettre d'avoir un portfolio professionnel en ligne en moins de 30 minutes, sans toucher à une seule ligne de code complexe.

Ce template est basé sur la technologie **PHP** et utilise un système de fichiers **JSON** pour gérer le contenu. Cela signifie qu'il est :
-   **Léger et ultra-rapide.**
-   **Facile à héberger** sur n'importe quel serveur web standard (pas besoin de base de données !).
-   **Entièrement personnalisable** via une interface d'administration simple.

---

## 2. Pré-requis

Avant de commencer, assurez-vous d'avoir :

1.  **Un hébergement web :** N'importe quelle offre mutualisée supportant **PHP 7.4 ou une version plus récente**. Nous recommandons des hébergeurs comme **Hostinger**, **LWS**, ou tout hébergeur local supportant PHP.
2.  **Un client FTP :** Un logiciel pour envoyer les fichiers sur votre serveur. **FileZilla** (gratuit) est une excellente option.

---

## 3. Installation en 3 Étapes

Suivez ces étapes pour mettre votre site en ligne.

### Étape 1 : Envoyer les fichiers sur votre serveur

1.  Décompressez le fichier `blueprint-design-portfolio.zip` que vous avez téléchargé.
2.  Ouvrez le dossier `Source/` (ou `Upload/`). Il contient tous les fichiers du site (`index.php`, `src/`, `config/`, etc.).
3.  Connectez-vous à votre hébergement via votre client FTP.
4.  Naviguez jusqu'à la racine de votre site (généralement un dossier nommé `public_html` ou `htdocs`).
5.  Faites glisser **tout le contenu** du dossier `Source/` vers ce dossier racine sur votre serveur.

### Étape 2 : Lancer l'assistant d'installation

1.  Ouvrez votre navigateur web (Chrome, Firefox, etc.).
2.  Rendez-vous à l'adresse de votre nom de domaine (ex: `www.mon-portfolio.com`).
3.  Vous serez automatiquement redirigé vers l'assistant d'installation.

### Étape 3 : Configurer votre site

Sur la page d'installation :
1.  **Choisissez un mot de passe sécurisé** pour votre interface d'administration. C'est très important !
2.  **Choisissez votre couleur principale.** C'est la couleur qui sera utilisée pour les titres et les boutons (par défaut, c'est un vert néon).
3.  Cliquez sur **"Installer le site"**.

Et voilà ! Votre site est en ligne et fonctionnel.

---

## 4. Personnaliser votre Contenu

Pour modifier les textes, les images et les projets, vous devez vous connecter à l'interface d'administration (le "Cockpit").

1.  Accédez à `www.votresite.com/admin.php`.
2.  Entrez le mot de passe que vous avez choisi lors de l'installation.

Vous aurez accès à plusieurs onglets :

-   **Hero & Intro :** Modifiez le titre principal et le badge d'accueil.
-   **Navigation & Textes :** Personnalisez les liens du menu, les boutons, et les textes du pied de page.
-   **À Propos :** Gérez le contenu de la section "À Propos" de l'accueil et de la page détaillée.
-   **Projets :** **C'est ici que vous ajoutez, modifiez ou supprimez vos réalisations.** Vous pouvez choisir quels projets mettre en avant sur l'accueil.
-   **Contact :** Mettez à jour vos informations de contact et vos réseaux sociaux.
-   **SEO :** Modifiez le titre de votre site (qui apparaît dans l'onglet du navigateur) et le favicon.

**Astuce de formatage :**
Dans les zones de texte, vous pouvez utiliser ces raccourcis :
-   Mettez un mot entre `{accolades}` pour le colorer avec votre couleur principale.
-   Mettez un mot entre `*étoiles*` pour le mettre en **gras**.
-   Appuyez sur "Entrée" pour créer un saut de ligne.

---

## 5. Dépannage (FAQ)

-   **"J'ai une page blanche ou une erreur 500."**
    *Vérifiez que votre hébergeur utilise bien PHP 7.4 ou une version plus récente.*

-   **"Les images ne s'affichent pas."**
    *Vérifiez que les liens que vous avez collés dans l'admin sont corrects et commencent bien par `https://`.*

-   **"J'ai oublié mon mot de passe admin."**
    *Vous devrez supprimer le fichier `config-site.php` sur votre serveur via FTP. Cela relancera l'assistant d'installation (sans perdre vos contenus) et vous pourrez choisir un nouveau mot de passe.*

Pour toute autre question, n'hésitez pas à contacter notre support. Merci encore pour votre confiance !