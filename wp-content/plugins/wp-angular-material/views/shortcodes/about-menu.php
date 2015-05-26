<?php
use INUtils\Entity\PostEntity;
$pageTmp = get_page_by_title("about");
$pageEntity = new PostEntity($pageTmp->ID);
$pageChildren = $pageEntity->getChildren();
$url = $_SERVER["REQUEST_URI"];
?>
<div id='cssmenu'>
    <ul>
        <?php
        $i=0;
        foreach ($pageChildren as $pageChildren):
        ?>
        <li id="<?php echo $pageChildren->getName(); ?>"
            class="has-sub <?php if($i==count($conferences)-1) echo "last"; ?> <?php 
            if($url == "/about/".$pageChildren->getName()."/") echo "active"; ?>">
            <a href="<?php echo $pageChildren->getPermalink(); ?>">
        <span><?php echo $pageChildren->getTitle(); ?></span>
        </a>
       </li>
       <?php 
            $i++;
       endforeach; ?>
    </ul>
</div>