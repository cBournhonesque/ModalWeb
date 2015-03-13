var canvas;
var context;


$(document).ready(function(){
    canvas = document.getElementById("tableau");
    context = canvas.getContext("2d");
    setInterval(recuppererPoints,100);
})

function recuppererPoints(){
    $.post("utils/getPoints.php",function(rep){
        var x,y,nouveau;
        for(var i=0;i<rep.answer.length;i++){
            x = rep.answer[i][0];
            y = rep.answer[i][1];
            nouveau = rep.answer[i][2];
            if (nouveau == 1){//nouveau chemin
                context.stroke();
                context.beginPath();
                context.moveTo(x,y);
            }
            if (nouveau == 0){//continue
                context.lineTo(x,y);
            }
            if (nouveau == 2){//efface
                context.clearRect(0,0,canvas.width,canvas.height);
                context.beginPath();
            }
            if (nouveau == 3){//fin
                context.stroke();
                context.lineWidth = 1;
                context.beginPath();
            }
            if (nouveau == 4){//large
                context.stroke();
                context.lineWidth = 5;
                context.beginPath();
            }
            if (nouveau == 5){//noir
                context.stroke();
                context.strokeStyle = "black";
                context.beginPath();
            }
            if (nouveau == 6){//red
                context.stroke();
                context.strokeStyle = "red";
                context.beginPath();
            }
            if (nouveau == 7){//green
                context.stroke();
                context.strokeStyle = "green";
                context.beginPath();
            }
            if (nouveau == 8){//blue
                context.stroke();
                context.strokeStyle = "blue";
                context.beginPath();
            }
        }
        context.stroke();
           
    });
}

