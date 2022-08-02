var canvases = [];
var currentCanvasIndex = 0;

var load_canvas;

var chevron_input_value;
const del = document.querySelector('#delete');
 // current unsaved state
var state;
 // past states
var undo = [];
 // reverted states
var redo = [];
var Shadow = {
  color: '#000000',
  blur: 7,    
  offsetX: 10,
  offsetY: 10,
}
// image apply filter function
var f = fabric.Image.filters;

// ========== Functions for Studio ===========================
$(document).ready(function(){


  $(".left-menu-icon").children().children().click(function() {
      if ($(this).hasClass("remove-search-bar")) {
        $('.template-display-searchbar').addClass("d-none")
      }
      else{
        $('.template-display-searchbar').removeClass("d-none")
      }
  })

  $(".controller-btn").click(function() {
    if ($(this).siblings().is(':visible')) {
      $(this).removeClass('active-btn');
      $(this).siblings().hide();
    }
    else {
      $(".controller-btn").siblings().hide();
      $(".controller-btn").removeClass('active-btn')
      $(this).addClass('active-btn')
      $(this).siblings().show();
    }
  })

  $('#left-menu-close').click(function() {
    $(".left-menu-container").toggle()  
  })

  $('#font-family').select2();

  $('.textbox-char, .common-char, .image-char').attr('style', 'display:none!important');



  newCanvas(0);
  
  $('#stage').on('click', '.add-canvas', function(){
    
    let newIndex = canvases.length;
    
    let $canvaWrapper = $("<div>");
    $canvaWrapper.addClass("canvas-wrapper");    
    $canvaWrapper.attr("data-index", newIndex);  
    
    let $canva = $("<canvas>");
    $canva.css( "display", "none" );
    $canva.attr( "id", "canvas-element-" + newIndex );
    
    let $btnRemove = $('<button class="remove-canvas">');
    $btnRemove.append('<i class="fa fa-times">');
     
    // let $btnClone = $('<button class="clone-canvas">');
    // $btnClone.append('<i class="fa fa-clone">');
    
    $canvaWrapper.append($canva);
    $canvaWrapper.append($btnRemove);
    // $canvaWrapper.append($btnClone);

    $canvaWrapper.insertBefore('.add-canvas');
    
    $canva.fadeIn( "fast", function(){
      
      newCanvas(newIndex);
      
    });
    

       
  });
      
  $('#stage').on('click', '.remove-canvas', function(){
         
      let index = parseInt($(this).parents(".canvas-wrapper").attr("data-index"));
    
      $(this).parents(".canvas-wrapper").hide();
      
      delete canvases[index];

    
    });

    
  
})

// ======================================
// ===========================================================

function newCanvas(newIndex){  
   
  // console.log("New Canvas index#"+newIndex);
  
  let canvas = new fabric.Canvas('canvas-element-' + newIndex, {
    selection: true,
    backgroundColor: '#ffffff'
  });
  // canvas Selector
  fabric.Object.prototype.set({
    transparentCorners: false,
    cornerColor: '#454545',
    cornerSize: 12,
    cornerStyle: 'circle',
    // padding: 10,
  });

  canvas.setWidth(800); 
  canvas.setHeight(500);
  
  // Image filter
  function applyFilter(index, filter) {
    var obj = canvas.getActiveObject();
    obj.filters[index] = filter;
    var timeStart = +new Date();
    obj.applyFilters();
    var timeEnd = +new Date();
    var dimString = canvas.getActiveObject().width + ' x ' +
      canvas.getActiveObject().height;
    $('bench').innerHTML = dimString + 'px ' +
      parseFloat(timeEnd-timeStart) + 'ms';
    canvas.renderAll();
  }
  function applyFilterValue(index, prop, value) {
    var obj = canvas.getActiveObject();
    if (obj.filters[index]) {
      obj.filters[index][prop] = value;
      var timeStart = +new Date();
      obj.applyFilters();
      var timeEnd = +new Date();
      var dimString = canvas.getActiveObject().width + ' x ' +
        canvas.getActiveObject().height;
      $('bench').innerHTML = dimString + 'px ' +
        parseFloat(timeEnd-timeStart) + 'ms';
      canvas.renderAll();
    }
  }

  // // zooming canvas area
  canvas.on('mouse:wheel', function(opt) {
    var delta = opt.e.deltaY;
    var zoom = canvas.getZoom();
    zoom *= 0.999 ** delta;
    if (zoom > 20) zoom = 20;
    if (zoom < 0.01) zoom = 0.01;
    canvas.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);
    opt.e.preventDefault();
    opt.e.stopPropagation();
  });


  $('.canvas_resolution_input').on('change input', function(event) {

    if ($(this).attr('id') == 'canvas_width') {
      canvas.setWidth(event.target.value);
    }
    else if ($(this).attr('id') == 'canvas_height') {
      canvas.setHeight(event.target.value);
    }
    canvas.renderAll();

  })


  /**
 * Push the current state into the undo stack and then capture the current state
 */
 function save() {
  // clear the redo stack
  redo = [];
  $('#redo').prop('disabled', true);
  // initial call won't have a state
  if (state) {
    undo.push(state);
    $('#undo').prop('disabled', false);
  }
  state = JSON.stringify(canvas);
}

