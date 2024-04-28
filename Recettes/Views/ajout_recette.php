<div class="container">
<form action="?url=add" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="description" class="form-control"> </textarea>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="ingredient" id="ingredient">
        <button class="btn btn-outline-secondary" id="add">Button</button>
    </div>
    <!-- liste ingredients -->
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Liste ingredients</label> <br>
        <input type="text" id="liste_ingredient" name="ingredient" class="form-control" hidden>
        <textarea class="form-control" id="liste_ingredient_text" disabled></textarea>
    </div>
    <!-- image -->
    <div class="input-group mb-3">
        <label class="input-group-text">Upload</label>
        <input type="file" name="image" class="form-control" >
    </div>
   
    <!-- categorie -->
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Options</label>
    <select class="form-select" name="categorie">
        <option value="">Selectionnez une categorie</option>
        <?php foreach ($categories as $categorie){ ?>
            <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom'] ?></option>
        <?php } ?> 
    </select>
    </div>
    <button type="submit" name="ajout_recette" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<script>
    document.getElementById('add').addEventListener("click", (e) => {
        e.preventDefault();
        let item = document.getElementById("ingredient").value;

        const LISTETEXT = document.getElementById("liste_ingredient_text");
        const LISTE = document.getElementById("liste_ingredient");
        if(LISTE.value == ''){
            LISTE.value = item
            LISTETEXT.value = item;
        }else{
            LISTE.value +=","+item;
            LISTETEXT.value +=","+item;
        }

        document.getElementById("ingredient").value = "";
    })
</script>