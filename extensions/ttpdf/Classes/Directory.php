<?php
namespace Thierolf\Ttpdf;

class Directory
{
    public function showPdfs()
    {
        $verzeichnis = getcwd()."/fileadmin/fahrzeuge/";
        $verzeichnislink = "/fileadmin/fahrzeuge/";
        $content = "";
        $dirFiles = array();
        $dh = opendir($verzeichnis);
        while ($file = readdir($dh)) {
            if (strstr($file, ".pdf")) {
                $filename = str_replace(".pdf", "", $file);
                $teile = explode("_", $filename);
                $dirFiles[$file] = $teile[1];
            }
        }
        asort($dirFiles);
        foreach ($dirFiles as $file => $value) {
            $teile = explode("_", $file);
            $content .= "<a href=\"".$verzeichnislink.$file."\" target=\"_blank\"><b>".$value."</b></a><br>";
        }
        return $content;
    }
}
