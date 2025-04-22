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
    /**
     * @config
     */
    private static $singular_name = 'Image Gallery Block';

    /**
     * @config
     */
    private static $plural_name = 'Image Gallery Blocks';

    /**
     * @config
     */
    private static $table_name = 'ImageGalleryBlock';

    /**
     * @config
     */
    private static $description = 'Add a gallery of multiple images.';

    /**
     * @config
     */
    private static $icon = 'font-icon-thumbnails';

    /**
     * @config
     */
    private static $inline_editable = false;

    /**
     * @config
     */
    private static $summary_fields = [
        'EditorPreview' => 'MyEditorPreview',
    ];

    /**
     * @config
     */
    private static $casting = [
        'getSummary' => 'HTMLText',
    ];

    #[\Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    #[\Override]
    public function getType()
    {
        return 'Gallery';
    }


    #[\Override]
    public function getSummary()
    {
        return DBField::create_field('HTMLText', $this->PhotoGalleryImages()->Count()." images")->Summary(20);
    }
    
    #[\Override]
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }
    
}
