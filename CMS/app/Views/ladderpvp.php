<div class="title">Ladder PVP</div>
<center>
<table bgcolor="#bdb49f">
<br/>
<tr>
<td bgcolor="#a09885"><b>Pseudo</b></td>
<td bgcolor="#a09885"><b>Classe</b></td>
<td bgcolor="#a09885"><b>Level</b></td>
<td bgcolor="#a09885"><b>Honneur</b></td>
<td bgcolor="#a09885"><b>Allignement</b></td>
</tr>
<br/>
<?php foreach($ladderpvp as $l):?>
<tr>
<td bgcolor="#d8d1c1"><?php echo $l['name']?></td>
<td bgcolor="#d8d1c1"><?php Helper::ladder($l['class']);?></td>
<td bgcolor="#d8d1c1"><?php echo $l['level']?></td>
<td bgcolor="#d8d1c1"><?php echo $l['honor']?></td>
<td bgcolor="#d8d1c1"><?php Helper::alignement($l['alignement']);?></td>
<td bgcolor="#d8d1c1"></td>
<?php endforeach;?>     
</table>
</center>
       