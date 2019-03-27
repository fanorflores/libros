<?php 
include_once 'metadatos.php';
include 'header.php'; 

    $login=true;
    $claseMenu= $login ? "col-lg-8":"col-lg-12";
    $claseContent= $login ? "col-xs-6 col-sm-6 col-md-4 col-lg-3": "col-xs-6 col-sm-6 col-md-4 col-lg-2";
   /*if( $login)
    $claseMenu="col-lg-8";
   else
    $claseMenu="col-lg-12";*/
?>


<section class="bs-docs-section clearfix container">
    <article >
      <div class="row">
        <div class="<?php echo $claseMenu; ?>">
          <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark title-nav">
                <h1 class="text-center navbar-brand"> > Últimas Publicaciones</h1>
                </nav>
          </div>
          <div class="row cat">
            <?php for ($i=0; $i < 12; $i++) 
            { ?>
              <div class="<?php echo $claseContent  ; ?>">
                <a href="#">
                  <div class="card border-info  mb-2">
                    <img class="rounded" src="images/uploads/covers/met-inv-s.jpg" alt="Cover Metodología Investigación">
                    <div class="card-footer">Metodología de la Investigación</div>
                  </div>
                </a>
              </div>
            <?php }?>
        </div>
      </div>
      <?php if($login) include 'menu-aside.php'; ?>
    </article>
</section>


</section>
<?php include 'pie.php'; ?>