function replay(playStack, saveStack, buttonsOn, buttonsOff) {
  saveStack.push(state);
  state = playStack.pop();
  var on = $(buttonsOn);
  var off = $(buttonsOff);
  // turn both buttons off for the moment to prevent rapid clicking
  on.prop('disabled', true);
  off.prop('disabled', true);
  canvas.clear();
  canvas.loadFromJSON(state, function() {
    canvas.renderAll();
    // now turn the buttons back on if applicable
    on.prop('disabled', false);
    if (playStack.length) {
      off.prop('disabled', false);
    }
  });
}


// Fliping active objects
$('.flip').on('click',function(){
  // alert('hello')
  if($(this).attr('id') == 'flip_horizontally') {
    if(canvas.getActiveObject().flipX == false){
      $(this).addClass('active-btn');
      canvas.getActiveObject().set('flipX', true); 
    }
    else{
      $(this).removeClass('active-btn');
      canvas.getActiveObject().set('flipX', false);
    }    
  }
  else if($(this).attr('id') == 'flip_vertically') {
    if(canvas.getActiveObject().flipY == false){
      $(this).addClass('active-btn');
      canvas.getActiveObject().set('flipY', true);
    }
    else{
      $(this).removeClass('active-btn');
      canvas.getActiveObject().set('flipY', false);
    }   
  }
  canvas.renderAll();
  save();

})
// Deleting selected objects with Delete Button
del.addEventListener('click', () => {
  canvas.getActiveObjects().forEach((obj) => {
    canvas.remove(obj)
  });
  canvas.discardActiveObject().renderAll();
  save();
})
// Deleting selected objects with Backspace && Delete Keys on keyboard
$('html').keyup(function(e){
    if(e.keyCode == 46) {
      canvas.getActiveObjects().forEach((obj) => {
        canvas.remove(obj)
      });
      canvas.discardActiveObject().renderAll();
      save();
    }
    var evtobj = window.event? event : e
    if (evtobj.keyCode == 90 && evtobj.ctrlKey) {
      replay(undo, redo, '#redo', this);
    }
});

// -------------------change opacity of selected objects--------------------

var obj = canvas.getActiveObject();
$(document).on("input change", "#object_opacity", function (event){
    // var opacity1 = event.target.value;
    // opacity1 = opacity1 / 100;
    // console.log(opacity1);
    canvas.getActiveObject().set({
      opacity: event.target.value
  });
    canvas.renderAll();
});

// ----------------Uploader--------------------
function changePhoto(input) {
  if (input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      var source = e.target.result;
      $(".list").append("<li class='mb-3 add-elements img'><img src=" + source + " width='100%' class='rounded'></li>")
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#addPhoto").change(function() {
  changePhoto(this);
});

// --------------------------Object Alignment---------------------


$('.alignment').click(function() {
  var cur_value = $(this).attr('data-action');
  var activeObj = canvas.getActiveObject() || canvas.getActiveGroup();
  
  if($(this).hasClass('sendBackward')) {
    canvas.sendBackwards(activeObj)
  }
  if($(this).hasClass('sendFoward')) {
    canvas.bringForward(activeObj)
  }
  if($(this).hasClass('sendBack')) {
    canvas.sendToBack(activeObj)
  }
  if($(this).hasClass('sendFront')) {
    canvas.bringToFront(activeObj)
  }

  if (cur_value != '' && activeObj) {
    process_align(cur_value, activeObj);
    activeObj.setCoords();
    canvas.renderAll();
  } else {
    alert('Please select a item');
    return false;
  }
  save();
});

