# Lab laravel basic

## Travail à faire

Le projet en cours consiste à développer une application CRUD (Create, Read, Update, Delete) basée sur le framework Laravel, mettant en œuvre la gestion des projets et de leurs tâches associées. 

* compléter le travail sur `lab laravel basic`
* Créer le CRUD des tâches
* La recherche avec AJAX
* Avec la pagination
* Ajouter la base de données incluant la table des projets dans les seeders
* Pattern Repository
* Filtrer par projet

## Flux de travail du processus

1. Commencez par cloner Lab Crud Basic.

2. Ajoutez le nom de la base de données dans `DB_DATABASE=` sur le fichier `.env`.

3. Migrer les tables vers la base de données et remplissez la base de données

```shell
    php artisan migrate:fresh --seed
```
4. Pour afficher la progression de votre projet localement, exécutez cette commande

```shell
    php artisan serve
```


## Références

[https://github.com/labs-web/lab-crud-standard](https://github.com/labs-web/lab-crud-standard)
[https://laravel.com/docs/10.x](https://laravel.com/docs/10.x)
