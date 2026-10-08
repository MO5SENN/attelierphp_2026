# Activite 1
Combien d'éléments contient le tableau ? Il contient 4 éléments ("Ahmed", "Sami", "Nour", "Amine").
Quel est l'indice du premier élément ? L'indice du premier élément est 0 (les tableaux en PHP commencent à l'indice 0).

    Quel est l'indice du dernier élément ? L'indice du dernier élément est 3 (puisqu'il y a 4 éléments : 0, 1, 2, 3).

    Que produit echo $etudiants[2]; ? Cela affiche Nour (le 3ème élément).

    Que se passe-t-il avec $etudiants[4] ? Cela génère une erreur ou un avertissement (Undefined array key 4) parce que l'indice 4 n'existe pas encore.
    # ACtivite 2
   Quel est le rôle de count() ? Il permet de compter et de retourner le nombre total d'éléments dans le tableau (ici 4)

   Pourquoi utilise-t-on < et non <= ? Parce que les indices commencent à 0. Un tableau de 4 éléments a les indices 0, 1, 2 et 3. Si on utilisait <= count($etudiants) (donc <= 4), la boucle essaierait d'accéder à l'indice 4 qui n'existe pas.

    Pourquoi ne pas écrire directement 4 ? Pour que le code reste dynamique. Si on ajoute ou supprime des étudiants plus tard, la fonction count() s'adaptera automatiquement sans qu'on ait besoin de modifier le chiffre dans la boucle.

    # Activite 3
    Question : Dans quels cas foreach est-il plus pratique que for ?
Il est plus pratique lorsqu'on veut simplement parcourir toutes les valeurs d'un tableau sans avoir à gérer manuellement les indices, les compteurs ($i) ou la taille du tableau. Il est aussi indispensable pour les tableaux associatifs.   

# Activite 10
Question : Quelle est la différence entre echo et return ?

    echo affiche directement le résultat à l'écran.

    return renvoie la valeur au programme principal pour qu'elle puisse être stockée dans une variable, manipulée ou réutilisée dans d'autres calculs


# Activite 14

La fonction possède un seul paramètre ($etudiants).   $etudiants représente le tableau multidimensionnel contenant tous les étudiants.   On utilise foreach pour parcourir chaque étudiant du tableau et récupérer sa moyenne.   La fonction retourne la moyenne générale de la classe (un nombre décimal).   


# Activite 21
Pourquoi utiliser un tableau plutôt que $etudiant1, $etudiant2, etc. ?  


 Pour structurer et regrouper les données de manière logique, ce qui permet de les parcourir dynamiquement à l'aide de boucles (for, foreach) sans dupliquer le code.

 Quelle différence entre $etudiants[0] et $etudiant["nom"] ?   
 
 $etudiants[0] accède à un élément via un indice numérique (tableau indexé), tandis que $etudiant["nom"] accède à une valeur via une clé textuelle nommée (tableau associatif).

 Pourquoi une fonction améliore-t-elle la réutilisation du code ?  
  Parce qu'elle isole une logique précise (comme calculer une moyenne ou chercher un étudiant) pour qu'elle puisse être appelée plusieurs fois dans le programme sans réécrire les mêmes instructions.
  
  Quelle différence entre echo et return ?  

   echo affiche directement le texte dans le navigateur, alors que return renvoie la valeur calculée au script appelant pour qu'elle soit stockée ou réutilisée dans d'autres traitements.

   Pourquoi séparer les fonctions dans un fichier ?   
   
   Pour assurer une bonne modularité, garder le code propre, séparer la logique métier de l'affichage HTML, et pouvoir inclure les fonctions partout où l'on en a besoin via require_once.