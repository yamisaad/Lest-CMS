 
  
     <div class ="title"> Gestion des news   : </div>
<center>
<table bgcolor="#bdb49f">
<br/>
<tr>
<td bgcolor="#a09885"><b>id news : </b></td>
<td bgcolor="#a09885"><b>Contenu</b></td>
<td bgcolor="#a09885"><b>auteur</b></td>
<td bgcolor="#a09885"><b>supprimer</b></td>
</tr>
<br/>
<?php foreach($news as $l):?>
<tr>
<td bgcolor="#d8d1c1"><?php echo $l['id']?></td>
<td bgcolor="#d8d1c1"><?php echo substr($l['contenu'],0,50);?></td>
<td bgcolor="#d8d1c1"><?php echo $l['auteur']?></td>
<td bgcolor="#d8d1c1"> <?php echo Helper::lien('Oui','admin','snews',$l['id']); ?></td>
<?php endforeach;?>     
</table>
</center>
       