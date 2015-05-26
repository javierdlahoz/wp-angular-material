<?php
use INUtils\Helper\TextHelper;
use Resource\Service\ResourceService;
/*
  Template Name: single-resource
*/
require_once __DIR__ . "/helpers/front-page-helper.php";
$resourceEntity = ResourceService::getSingleton()->findResourceById(get_the_ID());
get_header(); ?>
<div class="container-fluid greyish">
    <div class="container">
        <div class="row">
            <form action="/resources" method="post" class="form-inline resources-form" id="search_form" role="form">
                <div class="col-sm-10">
                    <input id="expression" type="text" name="query" class="form-control" placeholder="Search Resources" />
                </div>
                <div class="col-sm-2 col-xs-4 pull-left">
                    <input type="submit"
                    class="resource-sub-btn purplish" placeholder="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<!--sidebar-->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="audiences-widget purplish"><!-- resource-type-widget -->
                <h3>Resource type</h3>
                    <!-- p><b>System Thinking in Evatuation</b>&nbsp;<span>(70)</span></p -->
                    <ul>
                    <?php foreach($resourceEntity->getType()->getOptions() as $type): ?>
                        <li>
                            <?php echo $type; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
            </div>
            <div class="audiences-widget orangish">
                <h3>Areas of Focus</h3>
                <ul>
                    <?php foreach($resourceEntity->getAreasOfFocus()->getOptions() as $areaOfFocus): ?>
                        <li>
                            <?php echo $areaOfFocus; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="audiences-widget purplish">
                <h3>Stakeholders</h3>
                <ul>
                    <?php foreach($resourceEntity->getStakeholders()->getOptions() as $stakeholder): ?>
                        <li>
                            <?php echo $stakeholder; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="audiences-widget orangish">
                <h3>Related Resources</h3>
                <ul>
                    <?php foreach(ResourceService::getSingleton()->getRelatedResources($resourceEntity->getId()) as $resource): ?>
                        <li>
                            <a href="<?php echo $resource->getPostEntity()->getPermalink(); ?>">
                                <b><?php echo $resource->getTitle(); ?></b>
                            </a>
                            <p><?php echo TextHelper::cropText($resource->getDescription(), 100); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <p>&nbsp;</p>
        </div>

        <!--main content-->

        <div class="col-md-8 resource-main">
            <h3><?php echo $resourceEntity->getTitle(); ?></h3>
            <share-this></share-this>
            <br><br>
                <p class="tags">
                    <span>By:</span> <?php echo $resourceEntity->getAuthors()->toString(); ?> &nbsp;<br>
                    <span>Tags: </span><?php echo $resourceEntity->getPostEntity()->getTagsAsString(); ?>
                </p>
                <p><?php echo $resourceEntity->getDescription(); ?></p>
            <p>&nbsp;</p>
            <div class="videowrapper">
                <iframe width="100%" src="<?php echo TextHelper::getEmbedVideoUrl($resourceEntity->getVideo()); ?>"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <?php if($resourceEntity->getFileUrl() != null): ?>
            <a class="download-file" href="<?php echo $resourceEntity->getFileUrl(); ?>">
                <img src="<?php echo get_template_directory_uri() ;?>/img/download.png" />
                &nbsp;Download File (<?php echo $resourceEntity->getFileSize(); ?>)
            </a>
            <p>&nbsp;</p>
            <?php endif; ?>

            <?php if($resourceEntity->getUrl() != null): ?>
            <a class="download-file" href="<?php echo $resourceEntity->getUrl(); ?>">
                <img src="<?php echo get_template_directory_uri() ;?>/img/download.png" />
                &nbsp;Go to URL
            </a>
            <p>&nbsp;</p>
            <?php endif; ?>

            <?php if($resourceEntity->getResourceFormat() == "word"): ?>
            <a href="">
                <img src="<?php echo get_template_directory_uri() ;?>/img/doc-icon.png" />
            </a>
            <?php elseif($resourceEntity->getResourceFormat() == "pdf"): ?>
            <a href="">
                <img src="<?php echo get_template_directory_uri() ;?>/img/pdf-icon.png" />
            </a>
            <?php elseif($resourceEntity->getResourceFormat() == "web_site"): ?>
            <a href="">
                <img src="<?php echo get_template_directory_uri() ;?>/img/mail-icon.png" />
            </a>
            <?php elseif($resourceEntity->getResourceFormat() == "video"): ?>
            <a href="">
                <img src="<?php echo get_template_directory_uri() ;?>/img/video-icon.png" />
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<br>
<p>&nbsp;</p>
<?php get_footer();