    
    <div>

        <h1 class="m-5"><?php echo($params['query']->nom); ?></h1>
        <span class="badge badge-primary"><?php echo($params['query']->matricule); ?></span>
        <span class="badge badge-primary"><?php echo($params['query']->prix ." ". "USD"); ?></span>
        
    </div>
    <div>
        <a href="../voitures/edit/<?php echo str_replace("/",".",$params['query']->matricule); ?>"  class="btn btn-info float-left mr-2 my-3">edit</a>
        <form action="../voitures/delete/<?php echo str_replace("/",".",$params['query']->matricule); ?>" method="POST">
            <input type="submit" class="btn btn-danger my-3" value="Supprimer">
        </form>
        <a href="../"  class="btn btn-secondary float-right">retour</a>
    </div>