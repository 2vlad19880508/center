<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="снять, квартиру, в, херсоне, сдам, продажа, квартир, херсон, куплю, недвижимость, купить, аренда"> 
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NM9HLV5');</script>
<!-- End Google Tag Manager -->
    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="http://allfont.ru/allfont.css?fonts=franklin-gothic-medium-cond" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php if(is_page(4)) : ?>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCPDapVnuMxl1n1vqmP1w32KFk5hsGFEZM&extension=.js'></script> 
    <script>
    google.maps.event.addDomListener(window, 'load', init);
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(46.631428,-327.382637),
            zoom: 14,
            zoomControl: false,
            disableDoubleClickZoom: false,
            mapTypeControl: false,
            scaleControl: false,
            scrollwheel: true,
            panControl: false,
            streetViewControl: false,
            draggable : true,
            overviewMapControl: false,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
          ['Херсон-центр', 'undefined', '+38 (0552) 22 65 74', 'kherson-centr@ukr.net', 'undefined', 46.631782,  32.618011, 'https://mapbuildr.com/assets/img/markers/default.png']
                  ];
                  for (i = 0; i < locations.length; i++) {
                if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
                if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
                if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
                     if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
                     if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
                      marker = new google.maps.Marker({
                          // icon: markericon,
                          position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                          map: map,
                          title: locations[i][0],
                          desc: description,
                          tel: telephone,
                          email: email,
                          web: web
                      });
          link = '';            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
               }
           function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
                var infoWindowVisible = (function () {
                        var currentlyVisible = false;
                        return function (visible) {
                            if (visible !== undefined) {
                                currentlyVisible = visible;
                            }
                            return currentlyVisible;
                         };
                     }());
                     iw = new google.maps.InfoWindow();
                     google.maps.event.addListener(marker, 'click', function() {
                         if (infoWindowVisible()) {
                             iw.close();
                             infoWindowVisible(false);
                         } else {
                             var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+telephone+"<p><a href='mailto:"+email+"' >"+email+"<a></div>";
                             iw = new google.maps.InfoWindow({content:html});
                             iw.open(map,marker);
                             infoWindowVisible(true);
                         }
                  });
                  google.maps.event.addListener(iw, 'closeclick', function () {
                      infoWindowVisible(false);
                  });
           }
          }
    </script>

  <?php endif; ?>
  <?php wp_head(); ?>

  </head>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter43408849 = new Ya.Metrika({
                    id:43408849,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
<div><img src="https://mc.yandex.ru/watch/43408849" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->
  <body <?php body_class(); ?>>
  	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NM9HLV5"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
      <header>
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-2">
                <a href="/" id="logo"><img src="<?php echo get_template_directory_uri(); ?>/pic/logo.png" alt="logo"></a>
              </div> 
              <div class="col-xs-12 col-sm-8">
                <h1 class="slogan">Наши знания и опыт – Ваша выгода</h1>
              </div>
              <div class="col-xs-12 col-sm-2 contacts">
                <p style="font-size:10.5pt;">+38 (050) 49 45 250</p>
                <p style="font-size:10.5pt;">г. Херсон, ул. Соборная (Ленина), 2</p>
              </div>
            </div>
          </div>
        </div>
        <div class="navigation content-block blue" id="main-nav">
          <div class="container">
              <nav>
                <ul>
                  <li><a href="<?php echo bloginfo('url'); ?>">Главная</a></li>
                  <li><a href="/services">Услуги</a></li>
                  <li><a href="/info">Информация</a></li>
                  <li><a href="/application">Оставить заявку</a></li>
                  <li><a href="/contacts">Контакты</a></li>
                </ul>
              </nav>
          </div>
        </div>
        <a href="#" class="mobile-menu-btn visible-xs"><i class="glyphicon glyphicon-menu-hamburger"></i></a>
      </header>