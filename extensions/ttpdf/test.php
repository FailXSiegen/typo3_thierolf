<?php
class user_mylinks {
    var $cObj;// The backReference to the mother cObj object set at call time

    function main($content, $conf) {
        $value = $conf['value'];
        return $content;
    }

        function makeTeaserLink()
        {
                $link = trim($this->cObj->data["image_link"]);
                $outputlink = "";

                if (strpos($link,"www.") === 0)
                {
                        $outputlink = "http://".$link;
                }
                else
                {
                        $outputlink = $link;
                }

                return 'gfhdgshdgghdh';
        }
}
?>