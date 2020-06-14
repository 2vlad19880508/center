<?php 
/*
Template name: Контакты
*/
?>
<?php get_header(); ?>
      <div id="content">
        <section class="content-block gray info">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="breadcrumbs"><a href="/">Херсон-центр</a> / Контакты</div>
                <h3 class="page-title">Контакты</h3>
                <div class="row">
                  <div class="col-xs-12 col-md-5">
                    <div id="map"></div>
                  </div>
                  <div class="col-xs-12 col-md-7">
                    <div class="contacts">
                      <div class="place">г. Херсон, ул. Соборная (Ленина), 2</div>
                      <div class="phone">                        
                        <p>+38 (050) 49 45 250</p>
                      </div>
                      <div class="mail">
                        <p>kherson-centr@ukr.net</p>                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>        
      </div>
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
<noscript><div><img src="https://mc.yandex.ru/watch/43408849" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php get_footer(); ?>