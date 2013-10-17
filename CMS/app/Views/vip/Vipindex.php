<div class="title">Devenir Vip : <small class="date">Prix pour étre vip : <?php echo Helper::coutvip()?> points </small></div>
<p>
	Devenir VIP vous donne plusieurs bénifice par exemple : <br/>
	- Avoir plus de points par vote .<br/>
	- Avoir plus de points par créditation de compte .<br/>
	- Avoir plus de services.<br/>
	- Plusieurs commandes specialement pour les membres VIP (accez a des iles privés ..).<br/>
	- et bien d'autres chose .<br/>
	<br/>


</p>
<?php if(Session::get('vip')<=0):?>
<div class="title"><center><p><?php echo Helper::lien('Cliquez ici pour devenir VIP','account','Vvip'); ?></p></center></div>
<?php else:?>
<div class="cader_red">Vous étes deja vip !</div>
<?php endif;?>