Pour pouvoir démarrer et tester le projet il faut : 


1) Avoir les logiciels suivants sur son PC : Laravel 8 + cli  + composer + npm 

2) exécuter la commande suivante (aprés avoir ouvrir un terminal et accéder à la racine du projet) : npm install

3) exécuter la commande suivante (aprés avoir ouvrir un terminal et accéder à la racine du projet) : composer install

4)configurer les credentials d'accés a la BD dans le ficher .env se trouvant à la racine du projet (2 BD : la 1 ére simulant le schéma des données du blog et l'autre pour l'authentification des modérateurs du blog au dashboard)

5)Générer les 2 schéma des 2 BD ==> utiliser la commande : php artisan migrate

6)Hydrater les 2 BD avec des données de test ==> utiliser la commande : php artisan db:seed

7) IL y'aura un super administrateur par défaut donc ===> username = admin@material.com ET password = secret

8) Lancer le serveur web en utilisant la commande : php artisan serve

NB: pas de serveur de mailing (SMTP) mis en place dans ce projet pour le moment , donc la fonctionnalité de password reset ne fonctionne pas puique on ne peut pas vous envoyer le lien de réinitialisation du mot de passe que par email.Lors de la phase de l'hebergement , nécessairement  vous aurez votre serveur mail en place, veuillez le configurer dans le fichier .env pour que l'app fonctionne correctement 

NB: toutes les commandes précitées doivent etre executées depuis un terminal qui pointe vers la racine du projet (dossier parent)
