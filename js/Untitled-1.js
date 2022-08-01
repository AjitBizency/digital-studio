


// let imgUrl = 'https://images.unsplash.com/photo-1550537687-c91072c4792d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTY5OTZ8MHwxfHNlYXJjaHwyfHxwYXR0ZXJufGVufDB8fHx8MTY1NjU0MDkxNg&ixlib=rb-1.2.1&q=80&w=400';
// let imgUrl1 = 'http://localhost/design-studio/img/template-img/dummy.jpg'

// fabric.Image.fromURL(imgUrl, imgObj => {

//   canvas.setBackgroundImage(imgObj, canvas.renderAll.bind(canvas), {
//       strech: true,
//   });
  
//   imgObj.scaleToWidth(canvas.width);
//   imgObj.scaleToHeight(canvas.height);



  
// });




// zooming canvas area
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

/**
 * Save the current state in the redo stack, reset to a state in the undo stack, and enable the buttons accordingly.
 * Or, do the opposite (redo vs. undo)
 * @param playStack which stack to get the last state from and to then render the canvas as
 * @param saveStack which stack to push current state into
 * @param buttonsOn jQuery selector. Enable these buttons.
 * @param buttonsOff jQuery selector. Disable these buttons.
 */
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

$(function() {

  save();
  // register event listener for user's actions
  canvas.on('object:modified', function() {
    save();
  });
  
  // =========== Add Elements Module (Shapes) ===============

  $(document).on('click', '.add-elements',function(){
    var stroke_width = parseInt($(this).attr('strokeWidth'));
    var fill_color = $(this).attr('fill');
    if ($(this).hasClass('square')) {
      var Shadow = {
        color: '#000000',
        blur: 7,    
        offsetX: 0,
        offsetY: 0,
        opacity: 20,
        affectStroke: true,
      }
      const rect = new fabric.Rect({
        strokeWidth: stroke_width,
        stroke: "#f7941d",
        fill: fill_color,
        width: 100,
        height: 100,
        shadow: Shadow,

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
      });
      canvas.add(triangle);
      canvas.centerObject(triangle); 
      canvas.setActiveObject(triangle);
    }
    else if ($(this).hasClass('img')) {
      // console.log($(this).children().attr('src'))
      var img_src = $(this).children().attr('src')
      fabric.Image.fromURL(img_src, function(myImg) {
      //i create an extra var for to change some image properties
      var img1 = myImg.set({ left: 0, top: 0,});
      canvas.add(img1); 
      canvas.centerObject(img1); 
      canvas.setActiveObject(img1);
      });
    }
    save();
  });


  // ================Text===========================



  $('.create-text-btn').click(function() {
    var textData = $(this).attr('data-id');
    var textSize = $(this).attr('data-size');
    var textShadow = {
      color: '#000000',
      blur: 7,    
      offsetX: 0,
      offsetY: 0,
      opacity: 20,
      affectStroke: true
    }
    const textbox = new fabric.Textbox(textData, {
      fontFamily: "sans-serif",
      fill: "#000",
      fontSize: textSize,
      fixedWidth: 3000,
      // stroke: 'green',
      blur: 10,
      shadow: textShadow,
    });
    canvas.add(textbox);
    canvas.centerObject(textbox); 
    canvas.setActiveObject(textbox);
    save();
});


$(document).on('click', '.uploaded-fonts',function(){
  var textData = 'Text';
  const textbox = new fabric.Textbox(textData, {
    fontFamily: $(this).html(),
    fill: "#000",
    fontSize: 45,
    fixedWidth: 300
  });
  canvas.add(textbox);
  canvas.centerObject(textbox); 
  canvas.setActiveObject(textbox);
  save();
})





// ------------------------------------preload fonts--------------------------------------------------
// Files connected are

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

// ===============function to convert google fonts array into string================
// var str = '';
// var font_name = '';
// for (i = 0; i < font_Array.length; i++) {
//   // console.log(font_Array[i]);
//   font_name = font_Array[i];
//   font_name_arr = font_name.split(' ');
//   var font_name_new = '';
//   if(font_name_arr.length == 1){
//     font_name_new  = font_Array[i];
//   }else{
//     for(var j = 0; j < font_name_arr.length; j++){
//       if(j > font_name_arr.length - 2){
//         font_name_new += font_name_arr[j];
//       }else{
//         font_name_new = font_name_new + font_name_arr[j] + '+';
//       }
//     }
//   }
//   str += font_name_new + "|";
// }
// console.log(str)


// ===================================================================================================================================

var fonts = font_Array
var select = document.getElementById("font-family");
fonts.forEach(function(font) {
  var option = document.createElement('option');
  option.innerHTML = font;
  option.value = font;
  select.appendChild(option);
});

function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                var allTextArr = allText.trim().split(" ");
                console.log(allTextArr)
                allTextArr.forEach(function(font) {
                  var option = document.createElement('option');
                  option.innerHTML = font;
                  option.value = font;
                  select.appendChild(option);
                });
            }
        }
    }
    rawFile.send(null);
}
readTextFile("uploaded_font_text.txt");

