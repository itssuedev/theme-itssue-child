<?php
/**
 * front-page.php - 사이트의 랜딩 페이지를 담당하는 템플릿
 *
 * @package theme-itssue-child
 */
get_header();
?>
<div class="header_media">
  <!-- 헤더 미디어 영역 -->
  <?php the_custom_header_markup(); ?>
  <!-- /헤더 미디어 영역 -->
</div><!-- .header_media -->

<div class="site-branding">
  <h1 class="site-title">
    <a href="<?php bloginfo( 'url' ); ?>" title="HOME">
      <?php bloginfo( 'name' ); ?>
    </a>
  </h1>
  <p class="site-description">
    <?php bloginfo( 'description' ); ?>
  </p>
</div>

<div class="blocks">
  <?php $i = 1; for( ; 3 >= $i; $i++ ) : ?>
    <div id="front-block-<?php echo $i; ?>" class="one-third">
      <?php echo it_front_block( $i ); ?>
    </div>
  <?php endfor; ?>
</div>

<div class="blocks">
  <div class="two-third">
  <?php for( ; 7>= $i; $i++ ) : ?>
    <div id="front-block-<?php echo $i; ?>" class="one-second">
      <?php echo it_front_block( $i ); ?>
    </div>
  <?php endfor; ?>
  </div>
  <div class="one-third block-fbw">
    <?php
    echo do_shortcode( get_theme_mod( 'it_customize_front_sns' ) );
    ?>
  </div>
</div>
<?php
get_footer();