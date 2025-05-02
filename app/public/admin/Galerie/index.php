<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image">Choisissez une image :</label>
    <input type="file" name="image" id="image" accept="image/*" required>
    <input type="submit" value="Téléverser">
    </form>
</body>
</html>

<!-- Formulaire pour téléverser plusieurs images (commenté pour l'instant) 
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="images">Choisissez plusieurs images :</label>
    <input type="file" name="images[]" id="images" multiple accept="image/*" required>
    <input type="submit" value="Téléverser">
</form> -->
