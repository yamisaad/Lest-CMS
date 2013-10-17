     <div class ="title"> Administration : </div>
   <?php if(Session::get('level')>=4):?>

      <?php echo Helper::lien('-Ajouter une News','admin','anews'); ?><br/>
      <?php echo Helper::lien('-Gestion des News','admin','gnews'); ?><br/>
      <?php echo Helper::lien('-Ajouter un staff','home','equipe'); ?><br/>


    </table>
            <?php else:?>

        <div class="cader_red">Vous devez être Administrateur !</div>
<?php endif; ?>