/* Align the selected object */
function process_align(val, activeObj) {
  switch (val) {

    case 'left':
      activeObj.set({
        left: 0
      });
      break;
    case 'right':
      activeObj.set({
        left: canvas.width - (activeObj.width * activeObj.scaleX)
      });
      break;
    case 'top':
      activeObj.set({
        top: 0
      });
      break;
    case 'bottom':
      activeObj.set({
        top: canvas.height - (activeObj.height * activeObj.scaleY)
      });
      break;
    case 'center':
      activeObj.set({
        left: (canvas.width / 2) - ((activeObj.width * activeObj.scaleX) / 2)
      });
      break;
    case 'middle':
      activeObj.set({
        top: (canvas.height / 2) - ((activeObj.height * activeObj.scaleY) / 2)
      });
      break;
  }
}


// --------------Cloning Selection-------------------------------------

$('#cloneSelected').click(function() {

  // ========copying selection============
    canvas.getActiveObject().clone(function(cloned) {
      _clipboard = cloned;
      // console.log(_clipboard)
    });

    // ========pasting selection============
    _clipboard.clone(function(clonedObj) {
      canvas.discardActiveObject();
      clonedObj.set({
        left: clonedObj.left + 10,
        top: clonedObj.top + 10,
        evented: true,
      });  
      if (clonedObj.type === 'activeSelection') {
        // active selection needs a reference to the canvas.
        clonedObj.canvas = canvas;
        clonedObj.forEachObject(function(obj) {
          canvas.add(obj);
        });
        // this should solve the unselectability
        clonedObj.setCoords();
      } else {
        canvas.add(clonedObj);
      }
      _clipboard.top += 10;
      _clipboard.left += 10;
      canvas.setActiveObject(clonedObj);
      canvas.requestRenderAll();
    });
    save();
});




// input slider function
var input_slider = $(".effects_input");
input_slider.on('input', function(event) {
  var output = $(this).parent().siblings().find('input');
  output.val(event.target.value);
  // console.log($(this).attr('id'))
  if ($(this).attr('id') == 'shadow-blur') {
    canvas.getActiveObject().shadow.blur = event.target.value
  }
  if ($(this).attr('id') == 'offsetx') {
    canvas.getActiveObject().shadow.offsetX = event.target.value
  }
  if ($(this).attr('id') == 'offsety') {
    canvas.getActiveObject().shadow.offsetY = event.target.value
  }
  canvas.renderAll();
  save();
})

$(".slider_input").on("change", function (event){
  if ($(this).hasClass('shadow-blur')) {
    $("#shadow-blur").val($(this).val())
    canvas.getActiveObject().shadow.blur = event.target.value
  }
  if ($(this).hasClass('offsetx')) {
    $("#offsetx").val($(this).val())
    canvas.getActiveObject().shadow.offsetX = event.target.value
  }
  if ($(this).hasClass('offsety')) {
    $("#offsety").val($(this).val())
    canvas.getActiveObject().shadow.offsetY = event.target.value
  }
  canvas.renderAll();
  save();
})

$('.checkbox').on('change',function(){
  // if($(this).prop('checked')) {
    $(this).parent().siblings().toggle()
    if($(this).attr('id') == 'shadow') {
      if($(this).is(':checked')){
        canvas.getActiveObject().set({
          shadow: Shadow
        })
      }
      else {
        canvas.getActiveObject().set({
          shadow: null,
        })
      }
    }
    else if($(this).attr('id') == 'stroke') {
      if($(this).is(':checked')){
        canvas.getActiveObject().set({
          strokeWidth: 5,
        })
      }
      else {
        canvas.getActiveObject().set({
          strokeWidth: null,
        })
      }
    }
    else if($(this).attr('id') == 'greyscale') {
      applyFilter(0, this.checked && new f.Grayscale());
    }
    else if($(this).attr('id') == 'image_blur') {
      applyFilter(11, this.checked && new f.Blur({
        value: parseFloat($('#blur-value').value)
      }));
    }
    
  canvas.renderAll()
});

// image blur
$('#blur-value').on('input', function() {
  applyFilterValue(11, 'blur', parseFloat(this.value, 10));
});

