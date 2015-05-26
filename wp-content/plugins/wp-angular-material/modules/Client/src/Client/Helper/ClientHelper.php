<?php
namespace Client\Helper;

use INUtils\Helper\PostHelper;
use Client\Controller\ClientController;
use INUtils\Helper\TaxonomyHelper;

class ClientHelper
{
    const CLIENT_SINGULAR = "Client";
    const CLIENT_PLURAL = "Clients";
    const CLIENT_POST_TYPE = "client";
    const CLIENT_TAXONOMY_NAME = "client_type";

    function __construct(){
        $this->clientController = ClientController::getSingleton();
        $this->createClientPostType();

        add_action('add_meta_boxes_client', array(&$this, 'addMetaBoxesForClient'));
        add_action('save_post', array(&$this->clientController, 'save'));
        add_action('init', array(&$this, $this->createClientTaxonomy()));
    }

    public function createClientTaxonomy(){
        TaxonomyHelper::getSingleton()->createTaxonomy(
            self::CLIENT_TAXONOMY_NAME,
            "Client Type",
            "Client Type",
            "Client Types",
            self::CLIENT_POST_TYPE,
            "clients"
            );
    }

    /**
     * It creates the Staff post type
     */
    public function createClientPostType(){
        PostHelper::createPostType(self::CLIENT_POST_TYPE,
            self::CLIENT_SINGULAR,
            self::CLIENT_PLURAL
        );
    }

    public function addMetaBoxesForClient(){
        add_meta_box( 'client_more_info', 'info',
        array(&$this, 'getMetaBoxForMoreInfo'),
        self::CLIENT_POST_TYPE, 'advanced');
    }

    public function getMetaBoxForMoreInfo(){
        include __DIR__."/../views/admin/edit-form.php";
    }
}