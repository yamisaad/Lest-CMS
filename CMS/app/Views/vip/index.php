		
          <?php foreach($news as $n): ?>


                <div class="title"><?php echo $n['titre']; ?> <small>Par :<?php echo $n['auteur']; ?> </small> <small class="date"><?php echo $n['date']; ?></small></div>
        <p>
 <?php echo $n['contenu'];?>
        </p>
        <br/>
<center><p><?php echo Helper::lien('Commentaires','home','commentaires',$n['id']); ?> (<?php echo $comment->NumNewsComment($n['id']); ?>)</p></center>
        <hr />
          <?php endforeach; ?>


 <div class="title"><center><?php  Helper::Pagination('home','index',$page); ?></center></div>
