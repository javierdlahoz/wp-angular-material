<?php

use Client\Helper\ClientHelper;
use Client\Entity\ClientTypeEntity;
use Client\Service\ClientService;
use INUtils\Helper\PictureHelper;

require_once __DIR__ . "/helpers/front-page-helper.php";
$clientTypeEntity = new ClientTypeEntity(get_queried_object()->term_id, ClientHelper::CLIENT_TAXONOMY_NAME);
$clients = ClientService::getSingleton()->getClientsByTermId($clientTypeEntity->getTermId());

get_header(); ?>

<!--start main content here-->
<?php getAboutNav(); ?>
<!--start main content here-->

<p>&nbsp;</p>
<!--sidebar-->
<div class="container">
    <div class="row">
        <div class="col-md-12 about-main">
            <h3><?php echo $clientTypeEntity->getName(); ?></h3>
            <share-this></share-this>

            <p><?php echo $clientTypeEntity->getDescription(); ?></p>
            <p>InSites has helped foundations, nonprofits, schools, colleges, universities, and other organizations strengthen their programs, policies, and practices to achieve greater results. Some InSites clients are;</p>
        </div>
    </div>
</div>
    <div class="container">
        <div class="about-logo-box">
            <div class="row">
                <?php foreach($clients as $client): ?>
                 <div class="col-md-2">
                    <a href="<?php echo $client->getUrl(); ?>">
                        <img src="<?php echo PictureHelper::getThumbnail($client->getImage()); ?>" />
                    </a>
                 </div>
                 <?php endforeach; ?>
            </div>
        </div>
    </div>
<p>&nbsp;</p>
<div class="container-fluid home-logo-box">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Nulla quis sem at nibh elementum imperdiet. -Duis sagittis ipsum</h4>
             </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#clients").addClass("active");
});
</script>
<?php get_footer();