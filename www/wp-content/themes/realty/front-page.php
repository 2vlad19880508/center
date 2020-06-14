<?php get_header(); ?>
      <div id="content">
        <section class="content-block gray intro">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 intro-text">
                <h2>Добро пожаловать<br>на сайт агентства недвижимости <span>«Херсон-Центр»</span></h2>
                <p>Вы собираетесь продать, купить, арендовать, сдать в аренду, обменять<br> жилое  или коммерческое помещение? Ищете базу недвижимости Херсона<br> или агентство,  которое поможет сориентироваться на рынке?</p>
                <p class="no-margin">Мы рады Вам помочь!<br>
                Большинство сделок мы заключаем с клиентами,  которым<br>
                нас порекомендовали их знакомые, друзья или родственники.</p>
                <p class="highlight">Нам  доверяют!</p>
              </div>
            </div>
            <?php 
              $kh_region = get_field_object('field_586380b948faf'); 
              $region_place = get_field_object('field_586f7b8f03c81'); 
            ?>            
            <div class="products row">
              <div class="col-xs-12 col-sm-4 product">
                <h4>Квартиры,<br>комнаты</h4>
                <img src="<?php echo get_template_directory_uri(); ?>/pic/apartments.png" alt="">
                <a href="<?php echo get_term_link( 'buy-flat', 'estate_category' ); ?>" class="button">Продажа</a>
                <a href="<?php echo get_term_link( 'rent-flat', 'estate_category' ); ?>" class="button">Аренда</a>
              </div>
              <div class="col-xs-12 col-sm-4 product">
                <h4>Дома, дачи,<br>участки</h4>
                <img src="<?php echo get_template_directory_uri(); ?>/pic/houses.png" alt="">
                <a href="<?php echo get_term_link( 'buy-house', 'estate_category' ); ?>" class="button">Продажа</a>
                <a href="<?php echo get_term_link( 'rent-house', 'estate_category' ); ?>" class="button">Аренда</a>
              </div>
              <div class="col-xs-12 col-sm-4 product">
                <h4>Коммерческая<br>недвижимость</h4>
                <img src="<?php echo get_template_directory_uri(); ?>/pic/commerce.png" alt="">
                <a href="<?php echo get_term_link( 'buy-commerce', 'estate_category' ); ?>" class="button">Продажа</a>
                <a href="<?php echo get_term_link( 'rent-commerce', 'estate_category' ); ?>" class="button">Аренда</a>
              </div>
            </div>
          </div>
        </section>
        <section class="content-block white bordered search" id="main-filter">
          <form action="/estate" method="get">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <h3>Поиск объявлений</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                  <div class="row type-select">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                      <div class="radio-block"><input name="estate-type" value="2" type="radio" id="appt-type-1" checked="checked"><label for="appt-type-1">Квартира</label></div>
                      <div class="radio-block"><input name="estate-type" value="4" type="radio" id="appt-type-2"><label for="appt-type-2">Дом</label></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                      <div class="radio-block"><input name="estate-type" value="3" type="radio" id="appt-type-3"><label for="appt-type-3">Комната</label></div>
                      <div class="radio-block"><input name="estate-type" value="5" type="radio" id="appt-type-4"><label for="appt-type-4">Дача</label></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                      <div class="radio-block"><input name="estate-type" value="7" type="radio" id="appt-type-5"><label for="appt-type-5">Коммерческая недвижимость</label></div>
                      <div class="radio-block"><input name="estate-type" value="6" type="radio" id="appt-type-6"><label for="appt-type-6">Участок</label></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                      <div class="input-block">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="radio-block"><input name="deal" value="sell" type="radio" id="sell" checked="checked"><label for="sell">Продажа</label></div>
                          </div>
                          <div class="col-xs-6">
                            <div class="radio-block"><input name="deal" value="rent" type="radio" id="rent"><label for="rent">Аренда</label></div>
                          </div>
                        </div>
                      </div>
                      <div class="input-block place-select">                       
                        <div class="radio-block"><input name="place-select" value="kh_region" type="radio" id="kh_region" checked="checked"><label for="kh_region">По районам Херсона</label></div>
                        <div class="radio-block"><input name="place-select" value="kh_street" type="radio" id="kh_street"><label for="kh_street">По улицам Херсона</label></div>
                        <div class="radio-block"><input name="place-select" value="region_place" type="radio" id="region_place"><label for="region_place">По направлениям области</label></div>
                      </div>
                      <div class="input-block hidden-fields">
                        <select name="kh_region">
                            <option value="" selected="selected">Любой район</option>
                          <?php foreach ($kh_region['choices'] as $key => $choice) : ?>
                            <option value="<?php echo $key; ?>"><?php echo $choice; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <select name="region_place" style="display: none;">
                            <option value="" selected="selected">Любое направление</option>
                          <?php foreach ($region_place['choices'] as $key => $choice) : ?>
                            <option value="<?php echo $key; ?>"><?php echo $choice; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <input type="text" name="kh_street" placeholder="Введите название улицы" style="display: none;">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="input-block"><input type="text" name="price_min" placeholder="Стоимость от"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="input-block"><input type="text" name="price_max" placeholder="Стоимость до"></div>
                        </div>
                      </div>
                      <div class="row" id="rooms_count">
                        <div class="col-xs-12 col-sm-6">
                          <div class="input-block"><input type="text" name="rooms_min" placeholder="Комнат от"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="input-block"><input type="text" name="rooms_max" placeholder="Комнат до"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="input-block"><input type="text" name="square_min" placeholder="Площадь от (м&sup2;)"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="input-block"><input type="text" name="square_max" placeholder="Площадь до (м&sup2;)"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4"><button type="submit">Найти объявления</button></div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
        <section class="content-block gray special">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h3><a href="<?php echo get_term_link( 'special', 'estate_category' ); ?>">Специальные предложения</a></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/pic/photo.jpg" alt="">
              </div>
              <div class="col-xs-12 col-md-6">
                <p>Разница в престижности,  добротности,  качестве и стоимости между элитной недвижимостью  и бюджетной  велика.</p>
                <p>Есть отдельные пожелания клиентов, относящиеся скорее к эксклюзивным и специальным, чем к стандартным.</p>
                <p>Этот раздел для таких объектов.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="highlight">Наше агентство работает на благо клиента –<br>мы отстаиваем Ваши  интересы</div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php get_footer(); ?>