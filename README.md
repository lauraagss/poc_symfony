# Poc Symfony

VERSION SYMFONY :

	Symfony 5.2.1

REQUIS :

	PHP 7.4
	PhpMyAdmin 5.0.4
	Apache 2.4.46
	MySQL 8.0.22

INSTALLATION : 

    git clone https://github.com/lauraagss/poc_symfony.git
    composer install
    php bin/console doctrine:database:create
    php bin/console doctrine:schema:update --force
    php bin/console doctrine:fixtures:load -n
    php bin/console server:run

CONTEXTE :

	Développement d'un site web avec Symfony de série poc d'évaluation d'entrée en licence

ARCHITECTURE :

	- Connexion
    - Inscription
	- Accueil Liste des séries par utilisateur avec supression
    - Ajout d'une série 
    - Vu d'une série avec modification

STACK TECHNIQUE :

    Symfony 5.2
    PHP 7.4
    
PRODUCTION :

    Laura Gonçalves
