     <div class ="title"> Panel Membre  : </div>
     <?php echo Helper::lien('-Changer votre mot de passe','account','cspassword'); ?><br/>
       <?php echo Helper::lien('-Achetez plus de points','account','achat'); ?><br/>
      <?php echo Helper::lien('-Votez et gagnez des points','account','vote'); ?><br/>
      <?php echo Helper::lien('-Acceder a la boutique','boutique','index'); ?><br/>
      <?php echo Helper::lien('-Mes Personnages','account','personnages'); ?><br/>
     <?php if(Session::get('level')>=4):?>
      <?php echo Helper::lien('-Administration','admin','index'); ?><br/>
     <?php endif?>
<?php 
$vip = '';
if($compte['vip']>=1):
$vip = 'Oui';
else:
  $vip = 'Non';
endif;
?>
    <br/> <div class ="title"> Mes Points  : <small class="date"><?php echo $compte['points'];?> Points</small></div>
         <div class ="title"> VIP  : <small class="date"><?php echo $vip;?> </small></div>
     <div class ="title"> Mon Rang : <small class="date">Rang : <?php echo Helper::rang(Session::get('level'));?> </small></div>
