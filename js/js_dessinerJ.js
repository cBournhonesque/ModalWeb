// Make the paper scope global, by injecting it into window:
paper.install(window);
var pencil, arrow, cross, circle, select;

window.onload = function() {

	var canvas = document.getElementById('myCanvas');
	// Create an empty project and a view for the canvas:
	paper.setup(canvas);

	var terrainBasket = new Raster('terrainBasketball');
	terrainBasket.position = paper.view.center;
	
	project.currentStyle = {
			strokeWidth: 3,
			strokeColor: 'black'
	}
	
	//var drawLayer = new Layer();

	// Create a simple drawing tool:
	pencil = new Tool();
	arrow = new Tool();
	cross = new Tool();
	circle = new Tool();
	select = new Tool();
	var path;

	// Define a mousedown and mousedrag handler
	pencil.onMouseDown = function(event) {
		path = new Path();
		path.add(event.point);
	}

	pencil.onMouseDrag = function(event) {
		path.add(event.point);
	}
	
	pencil.onMouseUp = function(event) {
		// When the mouse is released, simplify it:
		path.simplify(10);
	}
	

	arrow.onMouseDown = function(event) {
		path = new Path();
		path.add(event.downPoint);
	}

	arrow.onMouseUp = function(event) {
		path.add(event.point);
		var step = event.delta;
		step = step.normalize(10);
		var perp = step.clone();
		perp = perp.rotate(90);
		
		var line = new Path();
		line.add(event.point.subtract(step).add(perp));
		line.add(event.point);
		line.add(event.point.subtract(step).subtract(perp));
	}
	
	cross.onMouseDown = function(event){
		path = new Path();
		line = new Path();
		path.add(event.point.add([10,10]));
		path.add(event.point.add([-10,-10]));
		line.add(event.point.add([10,-10]));
		line.add(event.point.add([-10,10]));
	}
	
	circle.onMouseDown = function(event){
		path = new Path.Circle(event.point,10);
		
		
	}
	
	select.onMouseDown = function(event){
		var items = project.getItem({overlapping : new Shape.Rectangle(event.point,10)});
		items.selected = true;
		
	}
	
	view.draw();

}
	