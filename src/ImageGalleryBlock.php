<?php

namespace PurpleSpider\ElementalBasicGallery;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Assets\Image_Backend;
use SilverStripe\ORM\FieldType\DBField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Core\Manifest\ModuleResourceLoader;

class ImageGalleryBlock extends BaseElement
{
    private static $singular_name = 'Image Gallery Block';

    private static $plural_name = 'Image Gallery Blocks';

    private static $table_name = 'ImageGalleryBlock';

    private static $description = 'Add a gallery of multiple images.';

    private static $icon = 'font-icon-thumbnails';

    private static $inline_editable = false;

    private static $summary_fields = [
        'EditorPreview' => 'MyEditorPreview',
    ];

    private static $casting = [
        'getSummary' => 'HTMLText',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function getType()
    {
        return 'Gallery';
    }


    public function getSummary()
    {
        return DBField::create_field('HTMLText', $this->PhotoGalleryImages()->Count()." images")->Summary(20);
    }
    
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }
    
}
