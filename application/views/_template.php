<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="en">
<head>
    <title>{title}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">
    <script src="/assets/js/jquery-1.6.js" ></script>
    <script src="/assets/js/cufon-yui.js"></script>
    <script src="/assets/js/cufon-replace.js"></script>
    <script src="/assets/js/Josefin_Sans_400.font.js"></script>
    <script src="/assets/js/Tangerine_700.font.js"></script>
    <script src="/assets/js/atooltip.jquery.js"></script>
    <script src="/assets/js/jquery.nivo.slider.pack.js"></script>
    <script src="/assets/js/script.js"></script>
    <!--[if lt IE 9]>
    <script src="/assets/js/html5.js"></script>
    <style type="text/css">.aToolTip, .box1, .box1 .inner{behavior:url("/assets/js/PIE.htc");}</style>
    <![endif]-->
</head>
<body id="page1">
    <div class="body1">
        {header}
    </div>
    <div class="body3">
        <div class="main">
            <article id="content">
                {content}
            </article>
        </div>
    </div>
    <div class="body2">
        {footer}
    </div>
    <script>Cufon.now();</script>
</body>
</html>