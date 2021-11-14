# Projet Laravel M1 WEB - 2021 / 2022
## Figma - Plateforme de formations en ligne

### A propos de la plateforme Figma
La société **Sigma** m'a contacté en afin que je développe une application WEB de formation en ligne.

Les contraintes du développement étaient :
 - utilisation du framework **Laravel 8**
 - base de données **MySQL**
 - design avec le framework **Bootstrap**

Sur la palteforme sont présents 3 groupes d'utilisateurs :

- Les "visiteurs" ayant accès à la liste des formations et pouvant regarder en détail le contenu des formations.
- Les "utilisateurs" qui peuvent se connecter afin de créer et de mettre en ligne leurs propres formations.
- Enfin "l'administrateur" qui peut administrer l'entièreté des données de la plateforme.

Modèle conceptuel de la base de données :

<img src="https://user-images.githubusercontent.com/57801968/141692287-9a4ac8ad-d7cc-47a2-b39d-7df40a7d4d57.png" width="600" />


### Erreurs rencontrées pendant le projet
Je n'ai rencontré aucune erreur pendant le projet.

### Commandes d'installations de la plateforme

Pour installer l'application web sur votre ordinateur il vous faut :
- PHP (version 7.4 minimum) 
- Composer

L'installation est impossible sans ces deux prérequis.

Il vous faudra également une base de données MySQL et un serveur de mail SMTP.

Vous pouvez ensuite créer le fichier "**.env**" sur le modèle du fichier "**.env.example**" et y remplir vos informations de base de données et de SMTP.

Pour initialiser votre projet, vous devez vous placer dans le repertoire du projet et lancer la commande :
```
composer install
```

Vous pouvez enfin créer les tables de la base de données et les remplir avec les commandes suivantes:
```
php artisan migrate
php artisan db:seed
```


