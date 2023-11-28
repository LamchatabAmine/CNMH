# Lab laravel basic

## Travail à faire

Le projet en cours consiste à développer une application CRUD (Create, Read, Update, Delete) basée sur le framework Laravel, mettant en œuvre la gestion des projets et de leurs tâches associées. 

* Créer le CRUD des tâches
* La recherche avec AJAX
* Avec la pagination
* Ajouter la base de données incluant la table des projets dans les seeders



## Flux de travail du processus

1. Commencez par installer Laravel via le terminal avec cette commande
```shell
    composer create-project laravel/laravel lab-crud-basic
```
2. Ajoutez le nom de la base de données dans `DB_DATABASE=` sur le fichier `.env`.
3. Procédez à la création des tables en exécutant ces commandes 

```shell
    php artisan make:migration Projects
```
```shell
    php artisan make:migration Tasks
```
4. Une fois les noms de colonnes des tables définis, migrez-les vers la base de données :

```shell
    php artisan migrate
```

5. Avec la table des tâches et l'ensemble de semences, générez des modèles pour les tâches et les projets

```shell
    php artisan make:model Project
```
```shell
    php artisan make:model Task
```

6. Remplissez la base de données avec les informations du projet en créant un seeder et en exécutant :
   
```shell
    php artisan db:seed
```

7. Créez des contrôleurs pour gérer les données de la base de données :

```shell
    php artisan make:controller ProjectsController 
```
```shell
    php artisan make:controller TasksController 
```


## Références

[https://laravel.com/docs/10.x](https://laravel.com/docs/10.x)
