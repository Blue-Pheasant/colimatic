<?php
/*
Template Name: Package solutions Template
*/
get_header();
?>

<?php
global $post;
$page_slug = $post->post_name;
$page_title = '';

switch ($page_slug) {
   case 'colimatic':
      $page_title = 'Colimatic';
      break;
   case 'lee-pack':
      $page_title = 'Leepack';
      break;
   case 'italian-pack':
      $page_title = 'Italian Pack';
      break;
   case 'processing-machine':
      $page_title = 'Processing Machine';
      break;
   case 'inspection':
      $page_title = 'Inspection';
      break;
   default:
      $page_title = 'packaging-solutions';
      break;
}
?>
<div class="page-hero">
   <div class="inside-page-hero">
      <div class="inside-page-hero__box">
         <h1><?=$page_title?></h1>
      </div>
   </div>
</div>

<div id="page" class="site grid-container container hfeed grid-parent">
   <div id="content" class="site-content">
      <div id="primary" class="content-area grid-parent mobile-grid-100 grid-100 tablet-grid-100">
         <main id="main" class="site-main">
            <div class="inside-article">
               <div class="entry-content space--top-0" itemprop="text">
                  <div class="typologies">
                     <div class="grid-list">
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('olympus')); ?>">
                              <figure>
                                 <img data-src="<?php echo get_template_directory_uri().'/public/olympus/images/olympus.png'; ?>" class=" ls-is-cached lazyloaded" src="<?php echo get_template_directory_uri().'/public/olympus/images/olympus.png'; ?>">
                                 <noscript><img src="<?php echo get_template_directory_uri().'/public/olympus/images/olympus.png'; ?>"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Italian pack</h3>
                           </a>
                        </div>
                        <!-- <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('thera-650')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/05/soluzioni-di-confezionamento-colimatic.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/05/soluzioni-di-confezionamento-colimatic.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/05/soluzioni-di-confezionamento-colimatic.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Thermoforming machines</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('tdf-1650-1900')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/10/TDF1900_02.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/10/TDF1900_02.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/10/TDF1900_02.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Tray Sealers</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('skin-en')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/01/skin-frontale-anteprima.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/01/skin-frontale-anteprima.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/01/skin-frontale-anteprima.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Skin</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('cook-in')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/01/cook-in-anteprima.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/01/cook-in-anteprima.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/01/cook-in-anteprima.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Cook-In</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('omega-800')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/01/sistemi-sottovuoto-automatici-anteprima.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/01/sistemi-sottovuoto-automatici-anteprima.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/01/sistemi-sottovuoto-automatici-anteprima.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Vacuum Machines</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('surgical-set')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/05/automation-linee-medicali.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/05/automation-linee-medicali.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/05/automation-linee-medicali.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Medical Line Automation</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('thermoforming-suture')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/01/Thera-650-suture-e1556108030934.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/01/Thera-650-suture-e1556108030934.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/01/Thera-650-suture-e1556108030934.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Sutures Packaging</h3>
                           </a>
                        </div>
                        <div class="grid-list__item">
                           <a href="<?php echo get_permalink(get_page_by_path('ready-meals-lasagna')); ?>">
                              <figure>
                                 <img data-src="https://www.colimatic.com/wp-content/uploads/2019/05/linee-complete.png" class=" ls-is-cached lazyloaded" src="https://www.colimatic.com/wp-content/uploads/2019/05/linee-complete.png">
                                 <noscript><img src="https://www.colimatic.com/wp-content/uploads/2019/05/linee-complete.png"></noscript>
                              </figure>
                              <div class="arrow-up"></div>
                              <h3>Food Line Automation</h3>
                           </a>
                        </div> -->
                     </div>
                  </div>
               </div>
               <!-- .entry-content -->
            </div>
            <!-- .inside-article -->
         </main>
         <!-- #main -->
      </div>
      <!-- #primary -->
   </div>
</div>

<?php get_footer(); ?>