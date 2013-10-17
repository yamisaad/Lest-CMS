<?php 
foreach ($news as $n):?>
 <div class ="title"> News : <?php echo $n['titre'] ?>  <small class="date" > le  <?php echo $n['date']?></small> </div>
  <p><?php echo $n['contenu'];?></p>
<?php endforeach; ?>
        <br/><hr /><br/><br/>


     <?php foreach($commentaires as $c): ?>
              <div class="title"> Commentaire par  : <?php echo $c['auteur']; ?> <small class="date"> le :<?php echo $c['date']; ?> </small> </div>
        <p>
     <?php echo $c['contenu'];?>
        </p>
      
        <hr />
          <?php endforeach; ?>
<?php if(Session::get('id')):?>
<form action="<?php echo Helper::url('home','comment',$id); ?>" method='POST'>
         <textarea name="contenu"  rows="10" cols="40">Votre commentaires</textarea><br/><br/>
         <input type="submit" name="submit" value="envoyez">
</form>
<?php else:?>

				<div class="cader_red">Vous devez être connecté pour poster un commentaire !</div>
<?php endif; ?>

 



