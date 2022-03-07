<?php
class user_thierolf
{
    public $cObj;// The backReference to the mother cObj object set at call time

    public function main($content, $conf)
    {
        $value = $conf['value'];
        return $content;
    }

    public function show_pdfs()
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
        fclose($dh);
        asort($dirFiles);
        foreach ($dirFiles as $file => $value) {
            $teile = explode("_", $file);
            $content .= "<a href=\"".$verzeichnislink.$file."\" target=\"_blank\"><b>".$value."</b></a><br>";
        }
        return $content;
    }
}
