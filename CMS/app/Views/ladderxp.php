<div class="title">Ladder Pvm</div>
<center>
<table bgcolor="#bdb49f">
<br/>
<tr>
<td bgcolor="#a09885"><b>Pseudo</b></td>
<td bgcolor="#a09885"><b>Classe</b></td>
<td bgcolor="#a09885"><b>Level</b></td>
<td bgcolor="#a09885"><b>Expérience</b></td>
<td bgcolor="#a09885"><b>Kamas</b></td>
</tr>
<br/>
<?php foreach($ladderxp as $l):?>
<tr>
<td bgcolor="#d8d1c1"><?php echo $l['name']?></td>
<td bgcolor="#d8d1c1"><?php Helper::ladder($l['class']);?></td>
<td bgcolor="#d8d1c1"><?php echo $l['level']?></td>
<td bgcolor="#d8d1c1"><?php echo $l['xp']?></td>
<td bgcolor="#d8d1c1"><?php echo $l['kamas']?></td>
<?php endforeach;?>     
</table>
</center>
       