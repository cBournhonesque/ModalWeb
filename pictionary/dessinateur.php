<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Pictionary</title>
        <link href="css/style.css" rel="stylesheet"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/dessinateur.js" type="text/javascript"></script>

    </head>
    <body>
        <h1>Dessinateur</h1>

        <div id="conteneur">
            <canvas id="tableau" width="500" height="300"></canvas>
            <br>
            <button id="boutonEfface">Tout effacer</button>
            <br><br>
            Largeur du trait:
            <button id="boutonFin">Fin</button>
            <button id="boutonEpais">Épais</button>
            <br><br>
            Couleur du trait:
            <button id="boutonNoir">Noir</button>
            <button id="boutonRouge">Rouge</button>
            <button id="boutonVert">Vert</button>
            <button id="boutonBleu">Bleu</button>
        </div>
    </body>
</html>
