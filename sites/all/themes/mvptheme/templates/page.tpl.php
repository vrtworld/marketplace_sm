<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<div class="partical-content">
<header id="navbar">
    <div class="<?php print $container_class; ?>">
        <div class="navbar-top row">
            <?php if ($logo): ?>
                <div class="col-sm-3">
                    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                    </a>
                </div>
            <?php endif; ?>

            <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <?php endif; ?>
            <?php if (!empty($primary_nav)): ?>
                <div class="col-sm-5">
                    <div class="navbar-collapse collapse" id="navbar-collapse">
                        <nav role="navigation">
                            <?php print render($primary_nav); ?>
                        </nav>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-sm-4">
            <div class="user-menu pull-right">
                <?php if (!empty($page['navigation'])): ?>
                    <?php print render($page['navigation']); ?>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</header>
<?php if (!empty($page['slider']) || !empty($page['slidernews'])): ?>
    <div id="slider-news">
        <div class="container-fluid">
            <div class="row">
                <?php if (!empty($page['slider'])): ?>
                    <div id="slider" class="col-sm-9">
                        <?php print render($page['slider']); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($page['slidernews'])): ?>
                    <div id="slidernews" class="col-sm-3">
                        <?php print render($page['slidernews']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="main-container <?php print $container_class; ?>">

    <header role="banner" id="page-header">
        <?php if (!empty($site_slogan)): ?>
            <p class="lead"><?php print $site_slogan; ?></p>
        <?php endif; ?>

        <?php print render($page['header']); ?>
    </header> <!-- /#page-header -->

    <div class="row">
        <?php if (!empty($page['sidebar_first'])): ?>
            <aside class="col-sm-3 menu-sidebar" role="complementary">
                <?php print render($page['sidebar_first']); ?>
            </aside>  <!-- /#sidebar-first -->
        <?php endif; ?>

        <section<?php print $content_column_class; ?>>
            <?php if (!empty($page['highlighted'])): ?>
                <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
           
            <a id="main-content"></a>
            <?php print render($title_prefix); ?>
            <?php if (!empty($title)): ?>
                <h1 class="page-header"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
             <?php if (!empty($breadcrumb)): print $breadcrumb; endif; ?>
            <?php print $messages; ?>
            <?php if (!empty($tabs)): ?>
                <?php print render($tabs); ?>
            <?php endif; ?>
            <?php if (!empty($page['help'])): ?>
                <?php print render($page['help']); ?>
            <?php endif; ?>
            <?php if (!empty($action_links)): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            <div <?php print $region_class; ?>>
                <?php print render($page['content']); ?>
                <?php print $whitebg; ?>
            </div>
            
        </section>

        <?php if (!empty($page['sidebar_second'])): ?>
            <aside class="col-sm-3" role="complementary">
                <?php print render($page['sidebar_second']); ?>
            </aside>  <!-- /#sidebar-second -->
        <?php endif; ?>

    </div>
</div>

<div class="<?php print $container_class; ?>">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
            <footer class="footer">
                <div class="right">
                    <a href="https://vrt.world" target="_blank" class="btn btn-blue"><?php print t('To VRT WORLD');?></a>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                        </a>
                    <div class="socials">
                        <?php if (!empty(variable_get('mvp_facebook'))): ?>
                            <a href="<?php print variable_get('mvp_facebook');?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php endif ?>
                        <?php if (!empty(variable_get('mvp_vk'))): ?>
                            <a href="<?php print variable_get('mvp_vk');?>" target="_blank"><i class="fab fa-vk"></i></a>
                        <?php endif ?>
                        <?php if (!empty(variable_get('mvp_twitter'))): ?>
                            <a href="<?php print variable_get('mvp_twitter');?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php endif ?>
                        <?php if (!empty(variable_get('mvp_youtube'))): ?>
                            <a href="<?php print variable_get('mvp_youtube');?>" target="_blank"><i class="fab fa-youtube"></i></a>
                        <?php endif ?>
                        <?php if (!empty(variable_get('mvp_telegram'))): ?>
                            <a href="<?php print variable_get('mvp_telegram');?>" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                        <?php endif ?>
                        <?php if (!empty(variable_get('mvp_btt'))): ?>
                            <a href="<?php print variable_get('mvp_btt');?>" target="_blank"><i class="fab fa-btc"></i></a>
                        <?php endif ?>
                    </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="bottom-menu">
                             <?php
                              $menu = menu_tree('main-menu');
                              echo render($menu);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="coop text-center">
                    <?php print t('Copyright © VRT World'); ?>
                </div>
            </footer>
        </div>
    </div>
    
</div>
</div>
<div id="login-form" class="mfp-hide">
    <?php
                  $block = block_load('user', 'login');
                  $block = _block_render_blocks(array($block));
                  $block_build = _block_get_renderable_array($block);
                  echo drupal_render($block_build);
                   ?>
</div>
<div id="particles-js"></div>