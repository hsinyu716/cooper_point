<?php
$swfFile = "index.swf";
?>
<center>
<div style="width:760px; height:883px; margin:0 0; ">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="760" height="883" id="symRacing" align="middle">
    <param name="movie" value="<?=$swfFile?>" />
    <param name="quality" value="high" />
    <param name="wmode" value="Opaque">
    <param name="play" value="true" />
    <param name="loop" value="true" />  
    <param name="scale" value="showall" />
    <param name="menu" value="true" />
    <param name="devicefont" value="false" />
    <param name="salign" value="" />
    <param name="allowScriptAccess" value="sameDomain" />
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="<?=$swfFile?>" width="760" height="883">
        <param name="movie" value="<?=$swfFile?>" />
        <param name="quality" value="high" />
        <param name="wmode" value="Opaque">
        <param name="play" value="true" />
        <param name="loop" value="true" />      
        <param name="scale" value="showall" />
        <param name="menu" value="true" />
        <param name="devicefont" value="false" />
        <param name="salign" value="" />
        <param name="allowScriptAccess" value="sameDomain" />
    <!--<![endif]-->
        <a href="http://www.adobe.com/go/getflash">
            <img src="http://wwwimages.adobe.com/www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="下載 Adobe Flash" />
        </a>
    <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
</object>
</div>
</center>