<?php

use Staff\Entity\StaffEntity;
/*
  Template Name: staff
*/
require_once __DIR__ . "/helpers/front-page-helper.php";
$staffMember = new StaffEntity(get_the_ID());
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
            <h3><?php echo $staffMember->getTitle(); ?></h3>
            <share-this></share-this>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <?php
                    if($staffMember->getImage() != null){
                        $imageUrl = $staffMember->getImage();
                    }
                    else{
                        $imageUrl = get_template_directory_uri()."/img/avatar.jpg";
                    }
                    ?>
                    <img class="img-responsive" src="<?php echo $imageUrl; ?>" />
                </div>
                <div class="col-md-8">
                    <div class="staff">
                        <h4><?php echo $staffMember->getJobTitle(); ?></h4>
                        <p><?php echo $staffMember->getContent(); ?></p>
                        <p>&nbsp;</p>
                        <div class="social-box2 pull-right">
                            <?php if($staffMember->getEmail() != null): ?>
                                <a id="email1" href="mailto:<?php echo $staffMember->getEmail(); ?>"></a>
                            <?php endif; ?>
                            <?php if($staffMember->getFacebook() != null): ?>
                                <a id="facebook1" href="<?php echo $staffMember->getFacebook(); ?>"></a>
                            <?php endif; ?>
                            <?php if($staffMember->getTwitter() != null): ?>
                                <a id="twitter1" href="<?php echo $staffMember->getTwitter(); ?>"></a>
                            <?php endif; ?>
                            <?php if($staffMember->getLinkedin() != null): ?>
                                <a id="linkedin1" href="<?php echo $staffMember->getLinkedin(); ?>"></a>
                            <?php endif; ?>
                            <?php if($staffMember->getGoogle() != null): ?>
                                <a id="google1" href='<?php echo $staffMember->getGoogle(); ?>'></a>
                            <?php endif; ?>
                            <?php if($staffMember->getPinterest() != null): ?>
                                <a id="pinterest1" href='<?php echo $staffMember->getPinterest(); ?>'></a>
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
	jQuery("#consultants").addClass("active");
});
</script>
<?php get_footer();