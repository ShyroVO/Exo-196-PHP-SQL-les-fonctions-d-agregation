<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous
     * connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36
     * ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la
     * fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou
     * égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca
     * n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.

    try {
    $user = 'root';

    $pdo = new PDO("mysql:host=localhost;dbname=table_test_php;charset=utf8", 'root' , '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $nomDoe = $pdo->prepare("SELECT MIN(age) as agee FROM table_test_php.user ");
        $state = $nomDoe->execute();
        if ($state){
            $mmin = $nomDoe->fetch();
            echo '<div>age min: '.$mmin['agee'].'</div>';
        }
        echo '<hr>';

        $nomDoe = $pdo->prepare("SELECT MAX(age) as agee FROM table_test_php.user ");
        $state = $nomDoe->execute();
        if ($state){
            $mmin = $nomDoe->fetch();
            echo '<div>age max: '.$mmin['agee'].'</div>';
        }
        echo '<hr>';

        $nomDoe = $pdo->prepare("SELECT count(*) as num FROM table_test_php.user ");
        $state = $nomDoe->execute();
        if ($state){
            $mmin = $nomDoe->fetch();
            echo '<div>num: '.$mmin['num'].'</div>';
        }
        echo '<hr>';

        $nomDoe = $pdo->prepare("SELECT count(numero) as numm FROM table_test_php.user WHERE numero >=5 ");
        $state = $nomDoe->execute();
        if ($state){
            $mmin = $nomDoe->fetch();
            echo '<div>r: '.$mmin['numm'].'</div>';
        }
        echo '<hr>';

        $nomDoe = $pdo->prepare("SELECT AVG(age) as agee FROM table_test_php.user ");
        $state = $nomDoe->execute();
        if ($state){
            $mmin = $nomDoe->fetch();
            echo '<div>age moy: '.$mmin['agee'].'</div>';
        }
        echo '<hr>';

    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }

    ?>
</body>
</html>

