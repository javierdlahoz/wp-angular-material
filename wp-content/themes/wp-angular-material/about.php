<?php
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;
use INUtils\Helper\TextHelper;
/*
  Template Name: about
*/
require_once __DIR__ . "/helpers/front-page-helper.php";
$pageEntity = new PostEntity(get_the_ID());
$donatePage = PostService::getSingleton()->getPostByPageName("donate");
get_header(); ?>
<div class="container">
    <div class="row">
        <?php echo do_shortcode('[slideshow group="about"]'); ?>
    </div>
</div>
<!--start main content here-->
<?php getAboutNav(); ?>
<!--start main content here-->

<p>&nbsp;</p>
<!--sidebar-->
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="audiences-widget purplish"><!-- resource-type-widget -->
                <h3>Donate</h3>
                <br>
                <p><?php echo TextHelper::cropText($donatePage->getContent()); ?></p>
                <a href="<?php echo $donatePage->getPermalink(); ?>" class="button-widget">Contribute</a>
            </div>

            <div class="heart-quote-box orangish">
                <img class="hearts-icon" src="<?php echo get_template_directory_uri() ;?>/img/heart.png" />
                <h3>Featured Content</h3>
                <br>
                 <ul>
                    <li>Lorem ipsum dolor&nbsp;<span>(23)</span></li>
                    <li>Lorem ipsum dolor&nbsp;<span>(3)</span></li>
                    <li>Lorem ipsum dolor&nbsp;<span>(2)</span></li>
                    <li>Lorem ipsum dolor&nbsp;<span>(22)</span></li>
                    <li>Lorem ipsum dolor&nbsp;<span>(33)</span></li>
                </ul>
            </div>
            <p>&nbsp;</p>
        </div>



    <div class="col-sm-8 about-main">
        <h3>About Us</h3>
        <share-this></share-this>
        <p><?php echo $pageEntity->getContent(); ?></p>

        <p>&nbsp;</p>

    </div>

    </div>
</div>
<p>&nbsp;</p>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/angular/services/ResourceService.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/angular/controllers/ResourceController.js"></script>
<?php get_footer();