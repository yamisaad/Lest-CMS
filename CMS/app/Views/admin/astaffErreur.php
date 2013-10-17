     <div class ="title"> Administration : Ajouter une news </div>
   <?php if(Session::get('level')>=4):?>
       
      <?php 
      if(isset($erreurs)): 
      
      foreach($erreurs as $erreur):

      echo "<p>";
      echo($erreur);
      echo "</p>";


        endforeach;


       endif; ?>
     <form action="<?php echo Helper::url('admin','anews','1'); ?>" method='POST'>
         <tr><td>Titre :</td><td><input type="text"  name ="titre"/></td></tr><br/>
         <textarea name="contenu" width="500" height="200">Votre News</textarea><br/><br/>
         <input type="submit" name="submit" value="envoyez">
    </table>
            <?php else:?>

        <div class="cader_red">Vous devez être Administrateur !</div>
<?php endif; ?>

