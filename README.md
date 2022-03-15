# Rappel des commandes #

## Symfony ##
1. **Créer un projet :**
    - symfony new NomDuProjet --webapp

2. **Pour démarrer le projet :**
    - symfony server:start

3. **Pour couper le projet :**
    - symfony server:stop

4. **Pour voir la liste des serveurs actif :**
    - symfony server:list


## Symfony console make: ##
1. **Pour créer un controller :** 
    - symfony console make:controller


## Twig ##
Référence à twig : https://twig.symfony.com/
Référence des méthodes liées à symfony : https://symfony.com/doc/current/reference/twig_reference.html#url
Doc des templates Twig : https://twig.symfony.com/doc/3.x/templates.html

## Doctrine ##
1. Ne pas oublier de configurer le database_url ->
**DATABASE_URL="mysql://root:legends@127.0.0.1:3306/demo_technobel_doctrine?serverVersion=8.0.28&charset=utf8mb4"**

1. **Pour créer la base de donnée** 
    - symfony console doctrine:database:create

2. **Pour créer une entity :** 
    - symfony console make:entity -> suivre avec grande attention les instructions !!! LIRE RTFM

3. **Pour modifier une entity**
    - symfony console make:entity et taper le nom de votre entity déjà existante ! Bien lire ce que doctrine nous dit !

4. **Pour valider notre schéma (nos entités)** 
    - symfony console doctrine:schema:validate

5. **Créer une migration des entities (historique actuel des entities entre db et object 'php')**
    - symfony console make:migration
    1. **Commandes utiles pour les migrations**

        1. Pour voir ou on en est entre les migrations de la db et du projet 
            - symfony console doctrine:migrations:status

        2. Pour appliquer la migration 
            - symfony console doctrine:migrations:migrate

        3. Pour effectuer le down (migration précédente)
            - symfony console doctrine:migrations:migrate prev
            
        4. Pour effectuer le up de la migrations suivante (migration courrante)
            - symfony console doctrine:migrations:migrate next

# Exos #
### Exos 1 ###
- Créez et lancez votre projet symfony avec 4 + admin controllers de votre choix, le thème est libre, seulement, il fera parti intégrante du 
cours pour le suivi du fil rouge, le formatteur partira sur le thème suivant : Hardware PC.

- Controller du formateur : Contact, Home, Categories, Products, Admin.

- Ensuite il vous erst demandez de créer par controller, une deuxième action avec une route spécifique au choix, et donc, par la même 
occasion, créer un vue pour cette action. Chaque action devra renvoyer un paramètre au choix exemple : un titre de page ou autre
et l'afficher dans la vue.

**DONC :**
1. *controller1 -> 2 actions -> 2 vues*
2. *controller2 -> 2 actions -> 2 vues*
3. *controller3 -> 2 actions -> 2 vues*
4. *controller4 -> 2 actions -> 2 vues*
5. *admin -> 1 actions -> 1 vues*


### Exos 2 ###
- Sur base des connaissances acquises en Doctrine, créer votre base de données si ce n'est pas encore fait.
- Créer une entity pour chaque controller qui en aura besoin, exemple : product, categ, etc... etc...
- Ces entity devront au moins avoir 2 champs autre que id -> créé par doctrine n'oubliez pas !
- conseiles, suivez bien les étapes faite par le formatteur ! et regarder au readme !!! il est complet !


### Exos 3 ###
- Concevoir, sur base de votre thème choisi, toute la partie ADD dans l'admin, 
- Prévoir également de pouvoir afficher toutes ces infos dans les menu adapté