# Challenge "développeur web avancé" : Thomas Clarisse


##### Étape pour voir mon travail

1. Clonez le repo depuis Github.
2. Lancer `composer install`.
3. Créez *config/db.php* à partir du fichier *config/db.php.dist* et ajoutez vos paramètres de DB. Ne supprimez pas le fichier *.dist*, il doit être conservé.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```
4. Importez *database.sql* dans votre serveur SQL, vous pouvez le faire manuellement ou utiliser le script *migration.php* qui importera un fichier *database.sql*.
5. Lancez le serveur web PHP interne avec `php -S localhost:8000 -t public/`. L'option `-t` avec `public` comme paramètre signifie que votre hôte local va cibler le dossier `/public`.
6. Allez sur `localhost:8000` avec votre navigateur préféré.

## Fonctionnalité

- Ajout d'argonaute
- Suppression d'argonaute
- Modification du nom d'argonaute
- Possibilité de rechercher un argonaute

## Comment fonctionne le routage des URL ?

![simple_MVC.png](.tours/simple_MVC.png)