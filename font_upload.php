<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'fonts/uploaded_fonts/' . $_FILES['file']['name']);
        // print_r($_FILES['file']['name']);
        $file_name = $_FILES['file']['name'];
        $fp = fopen("css/preload_fonts.css", "a");
        $string ="@font-face {
  font-family: '".explode(".", $file_name)[0]."';
  font-style: normal;
  src: url('../fonts/uploaded_fonts/" .$file_name. "') format('woff2');
}\n";
        fwrite($fp, $string);
        fclose($fp);

        // $fp1 = fopen("uploaded_font_text.txt", "a");
        // $string1 = "".explode(".", $file_name)[0]." ";
        // fwrite($fp1, $string1);
        // fclose($fp1);


        // $head_string ="@font-face {
        //     font-family: '".explode(".", $file_name)[0]."';
        //     font-style: normal;
        //     src: url('fonts/uploaded_fonts/" .$file_name. "') format('woff2');
        //   }\n";

        // echo $head_string;
        }

?>