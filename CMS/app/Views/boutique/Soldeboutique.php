<div class="title">Reduction item boutique :   </div>
<?php if(Session::get('level')>=4):?>
<form action="<?php echo Helper::url('admin','Soldevalide',$id); ?>" method='POST'>
         <p>Reduction de l'item boutique (si vous voulez reduire de 20% mettez 20)</p><br/>
         <input type="text" name="solde"><br/><br/>
         <input type="submit" name="submit" value="envoyez"><br/>
</form>
<?php else:?>

				<div class="cader_red">Vous devez être connecté admin pour faire un solde !</div>
<?php endif; ?>
