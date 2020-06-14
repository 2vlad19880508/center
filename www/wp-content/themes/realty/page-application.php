<?php 
/*
Template name: Заявка
*/
?>
<?php 
  $args = array(
  'taxonomy'      => array( 'estate_type'),
  'get'           => 'all',
); 
  $types = get_terms($args);
  $region = get_field_object('field_586380b948faf');
  $region_place = get_field_object('field_586f7b8f03c81'); 
?> 
<?php get_header(); ?>
      <div id="content">
        <section class="content-block gray">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="breadcrumbs"><a href="/">Херсон-центр</a> / Оставить заявку</div>
                <h3 class="page-title">Оставить заявку</h3>
                <form action="<?php echo get_template_directory_uri(); ?>/handler.php" method="post" id="application-form">
                  <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <div class="input-block"><input name="name" type="text" placeholder="Имя*" required></div>
                      <div class="input-block"><input name="email" type="email" placeholder="Электронная  почта*" required></div>
                      <div class="input-block"><input name="tel" type="tel" placeholder="Телефон*" required></div>
                      <div class="input-block"><textarea name="comment" id="" placeholder="Комментарий*" required></textarea></div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                      <div class="input-block">
                        <select name="type">
                          <option value="Не выбрано" data-value="0">Тип недвижимости</option>
                          <?php foreach ($types as $key => $choice) : ?>
                            <option value="<?php echo $choice->name; ?>" data-value="<?php echo $choice->term_id; ?>"><?php echo $choice->name; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="input-block">
                        <select name="deal">
                          <option value="Продажа">Продажа</option>
                          <option value="Аренда">Аренда</option>
                        </select>
                      </div>
                      <div class="input-block">
                        <select name="place" id="place-select">                         
                          <option value="kh_region">Херсон</option>                          
                          <option value="region_place">Херсонская обл.</option>                          
                        </select>
                      </div>
                      <div class="input-block hidden-fields">
                        <select name="kh_region">
                          <option value="">Выберите район</option>
                          <?php foreach ($region['choices'] as $key => $choice) : ?>
                            <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <select name="region_place" style="display: none;">
                          <option value="">Выберите направление</option>
                          <?php foreach ($region_place['choices'] as $key => $choice) : ?>
                            <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="input-block" id="rooms_count"><input name="rooms" type="text" placeholder="Количество комнат"></div>
                      <div class="input-block"><input name="square" type="text" placeholder="Площадь"></div>
                      <div class="input-block"><input name="price" type="text" placeholder="Стоимость"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-4"><input type="submit" name="submit" value="Отправить"></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>        
      </div>
<?php get_footer(); ?>    