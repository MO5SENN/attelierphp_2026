## Activité 1
Comment le serveur peut-il savoir qu'il s'agit du même utilisateur ?

Le serveur utilise un identifiant unique de session (généralement transmis via un cookie de session nommé PHPSESSID) échangé entre le navigateur et le serveur lors de chaque requête HTTP.

Est-ce que PHP conserve automatiquement les informations entre les deux requêtes ?

Non. HTTP est un protocole sans état (stateless). Chaque requête est traitée de façon totalement indépendante

## Activité 3

Où avons-nous créé la variable ?

Dans le fichier session.php avec $_SESSION['nom'] = "Ahmed";.

2. Où avons-nous récupéré la variable ?

Dans le fichier profil.php en lisant $_SESSION['nom'].

3. Pourquoi session_start() est-il nécessaire ?

Cette fonction initialise ou restaure la session PHP courante. Sans elle, la superglobale $_SESSION n'est pas accessible et les données conservées en serveur ne sont pas chargées.

4. La variable $_SESSION est-elle une variable classique ?

Non, c'est un tableau superglobal disponible dans tous les scripts PHP de la session en cours dès que session_start() est appelé.

5. Que se passe-t-il si on ferme le navigateur puis qu'on revient sur la page ?

Par défaut, le cookie de session expire à la fermeture du navigateur, ce qui détruit la liaison avec la session serveur (la variable ne sera plus accessible)
## Activite 5
1. Pourquoi faut-il vérifier l'existence de la variable ?

Pour éviter de générer un avertissement PHP (Notice: Undefined index) si l'utilisateur accède à la page sans session active.

2. Que se passe-t-il si l'utilisateur accède directement à la page ?La condition isset($_SESSION['nom']) renvoie false, et le message "Accès refusé." s'affiche.   

3. Pourquoi cette vérification sera-t-elle importante pour l'authentification ?

Elle permet de restreindre l'accès aux pages réservées aux seuls utilisateurs identifiés.

## Activité 6

Question : Que se passe-t-il après session_destroy() ?

Toutes les données associées à la session courante sur le serveur sont supprimées. La variable $_SESSION n'existe plus pour les requêtes ultérieures.
## Activité 7
Où est stocké le cookie ? Sur le navigateur client.    
Que représente 3600 ? La durée de vie du cookie en secondes (3600 secondes = 1 heure).   
Différence entre cookie et session ? 
Les cookies sont conservés sur le client, les données de session sont conservées sur le serveur.
Que se passe-t-il lorsque le cookie expire ? 
Le navigateur le supprime automatiquement et cesse de l'envoyer au serveur.

## Activite

Pourquoi les sessions sont-elles adaptées à l'authentification ?
Les données restent stockées côté serveur, empêchant le client d'altérer les droits d'accès ou les rôles.  
 Pourquoi éviter de stocker des informations sensibles dans un cookie ?
 Les cookies sont lisibles et modifiables par l'utilisateur ou par des scripts malveillants (attaques XSS).
 Peut-on considérer qu'un cookie est totalement sécurisé ?
 Non. Sans les attributs Secure et HttpOnly, il est vulnérable à l'interception et aux vols de session.

 
 ## Activite 12
   Que se passe-t-il avec un mauvais identifiant / mot de passe ?
  L'application affiche "Identifiants incorrects."  
  Pourquoi cette solution n'est-elle pas adaptée à une véritable application ?
   Les identifiants sont codés en dur dans le script, il n'y a qu'un seul utilisateur gérable et le mot de passe est en clair dans le code.
   ## Activite 16 
   1. Le résultat est-il identique à 123456 ? 
   Non, c'est une chaîne de caractères hachée (ex: $2y$10$...).   
   2. Pourquoi ? 
   password_hash() utilise un algorithme à sens unique (BCrypt ou Argon2) associant un coût algorithmique et un sel aléatoire.   
   3. Peut-on retrouver directement le mot de passe à partir du hash ?
    Non, le hachage est irréversible.  
    4. Pourquoi ne doit-on jamais stocker les mots de passe en clair ? 
    En cas de fuite de la base de données, tous les mots de passe des utilisateurs seraient compromis.

    ## Activite 20
    Quel est l'intérêt de créer les fonctions estConnecte() et protegerPage() ?
    Éviter la duplication de code (principe DRY), faciliter la maintenance et s'assurer d'une gestion uniforme de la sécurité sur tout le site.   
    Pourquoi utiliser htmlspecialchars() lors de l'affichage ?
    Pour se protéger contre les attaques XSS (Cross-Site Scripting) en neutralisant l'exécution de balises HTML ou scripts JavaScript introduits par l'utilisateur. 

    ## Activite 23
    Qu'est-ce qu'une session ? U
    n mécanisme permettant de conserver des données relatives à un utilisateur sur le serveur à travers plusieurs requêtes HTTP.   
    Pourquoi session_start() est-il nécessaire ? 
    Pour démarrer une nouvelle session ou restaurer la session existante en chargeant $_SESSION.
    Quel est le rôle de $_SESSION ? 
    Un tableau superglobal stockant les variables accessibles sur plusieurs pages pendant la durée de la session.Qu'est-ce qu'un cookie ? 
    Un petit fichier texte stocké sur l'ordinateur du client par le navigateur à la demande du serveur.   
    Quelle différence existe entre cookie et session ? 
    Les cookies sont stockés côté client, les sessions sont stockées côté serveur.
    Quel est le rôle de $_COOKIE ? 
    Superglobale contenant toutes les valeurs des cookies transmis par le navigateur au serveur.
    Pourquoi utilise-t-on session_destroy() ? P
    our supprimer définitivement toutes les données de session enregistrées sur le serveur.  
     Pourquoi ne faut-il pas stocker les mots de passe en clair ?
      Pour protéger les informations secrètes des utilisateurs en cas d'accès non autorisé au stockage. 
        Quel est le rôle de password_hash() ? 
        Générer un hachage sécurisé d'un mot de passe.   
        Quel est le rôle de password_verify() ? 
        Vérifier qu'un mot de passe saisi correspond à un hachage donné.   
        Pourquoi une page d'administration doit-elle être protégée ? 
        Pour interdire l'accès aux fonctions sensibles (ajout, modification, suppression) à des utilisateurs non authentifiés.   
        Pourquoi créer une fonction protegerPage() ? 
        Pour centraliser la logique de contrôle d'accès et sécuriser les pages en une seule ligne de code.   Pourquoi utiliser htmlspecialchars() lors de l'affichage de données utilisateur ?
         Pour prévenir l'injection de code malveillant (XSS) lors du rendu dans le navigateur.   