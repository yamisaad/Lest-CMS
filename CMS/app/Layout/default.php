<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title><?php echo Helper::name();?></title>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <LINK rel="stylesheet" href="<?php echo Helper::theme('asterionv9')?>template/css/common.css" type="text/css"/>
    <LINK rel="stylesheet" href="<?php echo Helper::theme('Boutique')?>boutique.css" type="text/css"/>


    <script type="text/javascript" src="<?php echo Helper::theme('asterionv9')?>jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Helper::theme('asterionv9')?>jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo Helper::theme('asterionv9')?>jquery.galleryview-1.1.js"></script>
    <script type="text/javascript" src="<?php echo Helper::theme('asterionv9')?>jquery.timers-1.1.2.js"></script>
    <script type="text/javascript" src="<?php echo Helper::theme('js')?>panier.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){ $('#photos').galleryView({panel_width: 360,panel_height: 170,transition_speed: 2000,transition_interval: 5000,overlay_height:0,overlay_font_size:10,nav_theme: 'dark',border:0, pause_on_hover: false,show_captions: false,background_color: 'white'});});
    </script>   
</head>
  <body>

  <div id="background">
    <?php if(@fsockopen(\Core\Core::get()->config['dbDefault']['host'],\Core\Core::get()->config['dbDefault']['port'], $errNo, $errStr, 1)):?>
    <img class="status" src="<?php echo Helper::theme('asterionv9')?>template/img/on.png" />
    
    <?php else:?>
    <img class="status" src="<?php echo Helper::theme('asterionv9')?>template/img/off.png" />

  <?php endif;?>

    <div class="connectes"><?php  $a = Helper::connecter(); echo $a['c']?></div>
  </div>
  
  <div id="topBar">
  <?php $vote = Helper::vote(); ?>
      <div class="v1_1"><?php echo $vote['c'][0]['pseudo'];?></div><div class="v1_2"><?php echo $vote['c'][0]['vote'];?></div>
      <div class="v2_1"><?php echo $vote['c'][1]['pseudo'];?></div><div class="v2_2"><?php echo $vote['c'][1]['vote'];?></div>
      <div class="v3_1"><?php echo $vote['c'][2]['pseudo'];?></div><div class="v3_2"><?php echo $vote['c'][2]['vote'];?></div>
<?php if(Session::get('id')):?>
    <table id="member">
        <tr><td>» <a href="<?php echo Helper::url('account','compte');?>">Mon compte</a></td><td>» <a href="<?php echo Helper::url('account','personnages');?>">Personnages</a></td></tr>
        <tr><td>» <a href="<?php echo Helper::url('boutique','index');?>">Boutique</a></td><td>» <a href="<?php echo Helper::url('account','achat');?>">Acheter des pts</a></td></tr>
        <tr><td>» <a href="<?php echo Helper::url('account','vip');?>">Devenir VIP</a></td><td>» <a href="<?php echo Helper::url('account','logout');?>">Déconnexion</a></td></tr>
      </table>
<?php else: ?>
      <table id="member">
       
       <form action='<?php echo Helper::url('account','connexion');?>' method='POST'>
        <tr><td>Utilisateur :</td><td><input type="text" name="username" /></td></tr>
        <tr><td>Mot de passe :</td><td><input type="password" name="password" /></td></tr>
        <tr><td></td><td><input type="submit" value="connexion"/></td></tr>     
       </form>
      </table>
