<?php

?>

<script src="js/fabric_v5.min.js"></script>
<script src="https://cdn.rawgit.com/murkle/rewrite-png-pHYs-chunk/master/index.js" type="text/javascript"></script>
<script>
function handleCodePoints(array) {
    var CHUNK_SIZE = 0x8000; // arbitrary number here, not too small, not too big
    var index = 0;
    var length = array.length;
    var result = '';
    var slice;
    while (index < length) {
        slice = array.slice(index, Math.min(index + CHUNK_SIZE, length)); 
        result += String.fromCharCode.apply(null, slice);
        index += CHUNK_SIZE;
    }
    return result;
}
</script>
<!-- <script src='https://purl.eligrey.com/github/canvas-toBlob.js/blob/master/canvas-toBlob.js'></script> -->
<!-- <script src='https://cdn.rawgit.com/eligrey/FileSaver.js/5ed507ef8aa53d8ecfea96d96bc7214cd2476fd2/FileSaver.min.js'></script> -->
<!-- Custom -->
<script src="js/custom.js"></script>
<!-- <script src="js/controllers.js"></script> -->
</html>

