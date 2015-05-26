<?php
namespace Client\Controller;

use INUtils\Controller\AbstractController;
use Client\Entity\ClientEntity;
use Client\Helper\ClientHelper;
use Client\Service\ClientTypeService;
use Client\Service\ClientService;

class ClientController extends AbstractController
{
    public function save($postId){
        $clientEntity = new ClientEntity($postId);
        if($clientEntity->getType() == ClientHelper::CLIENT_POST_TYPE){
            $clientEntity->setUrl($this->getPost(ClientEntity::URL));
        }
    }


    /**
     *
     * @return multitype:\Client\Entity\ClientTypeEntity
     */
    public function getClientTypeTerms(){
        return ClientTypeService::getSingleton()->getTerms();
    }

    /**
     *
     * @param int $termId
     */
    public function getClientsByTermId($termId){
        $clientService = ClientService::getSingleton();
        $taxQuery = array(
            array(
                "taxonomy" => ClientHelper::CLIENT_TAXONOMY_NAME,
                "field" => "term_id",
                "terms" => $termId
            )
        );

        $clientService->setTaxQuery($taxQuery);
        return $clientService->getPosts();
    }
}