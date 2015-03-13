<?php

/*
 * echo <<<AB
 * <div id="divCanvas">
 * <canvas id="canvas" width="500" height="500">
 * Message pour les navigateurs ne supportant pas encore canvas.
 * </canvas>
 * </div>
 * AB;
 */

// ZWIBBLER
/*
 * echo <<<AB
 *
 * <div id="zwibbler1" style="width:800px;height:500px"></div>
 *
 * <script ype="text/javascript">
 * var ctx = Zwibbler.create("zwibbler1", {
 * showPropertyPanel: true
 * });
 *
 *
 * </script>
 *
 * AB;
 */
?>

<div class="container" id="myCanvasDiv">
	<div id="myCanvasColor">
		<a href="#" onclick="project.currentStyle.strokeColor = 'red';">Rouge</a>
		<a href="#" onclick="project.currentStyle.strokeColor = 'green';">Vert</a>
		<a href="#" onclick="project.currentStyle.strokeColor = 'blue';">Bleu</a>
		
	</div>
	<div id="myCanvasWidth">
		<a href="#" onclick="project.currentStyle.strokeWidth = 1;">Fin</a>
		<a href="#" onclick="project.currentStyle.strokeWidth = 3;">Moyen</a> 
		<a href="#" onclick="project.currentStyle.strokeWidth = 5;">Epais</a>
	</div>
	<div id="myCanvasTools">
		<a href="#" onclick="pencil.activate();">Stylo</a> 
		<a href="#" onclick="arrow.activate();">Flèche</a>
		<a href="#" onclick="cross.activate();">Croix</a>
		<a href="#" onclick="circle.activate();">Cercle</a>
		<a href="#" onclick="select.activate();">Sélection</a>
	</div>
	<canvas id="myCanvas" resize="true"
		style="height: 500px; width: 1000px;"></canvas>
</div>

<img alt="terrain-basketball" id="terrainBasketball"
	class="visuallyhidden" src="Media/Terrains/terrain_basketball.jpg">