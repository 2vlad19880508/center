<?php $i = 1; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php 
if ($i % 2 == 0) {
  $block_class = 'white bordered';
} else {
  $block_class = 'gray';
}          
$i++;
?>
<section class="estate-item content-block <?php echo $block_class; ?>">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-3">
      	<?php if(has_post_thumbnail()) : ?>
        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-md'); ?></a>
    	<?php else : ?>
			<img src="<?php echo get_template_directory_uri(); ?>/pic/no-image.png" alt="Фото отсутствует" width="244" height="244">
		<?php endif; ?>
      </div>
      <div class="col-xs-12 col-md-4">
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
      </div>
      <div class="col-xs-12 col-md-3">                
        <div class="excerpt">
          <?php // the_excerpt(); ?>
          <?php the_title(); ?>
        </div>
        <div class="price">Цена <?php echo get_field('price') . ' ' . get_field('currency'); ?></div>
        <a href="<?php the_permalink(); ?>" class="read-more">Подробнее</a>
      </div>
    </div>
  </div>
</section>
<?php endwhile; else: ?>
<section class="content-block gray">
  <div class="container">
    <p class="highlight"><?php _e('По Вашему запросу объявлений не найдено'); ?></p>
  </div>
</section>
<?php endif; ?>
<?php 

$args = array(
	'prev_text'    => 'Назад',
	'next_text'    => 'Далее'
); 
 ?>
<section class="content-block gray"><div class="pagination"><?php echo paginate_links(); ?></div></section>