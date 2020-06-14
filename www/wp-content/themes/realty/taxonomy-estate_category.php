<?php 
  $queried_object = get_queried_object();
  $term_id = $queried_object->term_id;
  if ($term_id == 10 || $term_id == 11) :
    $page_title = 'Все дома, дачи, участки';
    $tags = array(array('Дома','?estate-type=4'),array('Дачи','?estate-type=5'),array('Участки','?estate-type=6')); 
  elseif ($term_id == 9 || $term_id == 8) :
    $page_title = 'Все квартиры';
	$tags = array(array('Комнаты','?estate-type=3'),array('Однокомнатные','?room_count=1'),array('Двухкомнатные','?room_count=2'),array('Трёхкомнатные','?room_count=3'),array('Четырёхкомнатные','?room_count=4')); 
  elseif ($term_id == 12 || $term_id == 13) :
    $page_title = 'Вся коммерческая нежвижимость';
	  $tags = array(array('до 50 м&sup2;','?square_max=49'),array('50 - 100 м&sup2;','?square_min=50&square_max=100'),array('больше 100 м&sup2;','?square_min=101'));
  else :
    $page_title = 'Вся недвижимость';
	  $tags = '';
  endif;
  if(!empty($_GET['sort'])) :
    $sort = $_GET['sort'];
  else :
    $sort = '';
  endif;
?>
<?php get_header(); ?>
      <div id="content">
        <section class="estate-header content-block gray">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="breadcrumbs"><a href="/">Херсон-центр</a> /  <?php single_term_title(); ?></div>
				<?php if (!empty($tags)) : ?>
                <div class="row">
                	<div class="col-xs-12">
                		<div class="tags">
                			<?php foreach ($tags as $tag) : ?>
							          <a href="<?php echo $tag[1]; ?>"><?php echo $tag[0]; ?></a>
                			<?php endforeach; ?>
                		</div>
                	</div>
                </div>
				<?php endif; ?>
                <div class="row">
                  <div class="col-xs-6">
                    <h3 class="page-title"><?php echo $page_title; ?></h3>
                  </div>
                  <div class="col-xs-6 text-right orderby">Сортировка: <a class="<?php if($sort=='new' || $sort == ''){echo "active";} ?>" href="?sort=new">Самые новые</a> <a class="<?php if($sort=='price_asc'){echo "active";} ?>" href="?sort=price_asc">Самые дешевые</a> <a class="<?php if($sort=='price_desc'){echo "active";} ?>" href="?sort=price_desc">Самые дорогие</a></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php get_template_part('loop'); ?>
      </div>
<?php get_footer(); ?>