<div class="title">Vos Personnages : </div>
<center>
<table bgcolor="#bdb49f">
<br/>
<tr>
<td bgcolor="#a09885"><b>Pseudo</b></td>
<td bgcolor="#a09885"><b>Level</b></td>
<td bgcolor="#a09885"><b>Class</b></td>

</tr>
<br/>
<?php foreach($personnages as $l):?>
<tr>
<td bgcolor="#d8d1c1"><?php echo $l['name']?></td>
<td bgcolor="#d8d1c1"><?php echo $l['level']?></td>
<td bgcolor="#d8d1c1"><?php Helper::ladder($l['class']);?></td>
<?php endforeach;?>     
</table>
</center>
       