<?php
    $save_path = getcwd();
        
    
    $dir = explode('\\',$save_path);
        
        
        
        $count = count($dir);
        $count = $count - 2;
        $path = "";
        for($x =0;$x< $count;$x++){
            $path .= $dir[$x]."\\";
        }
        $save_path  = $path."img_pub\\";
    echo $save_path;
?>
