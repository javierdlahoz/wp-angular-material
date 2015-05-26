<?php
namespace Client\Entity;

use INUtils\Entity\WPPostEntity;

class ClientEntity extends WPPostEntity
{

    const URL = "url";

    /**
     *
     * @return string
     */
    public function getUrl(){
        return $this->getMetaField(self::URL);
    }

    /**
     *
     * @param string $url
     */
    public function setUrl($url){
        $this->setMetaField(self::URL, $url);
    }
}