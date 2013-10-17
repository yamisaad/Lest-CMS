<?php foreach ($Equipe as $e):?>
 <div class ="title"> <?php echo $e['nom'] ?>  <small class="date" >Rang : <?php echo $e['rang']?></small> </div>
  <p><?php echo $e['contenu'];?></p><br/>
  <?php if(Session::get('level')>=4):?>

      <p><?php echo Helper::lien('-Supprimer le Membre','admin','Sstaff',$e['id']); ?></p><br/>
  <?php endif;?>
<?php endforeach; ?>

<?php if(Session::get('level')>=4):?>
<div class="title" > Espace Admin : </div>
<form action="<?php echo Helper::url('admin','astaff'); ?>" method='POST'>
	     <input name="nom" type="text" Value="Nom du Membre"/>
  	<input name="rang" type="text" value="Rang du Membre"><br/>
         <textarea name="contenu" rows="10" cols="40">Presentation du Membre</textarea><br/><br/>
         <input type="submit" name="submit" value="envoyez">
</form>

	<?php endif;?>
