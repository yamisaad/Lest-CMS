<?php

return array(
    /*     * *
     * Configuration du CMS
     */

    /*     * ***Attention*****
     * Mettez l'url exacte (y compris le http://)de votre site n'oublier pas le slach(/)
     * Par exemple http://yamisaaf.com/
     * ****************** */
    'urlSite' => 'http://localhost/lestcms/',
    'nmbvote' => 150, // Nombre de point ajouter au compte par vote
    'nmbvotevip' => 200,
    'vote' => 120, // 120 minute sa veux dire 2h si vous voulez 3h veuillez ajouter 60min donc 180
    'lienrpg' => 'http://www.rpg-paradize.com/?page=vote&vote=37804', //Votre adresse de votes sur rpg-paradize
    'forum' => 'http://forum.fr',
    /*     * instalateur* */
    'client' => 'DofusInstaller_v1_29_1.exe',
    'launcher' => 'nomdevotrelauncher.exe', //a placer dans le dossier download
    //configuration des news
    'News' => array(
        'page' => 5,
        'commentaires' => 8
    ),
// Nom du serveur
    'nameServeur' => 'Yamisaaf\'CMS',
// prix pour étre vip :
    'coutvip' => 20, //sa veux dire 20 point 
//Prix par Achat de points
    'coutachat' => 100,
    /*     * *ID & IDP starpass* */
    'idp' => 75286,
    'idd' => 176601,
    /*     * ***** Configuration de MVC en general******* */

//configuration de la connexion a la base de donnée
    'dbDefault' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'icore',
        'port' => 443, //port
        'crud' => false // si vous voulez utiliser l'orm faite true sinon mettez false (false pour le moment par encore coder)	
    ),
//configuration des routes
    'routerDefault' => array(
        'Controller' => 'home',
        'Action' => 'index'
    ),
//configuration de systeme de cache
    'Cache' => array(
        'time' => 10, // 0.6 veux dire 1 min
        'dossier' => 'cache',
        'extention' => '.tpl'
    ),
    'MVC' => array(
        'layout' => 'default', //le fichier de layout par default
        'TitleDefault' => 'Architecture MVC', //titre par default
    ),
    'cryptage' => array(
        'cle' => 20, // cle indique cb de code son generer 
        'nombre' => 8// nombreindique cb de chaine sont generer par code
    ),
    /*     * ***** Configuration de l'autoload ******* */
    'autoload' => array(
//pour autloader une libs ou une classe ajouter son nom (par encore utilisable la gestion des libs prochaine version)
        /** libs par defaut : cache , session , cryptage* */
        'cache', 'cryptage', 'session'
    ),
        /* pour ajouter une libs externe veuillez ajouter votre libs dans 
         * le doossiers libs et ajouter son nom dans l'autoload  
         * si vous avez pas besoin d'une libs c'est trés recommencer
         * de suprimer son nom sur l'autoload pour ne pas se charger
         */
);