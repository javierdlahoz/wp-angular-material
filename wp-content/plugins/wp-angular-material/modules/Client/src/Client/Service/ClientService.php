<?php
namespace Client\Service;

use INUtils\Service\WPPostService;
use Client\Helper\ClientHelper;
use Client\Entity\ClientEntity;

class ClientService extends WPPostService
{
    const ENTITY_CLASS = "Client\Entity\ClientEntity";
    const CLIENT_POST_TYPE = "client";

    /**
     *
     * @see \INUtils\Service\WPPostService::init()
     */
    public function init(){
        $this->setEntityClass(self::ENTITY_CLASS);
        $this->setPostType(self::CLIENT_POST_TYPE);
    }

    /**
     *
     * @param string $termId
     * @return multitype:\Client\Entity\ClientEntity
     */
    public function getClientsByTermId($termId){
        $this->setTaxQuery(array(
            array(
                "taxonomy" => ClientHelper::CLIENT_TAXONOMY_NAME,
                "field" => "term_id",
                "terms" => $termId
                )
            )
        );
        return $this->getPosts();
    }
}