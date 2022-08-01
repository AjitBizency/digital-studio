const canvas = new fabric.Canvas('c');
const add = document.querySelector('#add');
const del = document.querySelector('#delete');
// current unsaved state
var state;
// past states
var undo = [];
// reverted states
var redo = [];

// Deleting selected objects
del.addEventListener('click', () => {
    canvas.getActiveObjects().forEach((obj) => {
      canvas.remove(obj)
    });
    canvas.discardActiveObject().renderAll()
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