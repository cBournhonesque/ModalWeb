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

<div class="container-fluid" id="myCanvasDiv">
	<div class="row">
	<div class="col-md-2" id="myCanvasOptions">
		<div id="myCanvasColor">
			<p><strong>Couleur</strong></p>
			<a href="#" 
			onclick='project.currentStyle.strokeColor = "red";
			 var sel = project.selectedItems;
			  for(i=0;i<sel.length;i++){sel[i].strokeColor="red";}'><img

				alt="fin" src="Media/Icones/dessiner/rouge.jpg"></a> <a href="#"
				onclick="project.currentStyle.strokeColor = 'green';"><img alt="fin"
				src="Media/Icones/dessiner/vert.jpg"></a> <a href="#"
				onclick="project.currentStyle.strokeColor = 'blue';"><img alt="fin"
				src="Media/Icones/dessiner/bleu.jpg"></a>

		</div>
		<div id="myCanvasWidth">
			<p><strong>Epaisseur</strong></p>
			<a href="#" onclick="project.currentStyle.strokeWidth = 1;"><img
				alt="fin" src="Media/Icones/dessiner/fin.png"> </a> <a href="#"
				onclick="project.currentStyle.strokeWidth = 3;"><img alt="fin"
				src="Media/Icones/dessiner/moyen.png"> </a> <a href="#"
				onclick="project.currentStyle.strokeWidth = 5;"><img alt="fin"
				src="Media/Icones/dessiner/epais.png"> </a>
				<a href="#"
				onclick="project.currentStyle.dashArray = [10, 12];">Tirets </a>
				<a href="#"
				onclick="project.currentStyle.dashArray = null;">Continu </a>
		</div>
		<div id="myCanvasTools">
			<p><strong>Forme</strong></p>
			<a href="#" onclick="pencil.activate();"><img alt="fin"
				src="Media/Icones/dessiner/stylo.png"> </a> <a href="#"
				onclick="arrow.activate();"><img alt="fin"
				src="Media/Icones/dessiner/precedent.png"> </a> <a href="#"
				onclick="cross.activate();"><img alt="fin"
				src="Media/Icones/dessiner/croix.png" id="croix"> </a> <a href="#"
				onclick="circle.activate();"><img alt="fin"
				src="Media/Icones/dessiner/cercle.png"> </a> <a href="#"
				onclick="select.activate();"><img alt="fin"
				src="Media/Icones/dessiner/select.png"> </a> <a href="#"
				onclick="suppr.activate();">Suppr</a>
		</div>
		<div id="myCanvasSave">
			<p><strong>Etapes</strong></p>
			<a href="#" onclick="save();"><img alt="fin"
				src="Media/Icones/dessiner/save.png"></a> <a href="#"
				onclick="if(etape>=1){etape = etape -1; }load();">Slide Précédente</a>
			<a href="#"
				onclick="if (etape != saves.length - 1) {etape = etape + 1;};load();">Slide
				Suivante</a> <span id="dessinerEtape"></span>
		</div>
	</div>
	<div class="col-md-10" id="myCanvasFrame">
		<canvas id="myCanvas" resize="true"
			style="height: 500px; width: 1000px;"></canvas>
	</div>
	</div>
</div>

<img alt="terrain-basketball" id="terrainBasketball"
	class="visuallyhidden" src="Media/Terrains/terrain_basketball.jpg">