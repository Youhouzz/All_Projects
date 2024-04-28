<?php include "header.php"; ?>

<div class="container">
<form method="post" action="?url=login">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
</div>