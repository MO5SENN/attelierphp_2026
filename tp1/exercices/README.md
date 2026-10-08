# Ativite_4
Q1 : Le programme affiche « Bonjour PHP ! » dans le terminal.
Q2 : Avec php index.php, le code PHP est exécuté directement par l’interpréteur PHP dans le terminal. Dans un navigateur, le fichier PHP doit être traité par un serveur PHP avant que le résultat HTML soit envoyé au navigateur.
## 8.1 Comprendre le fonctionnement

### Question 1 — Quel est le rôle de localhost ?

`localhost` désigne la machine locale, c'est-à-dire notre propre ordinateur.

### Question 2 — Que représente le numéro 8000 ?

Le numéro `8000` représente le port utilisé par le serveur PHP pour recevoir les requêtes HTTP.

### Question 3 — Quel programme écoute sur ce port ?

C'est le serveur HTTP intégré de PHP qui écoute sur le port `8000`.

### Question 4 — Pourquoi le navigateur ne doit-il pas accéder directement au fichier index.php ?

Parce que le navigateur ne peut pas exécuter le code PHP. Le serveur PHP doit d'abord interpréter et exécuter le code PHP, puis envoyer le HTML généré au navigateur.

### Question 5 — Que se passe-t-il lorsque vous modifiez index.php puis rechargez la page ?

Lorsque nous modifions `index.php` puis rechargeons la page, le serveur PHP réexécute le fichier et le navigateur affiche le nouveau résultat.
## 9.1 Observer le code source

### Question

Non, le code PHP n'apparaît pas dans le code source envoyé au navigateur.

Le serveur PHP exécute le code PHP avant d'envoyer la page au navigateur. 
Le navigateur reçoit seulement le HTML généré.
# Activité 10
Le reste de la division (modulo avec l'opérateur %).

Le carré de $a (en multipliant $a par lui-même ou en utilisant **).

La moyenne de $a et $b (la somme divisée par 2).
# Activité 15
1. Que contient $_GET ?

    $_GET est une variable superglobale en PHP qui contient un tableau associatif des valeurs passées via l'URL (paramètres de requête HTTP transmis par la méthode GET).

2. Pourquoi utilise-t-on $_GET['nom'] ?

    On l'utilise pour accéder précisément à la valeur saisie par l'utilisateur dans le champ qui porte cette référence.

3. Quel rapport existe entre name="nom" et $_GET['nom'] ?

    L'attribut name="nom" défini dans la balise <input> de HTML sert de clé (index) dans le tableau $_GET. C'est le pont qui permet à PHP de récupérer la valeur sous la clé $_GET['nom'].

4. Que se passe-t-il si l'utilisateur ne saisit aucun nom ?

    Si le formulaire est soumis sans rien écrire, le paramètre nom est soit vide, soit absent de l'URL. Grâce à la fonction isset($_GET['nom']), le code PHP vérifie son existence pour éviter d'afficher des erreurs (warnings) si la variable n'est pas définie.