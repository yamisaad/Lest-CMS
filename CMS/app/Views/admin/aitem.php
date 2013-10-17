 <div class ="title">Ajoute Item : </div>

<form action="<?php echo Helper::url('admin','aitem'); ?>" method='POST'>
         <p>L'id du item : </p>
         <input type="text" name="id"> 
          <p>Le cout de l'item: </p>
         <input type="text" name="cout"> 
<br/><br/>

         <input type="submit" name="submit" value="Ajouter l'item">
</form>