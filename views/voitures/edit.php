<h1 class="mt-5">Mises à Jour des Voitures</h1>
<hr>
<form class="mt-3" action="../../voitures/edit/<?php echo str_replace("/",".",$params['query']->matricule); ?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="titre">Matricule :</label>
      <input type="text" name="matricule" class="form-control" id="titre" placeholder="Matricule" value="<?php echo $params['query']->matricule ?>">
    </div>
    <div class="form-group col-md-9">
      <label for="auteur">Nom Voiture :</label>
      <input type="auteur" name="nom" class="form-control" id="nom" placeholder="Nom Voiture" value="<?php echo $params['query']->nom ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-7"></div>
    <div class="form-group col-md-5">
      <label for="categorie">Prix Voiture :</label>
      <input type="text" class="form-control" name="prix" id="prix" placeholder="Prix Voiture" value="<?php echo $params['query']->prix ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary ">Valider</button>
  <a href="../../"  class="btn btn-secondary float-right">retour</a>
</form>