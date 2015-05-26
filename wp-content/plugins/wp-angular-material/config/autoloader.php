<?php

spl_autoload_register('autoloaderModules');

require __DIR__."/solrconfig.php";
require __DIR__."/../vendor/autoload.php";

function autoloaderModules($class){
    $initPath = __DIR__."/../modules/";

    if(strpos($class, '\\') !== false && strpos($class, "INUtils") === false){
        $classExploded = explode("\\", $class);

        $classFileToAdd = $initPath;
        $isFirst = true;
        foreach($classExploded as $pathPart){
            if($isFirst){
                $classFileToAdd .= $pathPart."/src/".$pathPart;
            }
            else{
                $classFileToAdd .= "/".$pathPart;
            }
            $isFirst = false;
        }
        $classFileToAdd .= ".php";
        if(file_exists($classFileToAdd))
        {
            require $classFileToAdd;
        }
        else{
            throw new \Exception("The class ".$class." couldn't be found");
        }
    }
}