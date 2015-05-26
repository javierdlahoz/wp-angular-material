<?php

use Director\Entity\DirectorEntity;
/*
  Template Name: staff
*/
require_once __DIR__ . "/helpers/front-page-helper.php";
$director = new DirectorEntity(get_the_ID());
get_header(); ?>

<!--start main content here-->
<?php getAboutNav(); ?>
<!--start main content here-->

<p>&nbsp;</p>
<!--sidebar-->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php getDonateNav(); ?>
            <?php getFeaturedContentNav(); ?>
        </div>
        <div class="col-md-8 about-main">
            <h3><?php echo $director->getTitle(); ?></h3>
            <share-this></share-this>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <?php
                    if($director->getImage() != null){
                        $imageUrl = $director->getImage();
                    }
                    else{
                        $imageUrl = get_template_directory_uri()."/img/avatar.jpg";
                    }
                    ?>
                    <img class="img-responsive" src="<?php echo $imageUrl; ?>" />
                </div>
                <div class="col-md-8">
                    <div class="staff">
                        <h4><?php echo $director->getJobTitle(); ?></h4>
                        <p><?php echo $director->getContent(); ?></p>
                        <p>&nbsp;</p>
                        <div class="social-box2 pull-right">
                            <?php if($director->getEmail() != null): ?>
                                <a id="email1" href="mailto:<?php echo $director->getEmail(); ?>"></a>
                            <?php endif; ?>
                            <?php if($director->getFacebook() != null): ?>
                                <a id="facebook1" href="<?php echo $director->getFacebook(); ?>"></a>
                            <?php endif; ?>
                            <?php if($director->getTwitter() != null): ?>
                                <a id="twitter1" href="<?php echo $director->getTwitter(); ?>"></a>
                            <?php endif; ?>
                            <?php if($director->getLinkedin() != null): ?>
                                <a id="linkedin1" href="<?php echo $director->getLinkedin(); ?>"></a>
                            <?php endif; ?>
                            <?php if($director->getGoogle() != null): ?>
                                <a id="google1" href='<?php echo $director->getGoogle(); ?>'></a>
                            <?php endif; ?>
                            <?php if($director->getPinterest() != null): ?>
                                <a id="pinterest1" href='<?php echo $director->getPinterest(); ?>'></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<p>&nbsp;</p>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#directors").addClass("active");
});
</script>
<?php get_footer();