// chevron click function
$('.chevron').click(function() {
  chevron_input_value = parseInt($(this).parent().siblings().children().val());
  // increament or decreament according to chevron click
  if($(this).children().attr('icon') == 'chevron-up') {
    chevron_input_value ++;
  }
  else if ($(this).children().attr('icon') == 'chevron-down') {
    chevron_input_value --;
  }
  $(this).parent().siblings().children().val(chevron_input_value);
  // Putting value according to input ID into canvas
  if ($(this).parent().siblings().children().attr('id') == 'text-font-size') {
    canvas.getActiveObject().set("fontSize", chevron_input_value);
  }
  else if ($(this).parent().siblings().children().attr('id') == 'stroke') {
    canvas.getActiveObject().set("strokeWidth", chevron_input_value);  
  }
  canvas.renderAll();
  save();
})


document.getElementById("text-line-height").addEventListener("change", (event) => {
  canvas.getActiveObject().set("lineHeight", event.target.value);
  canvas.renderAll();
  save();
});
document.getElementById("letter-spacing").addEventListener("change", (event) => {
  canvas.getActiveObject().set("charSpacing", event.target.value);
  canvas.renderAll();
  save();
});



 // ----------------Text align------------
 document.getElementById("text-align").addEventListener("change", (event) => {
  canvas.getActiveObject().set("textAlign", event.target.value);
  canvas.renderAll();
  save();
});
// ----------------------font Type---------------------
var fontTypeProps =  $(".fonttype");    
for (var i = 0, max = fontTypeProps.length; i < max; i += 1) {
	fontTypeProps[i].onclick = function () {
		var canvasActiveObj = canvas.getActiveObject();
			if ($(this).children().hasClass('bold')) {
        if ($(this).hasClass('active-btn')) {
          $(this).removeClass('active-btn');
          canvasActiveObj.set("fontWeight", "");
        }
        else {
          $(this).addClass('active-btn');
				  canvasActiveObj.set("fontWeight", "bold");
        }
			}
			if ($(this).children().hasClass('italic')) {
        if ($(this).hasClass('active-btn')) {
          $(this).removeClass('active-btn');
          canvasActiveObj.set("fontStyle", "");
        }
        else{
          $(this).addClass('active-btn');
				canvasActiveObj.set("fontStyle", "italic");
        } 
			}
			if ($(this).children().hasClass('underline')) {
        if ($(this).hasClass('active-btn')) {
          $(this).removeClass('active-btn');
          canvasActiveObj.set("underline", false);
        }
        else {
          $(this).addClass('active-btn');
				  canvasActiveObj.set("underline", true);
        }
			}
		canvas.renderAll();
    save();
  };
}


// upload font button function
$(document).on('click', '.uploaded-fonts',function(){
  var textData = 'Text';
  const textbox = new fabric.Textbox(textData, {
    fontFamily: $(this).html(),
    fill: "#000",
    // fontSize: 45,
    // fixedWidth: 300
  });
  canvas.add(textbox);
  canvas.centerObject(textbox); 
  canvas.setActiveObject(textbox);
  save();
})

// preload fonts
// css\preload_fonts.css ---- @fontface
// js\custom.js ---- fetch fonts name into select tag
// preload_fonts.php --- preload fonts in browser 
var font_Array = [];
$.ajax({
  dataType: "json",
  async:false,
  url: 'js/googlefonts.json',
  success: function(data){
    $.each( data.items, function( index, font ) {
      font_Array.push(font.family)
    });
  }
});
var fonts = font_Array
var select = document.getElementById("font-family");
fonts.forEach(function(font) {
  var option = document.createElement('option');
  option.innerHTML = font;
  option.value = font;
  select.appendChild(option);
});

