<div class="title">Selectionnez votre personnages :  </div>
<p>Vous devez selectionnez le personnages qui vas recevoir l'objet (il est imperatif que le personnages soit deconnecter pour recevoir l'objet ) :</p>
			<br/>
			<form method="POST" action="<?php echo Helper::url('boutique','buy',$objet); ?>">
						<select name="personnage">
						
										<?php foreach($personnages as $p):?>

							<option value="<?php echo $p['guid'];?>"><?php echo $p['name'] ?></value>
					<?php endforeach;?>
						</select>
									<br/><br/>

						<input type="submit" name="submit" value="Recevoir l'item" />
					</form>