<?php endif;?>
      <div id="gallery">
        <div id="photos" class="galleryview"> 
          <a href="#"><div style="display:none; " class="panel"><img class="border" src="<?php echo Helper::theme('asterionv9')?>template/img/gallery/0.png" alt="" /><div class="panel-overlay"></div></div></a>
          <a href="#"><div style="display:none; " class="panel"><img class="border" src="<?php echo Helper::theme('asterionv9')?>template/img/gallery/1.png" alt="" /><div class="panel-overlay"></div></div></a>
          <a href="#"><div style="display:none; " class="panel"><img class="border" src="<?php echo Helper::theme('asterionv9')?>asterionv9/template/img/gallery/2.png" alt="" /><div class="panel-overlay"></div></div></a>
        </div>
      </div>
  </div>
  
  <div id="wapper">
    <!--!-->
    <div id="menuLeft">
      <img src="<?php echo Helper::theme('asterionv9')?>template/img/bg_topMenuLeft.png">
        <div id="menu">
          <div id="topMenu">Le serveur</div>
            <a href="<?php echo Helper::url('home','index'); ?>"><li>Accueil</li></a>            
            <?php if(empty($_SESSION['id'])):?>
            <a href="<?php echo Helper::url('account','cpassword'); ?>"><li>Mot de Passe Oubliée</li></a>
            <?php endif;?>
            <a href="<?php echo Helper::url('home','equipe'); ?>"><li>L'équipe</li></a>
            <a href="<?php echo Helper::url('home','reglement'); ?>"><li>Réglement</li></a>
          <img class="bottom" src="<?php echo Helper::theme('asterionv9')?>template/img/bg_bottomMenu.png">
        </div>
        <div class="sepMenu"></div>
        <div id="menu">
          <div id="topMenu">Communauté</div>
            <a href="<?php echo Helper::url('home','rejoindre');?>"><li>Nous rejoindre</li></a>
            <a href="<?php echo Helper::url('account','inscription'); ?>"><li>Inscription</li></a>
            <a href="<?php echo Helper::url('account','vote'); ?>"><li>Votez & Gagner</li></a>
            <a href="<?php echo \Core\Core::get()->config['forum'];?>"><li>Forum</li></a>
            <a href="#"><li>Tchat'Box</li></a>
            <a href="<?php echo Helper::url('account','statistique');?>"><li>Statistiques</li></a>
            <a href="<?php echo Helper::url('ladder','index');?>"><li>Ladder</li></a>
            <a href="#"><li>Teamspeak</li></a>
            <a href="#"><li>Events</li></a>
          <img class="bottom" src="<?php echo Helper::theme('asterionv9')?>template/img/bg_bottomMenu.png">
        </div>
        <div class="sepMenu"></div>
        <div id="menu">
          <div id="topMenu">Interactive</div>
            <a href="#"><li>Loterie</li></a>
            <a href="#"><li>Blasons de guilde</li></a>
          <img class="bottom" src="<?php echo Helper::theme('asterionv9')?>template/img/bg_bottomMenu.png">
        </div>

           <?php if(Session::get('level')>=4):?>

        <div class="sepMenu"></div>
        <div id="menu">
          <div id="topMenu">Administration</div>
            <a href="<?php echo Helper::url('admin','index');?>"><li>Panel Admin</li></a>
            <a href="<?php echo Helper::url('admin','anews');?>"><li>Ajouter une News</li></a>
            <a href="<?php echo Helper::url('admin','gnews');?>"><li>Gestion des News</li></a>
            <a href="<?php echo Helper::url('home','equipe');?>"><li>Ajouter l'equipe </li></a>


          <img class="bottom" src="<?php echo Helper::theme('asterionv9')?>template/img/bg_bottomMenu.png">
        </div>
      <?php endif;?>
        
      <img src="<?php echo Helper::theme('asterionv9')?>template/img/bg_bottomMenuLeft.png">
    </div>
    <!--!-->
    <div id="content">
      <img src="<?php echo Helper::theme('asterionv9')?>template/img/bg_topContent.png">
      <div id="text">

  <!--Contenu!-->
  <?php echo $content ?>

      </div>
      <img src="<?php echo Helper::theme('asterionv9')?>template/img/bg_bottomContent.png">
    </div>
    <!--!-->
    <div id="copy">
    </div>
  </div>
  
  
  </body>
</html>
