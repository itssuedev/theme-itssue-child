<?php
/**
 * functions.php - 기능 구현을 담당하는 파일 입니다.
 *
 * @package theme-itssue-child
 */

$args = array(
  'height' => 648,
  'wp-head-callback' => null,
  'video' => true,
);
add_theme_support( 'custom-header', $args );

function it_adj_theme_customize( $wp_customize ) {
  $desc = '
  아래 레이아웃을 참조하여 각 항목을 설정하세요.<br />
  <table class="it-customize-table">
    <tr>
      <td colspan="3" class="center">헤더 미디어 영역</td>
    </tr>
    <tr>
      <td>영역1</td>
      <td>영역2</td>
      <td>영역3</td>
    </tr>
    <tr>
      <td>영역4</td>
      <td>영역5</td>
      <td rowspan="2">SNS</td>
    </tr>
    <tr>
      <td>영역6</td>
      <td>영역7</td>
    </tr>
  </table>
  ';
  $wp_customize->get_section( 'it_customize_front_page' )->description
    = $desc;

  $wp_customize->remove_control( 'header_contact_show' );
  $wp_customize->remove_control( 'header_contact' );
  $wp_customize->remove_control( 'header_extra_logo' );
  $wp_customize->remove_control( 'it_customize_front_slider' );

  $wp_customize->get_control( 'header_video' )->priority = 5;
  $wp_customize->get_control( 'header_video' )->section
    = 'it_customize_front_page';
  $wp_customize->get_control( 'external_header_video' )->priority = 6;
  $wp_customize->get_control( 'external_header_video' )->section
    = 'it_customize_front_page';
  $wp_customize->get_control( 'header_image' )->priority = 7;
  $wp_customize->get_control( 'header_image' )->section
    = 'it_customize_front_page';
}
add_action( 'customize_register', 'it_adj_theme_customize', 20, 1 );

function it_enqueue_child_scripts() {
  wp_enqueue_style( 'style-child-css',
    get_stylesheet_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'it_enqueue_child_scripts' );

function it_adj_print_header() {
  remove_action( 'it_print_header', 'it_print_header' );

  the_custom_logo();
}
add_action( 'it_print_header', 'it_adj_print_header', 5 );
