<?php
use Client\Entity\ClientEntity;
use INUtils\Helper\PostHelper;

$clientEntity = new ClientEntity(get_the_ID());
?>
<div id="url">
	<div class="panel-body">
		<div class="form-group">
			<label class="control-label col-lg-2 col-sm-2">Url</label>
			<div class="col-lg-10 col-sm-10">
				<input type="text" class="form-control"
					name="<?php echo ClientEntity::URL; ?>" id="<?php echo ClientEntity::URL; ?>"
					value="<?php echo $clientEntity->getUrl(); ?>"
					required="true" />
			</div>
		</div>
	</div>
</div>
<?php
echo PostHelper::addStylesAndScripts();