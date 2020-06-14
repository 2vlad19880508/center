<?php get_header(); ?>
      <div id="content">
        <section class="estate-header content-block gray">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
              <?php if ( have_posts() ) :  ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="breadcrumbs"><a href="/">Херсон-центр</a> / <a href="<?php echo get_term_link( wp_get_post_terms( $post->ID, 'estate_category')[0]->term_id, 'estate_category' ); ?>" ><?php echo wp_get_post_terms( $post->ID, 'estate_category')[0]->name; ?></a> / <?php the_title(); ?></div>
                <div class="row">
                  <div class="col-xs-12">
                    <h3 class="page-title"><?php echo get_the_title() . ' ' . get_field('price') . ' ' . get_field('currency');  ?></h3>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="content-block gray">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">  
                <div class="row">
                  <div class="col-xs-12 col-md-4">
                    <div class="main-thumbnail">
                      <?php if(has_post_thumbnail()) : ?>
                        <a href="<?php the_post_thumbnail_url('full'); ?>" data-lightbox="thumbnail"><?php the_post_thumbnail('thumbnail-md'); ?></a>
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/pic/no-image.png" alt="Фото отсутствует" width="244" height="244">
                      <?php endif; ?>
                     </div>
                    <?php $galleryArray = get_post_gallery_ids($post->ID); ?>
                    <?php if (!empty($galleryArray)) : ?>
                      <div class="featured-img">
                        <?php foreach ($galleryArray as $id) : ?>                          
                            <a href="<?php echo image_downsize( $id, 'full')[0]; ?>" data-lightbox="thumbnail"><img src="<?php echo image_downsize( $id, 'thumbnail-sm')[0]; ?>"></a>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="col-xs-12 col-md-8">
                    <table class="estate-info">
                      <tbody>
                        <?php 
                          if (get_post_meta($post->ID, 'views', true)) {  
                            $views = get_post_meta($post->ID, 'views', true);  
                          } else { 
                            $views = '0';  
                          } 
                        ?>
                        <tr>
                          <td>Просмотров:</td>
                          <td><strong><?php echo $views; ?></strong></td>
                        </tr>                        
                        <?php if (get_field('place') == 'kherson') : ?>
                        <tr>
                          <td>Город</td>
                          <td>Херсон</td>
                        </tr>
                        <tr>
                          <td>Район</td>
                          <td><?php echo get_field_object('kh_region')['choices'][get_field('kh_region')]; ?></td>
                        </tr>
                        <?php if (!empty(get_field('kh_street'))) : ?>
                        <tr>
                          <td>Улица</td>
                          <td><?php the_field('kh_street'); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php elseif (get_field('place') == 'region') : ?>
                        <tr>
                          <td>Направление области</td>
                          <td><?php echo get_field_object('region_place')['choices'][get_field('region_place')]; ?></td>
                        </tr>
                        <tr>
                          <td>Населённый пункт</td>
                          <td><?php the_field('locality'); ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                          <td>Тип сделки</td>
                          <td><?php echo get_field_object('deal')['choices'][get_field('deal')]; ?></td>
                        </tr>
                        <?php if (get_field('estate-type') != 7 && get_field('estate-type') != 3 && get_field('estate-type') != 6) : ?>
                        <tr>
                          <td>Количество комнат</td>
                          <td><?php the_field('room_count'); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('estate-type') != 6) : ?>
                    <?php if (!empty(get_field('floor'))) : ?>
                          <tr>
                            <td>Этаж</td>
                            <td><?php the_field('floor'); ?></td>
                          </tr>
                    <?php endif; ?>
                          <?php if (!empty(get_field('floor_count'))) : ?>
                          <tr>
                            <td>Этажность</td>
                            <td><?php the_field('floor_count'); ?></td>
                          </tr>
                    <?php endif; ?>
                        <?php endif; ?>
                        <?php if (!empty(get_field('square'))) : ?>
                        <tr>
                          <td>Площадь</td>
                          <td><?php the_field('square'); ?> м&sup2;</td>
                        </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                    <div class="content">
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="content-block white bordered">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-md-10 col-md-offset-1">
                <p></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="row">
                  <div class="col-xs-12 col-sm-5">
                    <h3 class="blue-text">Оставьте заявку</h3>
                  </div>
                  <div class="col-xs-12 col-sm-7">
                    <?php echo do_shortcode('[contact-form-7 id="37" title="contact-form-1" estate-title="' . get_the_title() . '" estate-link="' . get_permalink() . '"]'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php endwhile; ?>                
        <?php endif; ?>                
      </div>


<?php get_footer(); 