// Add an event listener for each button.
// When a button is clicked, get the font name, load the font, and set the new font family.
$('#font-family').on('select2:select', function (e) {
  var data = e.params.data;
  // console.log(data.id)
  // Load fonts when called using Font Face Observer
  Promise.all(
    [data.id].map(font => new FontFaceObserver(font).load())
  ).then(function() {
      canvas.getActiveObject().set("fontFamily", data.id);
      canvas.renderAll();
    })
});
// ----------------Fonts Uploader--------------------
function changeFont(input) {
  if (input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      var file_data = $('#addFonts').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
                           
    $.ajax({
        url: './font_upload.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            $('head').append('<style>'+php_script_response+'</style>');
            var file_name = file_data.name.split('.')[0];
            Promise.all(
              [file_name].map(font => new FontFaceObserver(font).load())
            ).then(function() {
              $(".font_list").append("<li class='text-center uploaded-fonts p-3 m-2 rounded' style='font-family: "+file_name+"; word-break: break-word'>"+file_name+"</li>");
              })            
        }
     });
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#addFonts").change(function() {
  changeFont(this);
});



  save();
  // register event listener for user's actions
  canvas.on('object:modified', function() {
    save();
  });
  
  // =========== Add Elements Module (Shapes) ===============

  $(document).on('click', '.add-elements',function(){
    var stroke_width = parseInt($(this).attr('strokeWidth'));
    var fill_color = $(this).attr('fill');
    // console.log(canvas)
    if ($(this).hasClass('square')) {
      
      const rect = new fabric.Rect({
        strokeWidth: stroke_width,
        stroke: "#f7941d",
        fill: fill_color,
        width: 100,
        height: 100,
        // shadow: Shadow,

      });
      canvas.add(rect);
      canvas.centerObject(rect); 
      canvas.setActiveObject(rect);
    }
    else if ($(this).hasClass('circle')) {
      const circle = new fabric.Circle({
            radius: 50,
            strokeWidth: stroke_width,
            stroke: "#f7941d",
            fill: fill_color,
            // shadow: Shadow,
          });
      canvas.add(circle);
      canvas.centerObject(circle); 
      canvas.setActiveObject(circle);
    }
    else if ($(this).hasClass('triangle')) {
      const triangle = new fabric.Triangle({
        strokeWidth: stroke_width,
        fill: fill_color,
        stroke: "#f7941d",
        // shadow: Shadow,
      });
      canvas.add(triangle);
      canvas.centerObject(triangle); 
      canvas.setActiveObject(triangle);
    }
    else if ($(this).hasClass('img')) {
      var img_src = $(this).children().attr('src')
      fabric.Image.fromURL(img_src, function(myImg) {
      //i create an extra var for to change some image properties
      var img1 = myImg.set({ left: 0, top: 0,
        // shadow: Shadow,
      });
      canvas.add(img1); 
      canvas.centerObject(img1); 
      canvas.setActiveObject(img1);
      });
    }
    // save();
  });


  // cropping image


// creating text component
$('.create-text-btn').click(function() {
  var textData = $(this).attr('data-id');
  var textSize = $(this).attr('data-size');

  const textbox = new fabric.Textbox(textData, {
    fontFamily: "sans-serif",
    fill: "#000",
    fontSize: textSize,
    fixedWidth: 3000,
    stroke: '#454545',
    strokeWidth: 0,
    // shadow: Shadow,
  });
  canvas.add(textbox);
  canvas.centerObject(textbox); 
  canvas.setActiveObject(textbox);
  save();
});

  canvas.on('selection:created', function() {
    var type = canvas.getActiveObject().type;
    $('.textbox-char, .common-char, .image-char').attr('style', 'display:none!important');
    $('.'+type+'-char').attr('style',null);
    $('.common-char').attr('style',null)
  })
  canvas.on('selection:updated', function() {
    var type = canvas.getActiveObject().type;
    $('.textbox-char, .common-char, .image-char').attr('style', 'display:none!important');
    $('.'+type+'-char').attr('style',null);
    $('.common-char').attr('style',null)
  })
  canvas.on('selection:cleared', function() {
    $('.textbox-char, .common-char, .image-char').attr('style', 'display:none!important');
  })

  $('.canvas-wrapper').on('click', function() {
    canvas.discardActiveObject().renderAll() 
    }).children().click(function(){
      return false;
  })
  
  // undo and redo buttons
  $('#undo').click(function() {
    replay(undo, redo, '#redo', this);
  });
  
  $('#redo').click(function() {
    replay(redo, undo, '#undo', this);
  })






