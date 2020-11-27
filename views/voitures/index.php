<h1 class="text-center m-5">Liste des Voitures</h1>
<div>
<a href="./voitures"  class="btn btn-secondary float-right">Nouvelle Voiture</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($params['query'] as $key) {?>
    <tr>
      <td><?php echo $key->matricule; ?></td>
      <td> <a href="./voitures/<?php echo str_replace("/",".",$key->matricule); ?>" ><?php echo $key->nom; ?></a> </td>
      <td><?php echo $key->prix . " " . "USD"; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>