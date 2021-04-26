<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $identity = array_map('trim', $_POST);

    $uploadDir = 'public/assets/';

    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    $extensions_ok = ['jpg', 'jpeg', 'png', 'webp'];

    $maxFileSize = 1048576;

    $fileName = uniqid('', true) . '.' . $extension;

    if ((!in_array($extension, $extensions_ok))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou webp !';
    }

    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire 1Mo maximum !";
    }

    if (!empty($errors)) {
        var_dump($errors);
    } else {
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Mystère et Compagnie</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data" action="form.php">
        <div class="formul">

            <h1>Inscrivez-vous! </h1>
            <div class="mb-3">
                <label for="nom">Nom et Prénom:</label>
                <input type="text" id="nom" name="name" required>
            </div>
            <div class="mb-3">
                <label for="sexe">Sexe :</label>
                <select id="sexe" name="sex" required>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="adress">Adresse :</label>
                <input type="text" id="adress" name="adress" required>
            </div>
            <div class="mb-3">
                <label for="codepost">Code postal :</label>
                <input type="text" id="codepost" name="cp" required>
            </div>
            <div class="mb-3">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required>
            </div>
            <div>
                <label for="imageUpload">Insérez votre photo</label>
                <input type="file" name="avatar" id="imageUpload" />
            </div>
            <button class="btn btn-primary" name="send">Envoyer</button>
        </div>
    </form>
    <p><br></p>
    <?php include "rendu-carte.php" ?>
</body>

</html>