<?php

namespace PurpleSpider\ElementalBasicGallery;

use SilverStripe\View\Requirements;
use DNADesign\Elemental\Controllers\ElementController;

class ImageGalleryBlockController extends ElementController
{
    public function init()
    {
        parent::init();
        Requirements::javascript('purplespider/silverstripe-elemental-basic-gallery:client/dist/photoswipe.min.js');
        Requirements::javascript('purplespider/silverstripe-elemental-basic-gallery:client/dist/photoswipe-ui-default.min.js');
        // Requirements::javascript('purplespider/silverstripe-elemental-basic-gallery:client/dist/gallery.min.js');
        // Requirements::css('purplespider/silverstripe-elemental-basic-gallery:client/dist/gallery.css');
    }
}