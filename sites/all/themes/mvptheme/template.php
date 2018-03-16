<?php

/**
 * @file
 * The primary PHP file for this theme.
 */

function mvptheme_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  $options = !empty($element['#localized_options']) ? $element['#localized_options'] : array();

  // Check plain title if "html" is not set, otherwise, filter for XSS attacks.
  $title = empty($options['html']) ? check_plain($element['#title']) : filter_xss_admin($element['#title']);

  // Ensure "html" is now enabled so l() doesn't double encode. This is now
  // safe to do since both check_plain() and filter_xss_admin() encode HTML
  // entities. See: https://www.drupal.org/node/2854978
  $options['html'] = TRUE;

  $href = $element['#href'];
  $attributes = !empty($element['#attributes']) ? $element['#attributes'] : array();

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="sub-menu">' . drupal_render($element['#below']) . '</ul>';

    }
  }

  return '<li' . drupal_attributes($attributes) . '>' . l($title, $href, $options) . $sub_menu . "</li>\n";
}

function mvptheme_menu_link__menu_menu(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  $options = !empty($element['#localized_options']) ? $element['#localized_options'] : array();

  // Check plain title if "html" is not set, otherwise, filter for XSS attacks.
  $title = empty($options['html']) ? check_plain($element['#title']) : filter_xss_admin($element['#title']);

  // Ensure "html" is now enabled so l() doesn't double encode. This is now
  // safe to do since both check_plain() and filter_xss_admin() encode HTML
  // entities. See: https://www.drupal.org/node/2854978
  $options['html'] = TRUE;

  $href = $element['#href'];
  $attributes = !empty($element['#attributes']) ? $element['#attributes'] : array();

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="sub-menu">' . drupal_render($element['#below']) . '</ul>';

    }
  }

  return '<li' . drupal_attributes($attributes) . '>' . l('<span><img src="/sites/all/themes/mvptheme/images/dna.svg" /></span>' . $title, $href, $options) . $sub_menu . "</li>\n";
}

function mvptheme_preprocess_page(&$vars)
{
$vars['whitebg'] = '';
$vars['region_class'] = '';
if ($vars['is_front'] == true) {
        $vars['title'] = '';
        unset($vars['page']['content']['system_main']['default_message']);

    }
    if (isset($vars['node'])) {
      $type = $vars['node']->type;
      $node = $vars['node'];
      
      switch ($type) {
              case 'product':
                $vars['title'] = $node->field_price['und'][0]['value'] . '<span>VRT</span>';
                $vars['whitebg'] = '<div class="white-background"><div class="inner"></div></div>';
                $vars['region_class'] = ' class="whitebg-margin"';
              break;
              case 'news':
                
                $vars['whitebg'] = '<div class="white-background"><div class="inner"></div></div>';
                $vars['region_class'] = ' class="whitebg-margin"';
              break;
      }
    }
    switch (arg(0)) {
      case 'taxonomy':
        $vars['title'] = '';
        $vars['whitebg'] = '<div class="white-background"><div class="inner"></div></div>';
        $vars['region_class'] = ' class="whitebg-margin"';
        $vars['breadcrumb'] = '';
        break;
      case 'checkout':
        $vars['title'] = '';
        
        $vars['breadcrumb'] = '';
        break;
      case 'cart':
        

        $vars['breadcrumb'] = '';
        break;
    }
}

function mvptheme_preprocess_node(&$vars){
  if ($vars['view_mode'] == 'cool_teaser') {
        $vars['theme_hook_suggestions'][] = 'node__cool_teaser';
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__cool_teaser';
  }
  switch ($vars['type']) {
    case 'study':
      $vars['form_type'] = 'hackaton';
        if ($vars['field_study_category'][0]['tid'] == 8) {
          $vars['form_type'] = 'tender';
        }
      break;
    
    
  }
  
}

function mvptheme_field_widget_field_collection_embed_form_alter(&$element, &$form_state, $context){
  /*dpm($element);
  dpm($context);*/
}

function mvptheme_form_add_product_entityform_edit_form_alter(&$form, &$form_state, $form_id){
  /*dpm($form);*/
}

function mvptheme_form_views_form_commerce_cart_form_default_alter(&$form, &$form_state, $form_id){
    global $user;
    $form['actions']['checkout']['#submit'][] = '_mvptheme_checkout_ordernum_redirect';
    foreach (element_children($form['edit_delete']) as $key) {
      $form['edit_delete'][$key]['#submit'][] = '_mvptheme_cart_remove';
    }
    $form['actions']['submit']['#attributes']['class'][] = 'btn-blue-dark';
    $form['actions']['checkout']['#attributes']['class'][] = 'btn-blue';
    if ($user->uid == 0) {
      $form['actions']['checkout'] = array(
        '#type' => 'markup',
        '#markup' => '<a href="#login-form" class="popup-login btn btn-blue">'.t('Checkout').'</a>'
      );
    }
}

function _mvptheme_cart_remove($form, &$form_state){
  $line_item_id = $form_state['triggering_element']['#line_item_id'];
  $order = $form_state['order'];
  mvp_line_item_delete($order, $line_item_id);
}

function _mvptheme_checkout_ordernum_redirect($form, &$form_state){
    
    $order = $form_state['order'];
    $form_state['redirect'] = 'checkout/'.$order->order_number;

}

function mvptheme_form_user_login_block_alter(&$form, &$form_state, $form_id){
  $form['actions']['submit']['#attributes']['class'][] = 'btn-blue';
}