// Add an event listener for each button.
// When a button is clicked, get the font name, load the font, and set the new font family.
$('#font-family').on('select2:select', function (e) {
  var data = e.params.data;
  console.log(data.id)
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

    // alert(form_data);                             
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
              $('#font-family').append("<option value='"+file_name+"'  style='word-break: break-word'>"+file_name+"</option>")
                // canvas.getActiveObject().set("fontFamily", data.id);
                // canvas.renderAll();
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
// -----------------fontSize--------------------------
  $('.chevron').click(function() {
    if($(this).children().attr('icon') == 'chevron-up') {
      font_value ++;
      $('#text-font-size').val(font_value)
    }
    else if ($(this).children().attr('icon') == 'chevron-down') {
      font_value --;
      $('#text-font-size').val(font_value)
    }
    canvas.getActiveObject().set("fontSize", font_value);
    canvas.renderAll();
    
  })
  document.getElementById("text-font-size").addEventListener("change", (event) => {
  		canvas.getActiveObject().set("fontSize", event.target.value);
  		canvas.renderAll();
      font_value = event.target.value;
  	});

  // ----------------Text align------------
  document.getElementById("text-align").addEventListener("change", (event) => {
    	canvas.getActiveObject().set("textAlign", event.target.value);
    	canvas.renderAll();
    });

  // --------------------------font Character spacing----------------------
  document.getElementById("text-line-height").addEventListener("change", (event) => {
		canvas.getActiveObject().set("lineHeight", event.target.value);
		canvas.renderAll();
	});
  document.getElementById("letter-spacing").addEventListener("change", (event) => {
		canvas.getActiveObject().set("charSpacing", event.target.value);
		canvas.renderAll();
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
			// if (this.id === "text-cmd-linethrough") {
			// 	canvasActiveObj.set("linethrough", true);
			// }
			// if (this.id === "text-cmd-overline") {
			// 	canvasActiveObj.set("overline", true);
			// }
		canvas.renderAll();
		save();
		// console.info(canvasActiveObj);
	};
}
  

// --------Selecting an Object------------------
canvas.on('mouse:down', function(options) {
  
  if (options.target) {
    if(options.target.type == 'rect' || options.target.type == 'circle' || options.target.type == 'triangle'){
      $('#color-control').removeClass('d-none');
      $('#fill-color').val(canvas.getActiveObject().fill);
      $('#object_opacity').val(canvas.getActiveObject().opacity * 100);
    }
    else if (options.target.type == 'textbox') {
      $('#color-control').removeClass('d-none');
      $('#fill-color').val(canvas.getActiveObject().fill);
      $('#object_opacity').val(canvas.getActiveObject().opacity * 100);
      $('#font-family').val(canvas.getActiveObject().fontFamily);
      $('#text-font-size').val(canvas.getActiveObject().fontSize);
      font_value = $('#text-font-size').val()
      $('#text-align').val(canvas.getActiveObject().textAlign);

    }
  }
  else{
    console.log('Clicked elsewhere');
    $('#color-control').addClass('d-none');
  }
});
// console.log(ActiveSelection.isEmpty())
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
  // undo and redo buttons
  $('#undo').click(function() {
    replay(undo, redo, '#redo', this);
  });
  $('#redo').click(function() {
    replay(redo, undo, '#undo', this);
  })
});


// -------------------change color of selected objects--------------------
var colorWell;

window.addEventListener("load", startup, false);

function startup() {
  colorWell = document.querySelector("#fill-color");
  colorWell.addEventListener("input", updateFirst, false);
  colorWell.select();
}

function updateFirst(event) {
  canvas.getActiveObject().set("fill", event.target.value);
  canvas.renderAll();
  save();
}

// -------------------change opacity of selected objects--------------------

var obj = canvas.getActiveObject();
$(document).on("change", "#object_opacity", function (){
    var opacity1 = jQuery("#object_opacity").val();
    opacity1 = opacity1 / 100;
    console.log(opacity1);
    canvas.getActiveObject().set({
      opacity: opacity1
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
      console.log(_clipboard)
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
});