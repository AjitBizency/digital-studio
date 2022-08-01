$(function() {
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Set up the canvas
    canvas = new fabric.Canvas('c');
    canvas.setWidth(500);
    canvas.setHeight(500);
    // save initial state
    save();
    // register event listener for user's actions
    canvas.on('object:modified', function() {
      save();
    });
    // draw button
    $('#draw').click(function() {
      var imgObj = new fabric.Circle({
        fill: '#' + Math.floor(Math.random() * 16777215).toString(16),
        radius: Math.random() * 250,
        left: Math.random() * 250,
        top: Math.random() * 250
      });
      canvas.add(imgObj);
      canvas.renderAll();
      save();
    });
    // undo and redo buttons
    $('#undo').click(function() {
      replay(undo, redo, '#redo', this);
    });
    $('#redo').click(function() {
      replay(redo, undo, '#undo', this);
    })
  });