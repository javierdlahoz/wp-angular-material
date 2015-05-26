<?php
use INUtils\Helper\TextHelper;
use INUtils\Entity\PostEntity;
/*
  Template Name: resources
*/
require_once __DIR__ . "/helpers/front-page-helper.php";
$pageEntity = new PostEntity(get_the_ID());
get_header(); ?>
<div ng-controller="ResourceController" ng-init="searchResources()">
    <div class="container">
        <div class="row">
            <?php echo do_shortcode('[slideshow group="resources"]'); ?>
        </div>
    </div>

    <resources-nav></resources-nav>

    <!--start main content here-->
    <div class="container-fluid greyish">
        <div class="container">
            <div class="row">
                <form action="" method="post" class="form-inline resources-form" id="search_form" role="form" onsubmit="return false;">
                    <div class="col-sm-5">
                        <input id="query" type="hidden" value="<?php
                            if(isset($_POST['query'])):
                                echo $_POST['query'];
                            else:
                                echo "";
                            endif;
                            ?>"/>
                        <input id="area-of-focus" type="hidden" value="<?php
                            if(isset($_POST['areasOfFocus'])):
                                echo $_POST['areasOfFocus'];
                            else:
                                echo "*";
                            endif;
                        ?>"/>
                        <input id="expression" type="text" ng-model="query" class="form-control" placeholder="Search Resources" />
                    </div>
                    <div class="col-sm-2 col-xs-4 pull-left">
                       <!--span class="search-titles hidden-sm">SORT BY:</span-->
                       <a ng-click="setOrderBy('title'); searchResources();" class="resource-sort">TITLE A-Z</a>
                    </div>
                    <div class="col-sm-2 col-xs-4 pull-left">
                       <a ng-click="setOrderBy('date'); searchResources();" class="resource-sort">DATE CREATED</a>
                    </div>
                    <div class="col-sm-2 col-xs-4 pull-left">
                        <input ng-click="searchResources();" type="submit"
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
            <div class="col-sm-4">
                <div class="audiences-widget purplish"><!-- resource-type-widget -->
                    <h3>Resource type</h3>
                        <!-- p><b>System Thinking in Evatuation</b>&nbsp;<span>(70)</span></p -->
                        <ul>
                            <li ng-repeat="(resourceTypeKey, facetCount) in resources.facets.resource_type_facets"
                                ng-click="setResourceType(resourceTypeKey); searchResources()" style="cursor: pointer"
                                ng-show="facetCount > 0" ng-class="{bold: resourceTypeKey == resourceType}">
                                {{resourceTypeKey}}&nbsp;<span>({{facetCount}})</span>
                            </li>
                        </ul>
                        <br>
                        <span ng-click="setResourceType('*'); searchResources()"
                            style="cursor: pointer" ng-show="resourceType != '*' && resourceType != ''">
                            clear
                        </span>
                </div>
                <div class="audiences-widget orangish">
                    <h3>Areas of Focus</h3>
                    <br>
                    <ul>
                        <li ng-repeat="(areaOfFocusKey, facetCount) in resources.facets.areas_of_focus"
                            ng-click="setAreasOfFocus(areaOfFocusKey); searchResources()" style="cursor: pointer"
                            ng-show="facetCount > 0" ng-class="{bold: areaOfFocusKey == areasOfFocus}">
                            {{areaOfFocusKey}}&nbsp;<span>({{facetCount}})</span>
                        </li>
                    </ul>
                    <span ng-click="setAreasOfFocus('*'); searchResources()"
                        style="cursor: pointer" ng-show="areasOfFocus != '*' && areasOfFocus != ''">
                        clear
                    </span>
                </div>
                <div class="audiences-widget purplish">
                    <h3>Stakeholders</h3>
                    <br>
                    <ul>
                        <li ng-repeat="(stakeholderKey, facetCount) in resources.facets.stakeholders"
                            ng-click="setStakeholders(stakeholderKey); searchResources()" style="cursor: pointer"
                            ng-show="facetCount > 0" ng-class="{bold: stakeholderKey == stakeholders}">
                            {{stakeholderKey}}&nbsp;<span>({{facetCount}})</span>
                        </li>
                    </ul>
                    <span ng-click="setStakeholders('*'); searchResources()"
                        style="cursor: pointer" ng-show="stakeholders != '*' && stakeholders != ''">
                        clear
                    </span>
                </div>
                <p>&nbsp;</p>
                <div class="heart-quote-box blueish">
                    <img class="hearts-icon" src="<?php echo get_template_directory_uri() ;?>/img/heart.png" />
                    <p><?php echo TextHelper::cropText($pageEntity->getContent()) ;?></p>
                </div>
                <p>&nbsp;</p>
            </div>

            <!--main content-->

            <div class="col-sm-8 resource-main">
                <h3>Resources Found: {{resources.count}}</h3>

                <share-this></share-this>

                <br><br>
                <div ng-repeat="resource in resources.resources">
                    <div class="col-md-6" ng-class-odd="left-pad-gone">
                        <div class="resource-info-blocks">
                            <h5>{{resource.title}}</h5>
                            <p class="tags">
                                <span>By:</span> {{resource.authors}} &nbsp;<br>
                                <span>Tags:</span> {{resource.tags}}
                            </p>
                            <p class="resources-box-text">{{resource.limitedDescription}}</p>
                            <a class="button-orng" href="{{resource.permalink}}">View Resource</a>
                            <a ng-if="resource.format == 'word'" href="">
                                <img src="<?php echo get_template_directory_uri() ;?>/img/doc-icon.png" />
                            </a>
                            <a ng-if="resource.format == 'pdf'" href="">
                                <img src="<?php echo get_template_directory_uri() ;?>/img/pdf-icon.png" />
                            </a>
                            <a ng-if="resource.format == 'web_page'" href="">
                                <img src="<?php echo get_template_directory_uri() ;?>/img/mail-icon.png" />
                            </a>
                            <a ng-if="resource.format == 'video'" href="">
                                <img src="<?php echo get_template_directory_uri() ;?>/img/video-icon.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="pull-right" ng-show="resources.count > 0">
                <span ng-show="paged > 1">
                    <a href="" ng-click="decreasePaged(); searchResources()">< Previous</a>
                </span>
                <span>&nbsp;</span>
                <span ng-show="resources.pages > 1 && paged < resources.pages">
                    <a href="" ng-click="increasePaged(); searchResources()">Next ></a>
                </span>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/angular/services/ResourceService.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/angular/controllers/ResourceController.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/angular/directives/resourcesNav.js"></script>
<?php get_footer();