<?php
use INUtils\Entity\PostEntity;
use INUtils\Helper\PostHelper;
$member = new PostEntity(get_the_ID());
?>
<div class="form-group">
    <input type="url" name="<?php echo PostEntity::VIDEO; ?>" id="<?php echo PostEntity::VIDEO; ?>" 
    class="form-control" value="<?php echo $member->getVideo(); ?>" title="">
</div>
<?php echo PostHelper::addStylesAndScripts();