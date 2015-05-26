<?php
namespace Client\Service;

use INUtils\Service\WPTermService;
use Client\Helper\ClientHelper;

class ClientTypeService extends WPTermService
{
    const ENTITY_CLASS = "\Client\Entity\ClientTypeEntity";

    public function init()
    {
        $this->setTaxonomy(ClientHelper::CLIENT_TAXONOMY_NAME);
        $this->setEntityClass(self::ENTITY_CLASS);
    }
}