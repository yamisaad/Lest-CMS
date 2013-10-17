<div class="title">Categorie <?php echo $namecat ?> :  </div><br/><br/>

<?php foreach($item as $i):?>
<div class="title"><?php echo $i['name']?> :  <small class="date"> Reduction de : <?php echo $i['solde'];?> points </small></div><br/>
<p>Level <?php echo $i['level'];?></p>
<object type="application/x-shockwave-flash"data="<?php echo Helper::theme('boutique')?>swf/<?php echo $i['iditem'];; ?>.swf" width="200" height="150">
<param name="movie" value="<?php echo Helper::theme('boutique')?>swf/<?php echo $i['iditem'];; ?>.swf" />
<param name="wmode" value="transparent" />
<param name="quality" value="high"/>
</object>
<?php 
if(!$statsBoutique = \Core\Core::get()->_loader->_class['PCache']->get('boutique/items/stats_'.$i['id'])){

$statsBoutique = \Core\Core::get()->_loader->loadModel('Boutique')->stats($i['stats']);
 \Core\Core::get()->_loader->_class['PCache']->write($statsBoutique,'boutique/items/stats_'.$i['id'],1500); 

}
//$statsBoutique = \Core\Core::get()->_loader->loadModel('Boutique')->stats($i['stats']);
?>
	    <div id="bloc1">
<?php
for($ie = 0; $ie < count($statsBoutique); $ie++){
  echo $statsBoutique[$ie]['contenu'];
   echo '<br/>';
}

  
?>

        </div>
        <br/><br/>
        <div class="title">Prix : <?php echo $i['prix'];?> Points  <small class="date">      <?php echo Helper::lien('Acheter l\'item','boutique','SelectPersonnage',$i['iditem']); ?><br/>  </small></div>
<br/>
<?php if(Session::get('level')>=4):?>

        <div class="title"><?php echo Helper::lien('Modifier le Soldes de l\'item ','admin','Soldeboutique',$i['id']); ?> <small class="date">Reduction actuelle est de  : <?php echo $i['solde'];?>points</small></div>
<?php endif;?>
<br/>

<?php endforeach;?>