// cropping and clipping function
  
  var pos = [0, 0];
  
  var r = document.getElementById('canvas-element-' + newIndex).getBoundingClientRect();
  pos[0] = r.left;
  pos[1] = r.top;

  var mousex = 0;
  var mousey = 0;
  var crop = false;
  var disabled = false;
  var object;

  
  var el = new fabric.Rect({
      fill: '#000000',
      stroke: '#ccc',
      strokeDashArray: [2, 2],
      opacity: 1,
      width: 1,
      height: 1
  });
 

  var clipPath;
  canvas.preserveObjectStacking = true;
  $("#cropA").click(function() {

    el.visible = false;
    canvas.add(el);

    object = canvas.getActiveObject();
    canvas.discardActiveObject()
    // console.log(object.type)
    // if(object.type == "image") {
      object.set('selectable', false)
      canvas.renderAll();
    // }

    canvas.on("mouse:down", function (event) {
      if (disabled) return;
      el.left = event.pointer.x;
      el.top =  event.pointer.y;
      el.selectable = true;
      el.visible = true;
      mousex = event.pointer.x;
      mousey = event.pointer.y;
      crop = true;
      canvas.bringToFront(el);
    });
    
    canvas.on("mouse:move", function (event) {
        if (crop && !disabled) {
            if (event.pointer.x - mousex > 0) {
                el.set('width', event.pointer.x - mousex);
            }
    
            if (event.pointer.y - mousey > 0) {
                el.set('height', event.pointer.y - mousey);
            }
        }
    }); 
    canvas.on("mouse:up", function (event) {
        crop = false;
    });
  })

  $('#cropB').click(function() {

    canvas.controlsAboveOverlay = true;
      // var left = el.left - object.left;
      // var top = el.top - object.top;      
      var width = el.width ;
      var height = el.height;
      
    clipPath = new fabric.Rect();
    clipPath.set({
      width: width,
      height:height,
      top: el.top,
      left: el.left,
      absolutePositioned: true
    })
    object.set({clipPath: clipPath});
    object.selectable = true;
    disabled = true;
    el.visible = false;
    canvas.renderAll()
    // console.log("Image Left Pos = " +object.left);
    // console.log("Selection Left Pos = " +el.left);
    // console.log("New Selection Left Pos = " +left)

  })
  $('#done').click(function() {
    clipPath.set({
      absolutePositioned: false,
    })
    canvas.renderAll()
  })


  $('#b').click(function(){
    var dataUrl = canvas.toDataURL({
        format:'png',
        quality:1,
        multiplier:4,
        enableRetinaScaling:true
      });
  
      var pngHeader= 'data:image/png;base64,';
      var data = dataUrl.replace(pngHeader, '');
  
      var binary_string = window.atob(data);
      var len = binary_string.length;
      var bytes = new Uint8Array(len);
      for (var i = 0; i < len; i++) {
        bytes[i] = binary_string.charCodeAt(i);
      }
      // dots per inch
      var dpi = 300;
      // pixels per metre
      var ppm = Math.round(dpi / 2.54 * 100);
      bytes = rewrite_pHYs_chunk(bytes, ppm, ppm);
  
      // re-encode PNG (btoa method)  
      var b64encoded = btoa(handleCodePoints(bytes));
      $('body').append($('<img/>').attr('src', pngHeader + b64encoded));  
      
      
  });



  canvases[newIndex] = canvas;
  bindCanvas(canvas); 
  load_canvas = canvas
  // console.log(load_canvas)
    
}

  
function bindCanvas(canvas){
    canvas.on('selection:created', function(o){
    let canvasId = o.selected[0].canvas.getElement().id;
    for(let i=0; i < canvases.length; i++){
      if(canvases[i] == o.selected[0].canvas){
        currentCanvasIndex = i;
        // console.log(canvas.getActiveObject().get('type'))
        // console.log(canvases[i])        
      }
      else{
        canvases[i].discardActiveObject().renderAll();
      }
    }
        
  });
  
}





jQuery(function(){
  
    
  
});


// -------------------change color of selected objects--------------------
var colorWell;
window.addEventListener("load", startup, false);

function startup() {
  colorWell = document.getElementsByClassName("colors");
  $.each(colorWell,function(i,e){
    e.addEventListener("input", updateFirst, false);
    e.select()
  });
}
function updateFirst(event) {
  // console.log(load_canvas)
  if($(this).attr('id') == 'fill-color') {
    load_canvas.getActiveObject().set("fill", event.target.value);
  }
  if($(this).attr('id') == 'stroke-color') {
    load_canvas.getActiveObject().set("stroke", event.target.value);
  }
  if($(this).attr('id') == 'shadow-color') {
    load_canvas.getActiveObject().shadow.color = event.target.value;
  }
  load_canvas.renderAll();
  // save();
}

