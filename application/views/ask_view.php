<html  xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="https://opengraph.org/schema/">
    <head>
        <title>勇闖雅柏神秘禁地</title>
        <base href="<?= WEB_HOST ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <meta name="title" content="My 10 Days with Ardbeg 終極艾雷威士忌日誌" />
        <meta name="description" content="體驗艾雷島上極致重泥煤的每一天，分享你與Ardbeg的終極日誌，有機會將一瓶Ardbeg帶回家常伴左右！" />
        <meta HTTP-EQUIV="Pragma" content="no_cache" />
        <link rel="shortcut icon" href="<?=WEB_HOST?>images/200x200.jpg" />
        <link href="<?= base_url('go18/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('images/200x200.jpg') ?>" rel="image_src" type="image/jpeg" />  

        <script type="text/javascript" src="<?=is_https?>://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
        <style type="text/css">
            body {
                background-color: #000;
                margin:           0px;
                font-family:      Lucida Grande, Verdana, Sans-serif;
                font-size:        12px;
                color:            #000;
            }
            
            .all_box{
                position: relative;
                height: 100%;
            }
            
            .asking{
                width: 1000px;
                position: absolute;
                top: 0px;
            }
            
        </style>
        <script>
          function stop(){
            alert('「未滿18歲無法進入該網頁，感謝您的造訪」');
          }
          
          $(document).ready(function(){
              $(window).resize(function(){
                  $('.asking').css({top: ($(window).height()/2-250)+'px'})
              });
              
              $(window).trigger('resize');
          })
          
        </script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-32316738-25', 'mr6fb.com');
  ga('send', 'pageview');

</script>
    </head>
    <body>      
        
        <div class="all_box">
            <div style="height:1px;background: url(<?= base_url('go18/ask_01.jpg'); ?>) no-repeat;"></div>
            <div class="asking" style="height:300px;background: url(<?= base_url('go18/ask_02.jpg'); ?>) no-repeat;">
              <a href="<?=WEB_HOST?>index.php/main/setask/">
                <div style="float:left;width:85px;height:85px;margin:210px 0 0 400px;"></div>
              </a>
              <a href="javascript:stop();">
                <div style="float:right;width:85px;height:85px;margin:210px 380px 0 0 ;"></div>
              </a> 
            </div>
            <div style="position: absolute; bottom: 0px; width: 1000px;height:73px;background: url(<?= base_url('go18/ask_03.jpg'); ?>) no-repeat;"></div>
        </div>
    </body>
</html>