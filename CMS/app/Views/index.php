

          <?php foreach($news as $n): ?>


                <div class="title"><?php echo $n['titre']; ?> <small>Par :<?php echo $n['auteur']; ?> </small> <small class="date"><?php echo $n['date']; ?></small></div>
        <p>
 <?php echo substr($n['contenu'],0,500);?>...<?php echo Helper::lien('(Lire la Suites)','home','commentaires',$n['id']); ?>
        </p>
        <br/>
<center><p><?php echo Helper::lien('Commentaires','home','commentaires',$n['id']); ?>(<?php echo Helper::numcomments($n['id']);?>)</p></center>
        <hr />
          <?php endforeach; ?>


 <div class="title"><center><?php  Helper::Pagination('home','index',$page); ?></center></div>
