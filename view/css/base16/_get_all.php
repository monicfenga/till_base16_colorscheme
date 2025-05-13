<?php
$files = scandir(__DIR__);

$final = array();

$files_ignore = ['.', '..', '_font.ttf', '_font_italic.ttf', '_generate_images.php', '_generate_demohtml.php', 'demo.html', '_preview', basename(__FILE__)];

foreach($files as $file) {

    if (in_array($file,$files_ignore,true)) {
        continue;
    }

    $css = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $file);
    
    $css_array = array();
    preg_match_all('/(--[a-zA-Z0-9]+):\s?([#a-zA-Z0-9]+);/', $css, $matches);

    for ($i = 0; $i < count($matches[1]); $i++) {
        $css_array[] = $matches[2][$i];
    }
    
    $final[$file] = array(
        'label' => ucwords(str_replace(['base16-','.css','-'], ' ', $file)),
        'href' => 'plugin/till_base16_colorscheme/view/css/base16/' . $file,
        'image' => 'plugin/till_base16_colorscheme/view/css/base16/_preview/' . str_replace('.css','.png',$file),
        'colors' => $css_array,
    );
    
}

return $final;
//var_export($final);echo ',';