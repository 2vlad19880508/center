<?php 
/*
Template name: Продажа домов
*/
?>
<?php get_header(); ?>
      <div id="content">
        <section class="estate-header content-block gray">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="breadcrumbs"><a href="/">Херсон-центр</a> / Поиск недвижимости</div>
                <div class="row">
                  <div class="col-xs-6">
                    <h3 class="page-title">Результаты поиска</h3>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php get_template_part('loop'); ?>
      </div>
<?php get_footer(); ?>