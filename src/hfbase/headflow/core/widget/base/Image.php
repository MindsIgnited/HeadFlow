<?php
namespace headflow\core\widget\base;

use \headflow\core\widget\Widget;

class Image extends Widget {

    public function getTemplateString() {
        return '<div class="headFlowEditable">{% debug this.imagePath %}<img src="{{ this.imagePath }}" alt="{{ this.altText }}" title="{{ this.title }}" /></div>';
    }

    public function getImagePath() {
        return $this->store->imagePath;
    }

    public function setImagePath($imagePath) {
        $this->store->imagePath = $imagePath;
    }

    public function getTitle() {
        return $this->store->title;
    }

    public function setTitle($title) {
        $this->store->title = $title;
    }

    public function getAltText() {
        return $this->store->altText;
    }

    public function setAltText($altText) {
        $this->store->altText = $altText;
    }


}

