<div class="title">Ladder Vote</div>
<center>
<table bgcolor="#bdb49f">
<br/>
<tr>
<td bgcolor="#a09885"><b>Pseudo</b></td>
<td bgcolor="#a09885"><b>Vote</b></td>

</tr>
<br/>
<?php foreach($laddervote as $l):?>
<tr>
<td bgcolor="#d8d1c1"><?php echo $l['account']?></td>
<td bgcolor="#d8d1c1"><?php echo $l['vote']?></td>
<td bgcolor="#d8d1c1"></td>
<?php endforeach;?>     
</table>
</center>
       