//fichier dessinateur.js
var canvas;
var context;
var dessine = false;//

$(document).ready(function(){
    canvas = document.getElementById("tableau");
    context = canvas.getContext("2d");
    context.lineWidth = 1;// largeur fine par défaut
    context.strokeStyle = "#000000";//fixe la couleur (optionel)

    $("#tableau").mousedown(function(e){
        // on commence à dessiner
        dessine = true;
        context.beginPath();
        var x = e.pageX - canvas.offsetLeft;
        var y = e.pageY - canvas.offsetTop;;
        context.moveTo(x,y);
        $.post("utils/save.php",{x:x,y:y,nouveau:1});
    })

    $("#tableau").mouseup(function(e){
        //on arrête de dessiner
        dessine = false;
    })

    $("#tableau").mouseout(function(e){
        // on arrête de dessiner
        dessine = false;
    })

    $("#tableau").mousemove(function(e){
        if (dessine){
            var x = e.pageX - canvas.offsetLeft;
            var y = e.pageY - canvas.offsetTop;;
            context.lineTo(x,y);//création du segment
            context.stroke();//dessine
            $.post("utils/save.php",{x:x,y:y,nouveau:0});
        }
    })
})



$(document).ready(function(){
    $("#boutonEfface").click(function(){
        context.clearRect(0,0,canvas.width,canvas.height);
        $.post("utils/efface.php");
    })

    $("#boutonFin").click(function(){
        context.beginPath();
        context.lineWidth = 1;
        $.post("utils/save.php",{x:0,y:0,nouveau:3});
    })


    $("#boutonEpais").click(function(){
        context.beginPath();
        context.lineWidth = 5;
        $.post("utils/save.php",{x:0,y:0,nouveau:4});
    })

    $("#boutonNoir").click(function(){
        context.beginPath();
        context.strokeStyle = "black";
        $.post("utils/save.php",{x:0,y:0,nouveau:5});
    })


    $("#boutonRouge").click(function(){
        context.beginPath();
        context.strokeStyle = "red";
        $.post("utils/save.php",{x:0,y:0,nouveau:6});
    })
    

    $("#boutonVert").click(function(){
        context.beginPath();
        context.strokeStyle = "green";
        $.post("utils/save.php",{x:0,y:0,nouveau:7});
    })


    $("#boutonBleu").click(function(){
        context.beginPath();
        context.strokeStyle = "blue";
        $.post("utils/save.php",{x:0,y:0,nouveau:8});
    })

});