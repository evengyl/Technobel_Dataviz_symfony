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