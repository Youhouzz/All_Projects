<?php include "header.php"; ?>

<div class="container">
<form method="post" action="http://localhost/recettes/?url=register">
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre nom">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre prenom">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail">
  </div>
  <button type="submit" name="inscription" class="btn btn-primary">Submit</button>
</form>
</div>
</body>

</html>