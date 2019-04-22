<?php include 'head.php' ;



  if(isset($_POST['supprimer'])){

    // need to sanitize
    $idadmin = $_GET['id_art'] ?? NULL ;

    if(!is_null($idart)){
        $sql = "DELETE FROM admin WHERE id_art= " . $idart;

       $resultat=  $pdo->query($sql);

       if($resultat){
           header('location:article.php');
       }else{
echo 'ohhhh :(' . "<br>" . print_r($statement->errorInfo());

       }
    }

}?>

    <div id="content-wrapper">

      <div class="container-fluid">

          <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8">
                  <form class="card card-sm" >
                      <div class="card-body row no-gutters align-items-center">
                         
                          <!--end of col-->
                          <div class="col">
                              <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Rechercher un produit">
                          </div>
                          <!--end of col-->
                          <div class="col-auto">
                              <button class="btn btn-lg btn-success" type="submit">rechercher</button>
                          </div>
                          <!--end of col-->
                      </div>
                  </form>
              </div>
              <!--end of col-->
          </div>

        <!-- Page Content -->
        <h1>Article</h1>
        <hr>

        <?php
        $sql = "SELECT 
        article.id_art, article.nom_art, 
        article.prix_art, article.url_img_art,
        article.id_styl,
        article.descri_art, 
        categories.desi_catg, 
        styliste.nom_styls,
        styliste.prenom_styls
        FROM article
        JOIN categories
        ON  article.id_catg = categories.id_catg 
        JOIN styliste
        ON article.id_styls = styliste.id_styls 
        ";
       
        ?>
        <button type="button" class="btn btn-primary mb-3" 
        data-toggle="modal" data-target="#exampleModalScrollable">Ajouter un article</button>

        <div class="table-responsive">
        <table class="table">
            <thead>
            
                <tr>
                    <th>ID</th>
                     <th>nom article</th>
                    <th>prix </th>
                  <th>description</th>
                  <th>image</th>
                  <th>styliste</th>
                  
                  <th>style</th>
                  <th>categories</th>
                  
                  
                  <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php 
            if($pdo->query($sql)){
            foreach  ($pdo->query($sql) as $row) { ?>
               <tr>
                <td><?php echo $row['id_art'] ;?></td>
                <td><?php echo $row['nom_art'] ;?></td>
                <td><?php echo $row['prix_art']." DA" ;?> </td>
                <td><?php echo $row['descri_art'] ;?></td>
                <td><img  width="80" height="80" src="<?php echo '../admin/ajouter/uploads/'.$row['url_img_art'] ;?>" alt=""  > </td>
                
                <td><?php echo $row['nom_styls']. ' '.$row['prenom_styls'] ;?></td>
              
                <td><?php 
                if( $row['id_styl']== 1){
                    echo 'traditionnel';
                }else{
                    echo 'moderne';
                }
                ;?></td>
                <td><?php echo $row['desi_catg'] ;?></td>
                <td class="text-center"><button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#m<?php echo $row['id_art'] ;?>">Supprimer</button></td>
            </tr>
       
            <div class="modal fade" id="m<?php echo $row['id_art'] ;?>" tabindex="-1" role="dialog"
                aria-labelledby="m<?php echo $row['id_art'] ;?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="supprimer/supprimer_article.php?id_art=<?php echo $row['id_art'] ;?> " method="post">
                                <h1 class="mb-5">voulez-vous supprimer article n°<?php echo $row['id_art'] ;?> </h1>
                                <input type="submit" name="supprimer" class="btn btn-block btn-danger"
                                    value="supprimer">
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <?php }
            }; ?>
                       
                   
                   
                   
            </table>
        </div>






<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <form  method="POST" action="ajouter/ajouter_article.php" enctype="multipart/form-data">
                
                 
            
            <div class="form-group">
                          <div class="form-label-group">
                            <input type="text" id="nom_art" name="nom_art" class="form-control" placeholder="Prix en détail" required="required" autofocus="autofocus">
                            <label for="nom_art">nom article</label>
                          </div>
                        </div>
                       
                    
                      <div class="form-group">
                          <div class="form-label-group">
                            <input type="text" id="prix_art" name="prix_art" class="form-control" placeholder="Prix en détail" required="required" autofocus="autofocus">
                            <label for="prix_art">Prix</label>
                          </div>
                        </div>
                       
   
                        <div class="form-group">
                    <div >
                    <label for="">votre description</label>
                      <textarea cols="70" type="text" id="descri_art" name="descri_art" class="form-control" placeholder="Déscription" required="required" autofocus="autofocus"></textarea>

                    </div>
                  </div>
                    

                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="file" id="fileToUpload" name="fileToUpload" class="form-control" placeholder="Prénom" required="required" accept="image/*">
                        <label for="fileToUpload">imager</label>
                      </div>
                    </div>
                  
              
                  
                    <div class="form-group">
                    <div class="form-label-group">
                     <select name="id_styl" id="id_styl" class="form-control" required="required">
                        <option value="">Style</option>
                        <option value="1">traditionnel</option>
                        <option value="2">moderne</option>
                        
                     </select> 
                    </div>
                  </div>
                    
              

                  
              

                 <?php
                         $sql = "SELECT * FROM categories";
                         ?>
                  <div class="form-group">
                    <div class="form-label-group">
                     <select name="id_catg" id="id_catg" class="form-control" required="required">
                         <option value="">categories</option>
                         <?php 
                         if($pdo->query($sql)){
                            foreach  ($pdo->query($sql) as $row) {
                         ?>

                         <option value="<?php echo $row['id_catg']. '-'. $row['desi_catg'];?>">
                         <?php echo $row['id_catg']. '-'. $row['desi_catg'];?>
                         </option>
                            <?php 
                            }
                        } ?>
                     </select>
                    </div>
                  </div>
                    
                  <?php
                         $sql = "SELECT * FROM styliste";
                         ?>
                  <div class="form-group">
                    <div class="form-label-group">
                     <select name="id_styls" id="id_styls" class="form-control" required="required">
                         <option value="">Styliste</option>
                         <?php 
                         if($pdo->query($sql)){
                            foreach  ($pdo->query($sql) as $row) {
                         ?>

                         <option value="<?php echo $row['id_styls']. '-'. $row['nom_styls']. ' '.$row['prenom_styls'] ;?>">
                         <?php echo $row['id_styls']. '-'. $row['nom_styls']. ' '.$row['prenom_styls'] ;?>
                         </option>
                            <?php 
                            }
                        } ?>
                     </select>
                    </div>
                  </div>

               
                <input type="submit" class="btn btn-primary btn-block" name="ajouter" value="Ajouter">
              </form>
        </div>
              
       
    </div>
  </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     

    </div>
    <!-- /.content-wrapper -->
    <?php include 'foot.php' ;?>
