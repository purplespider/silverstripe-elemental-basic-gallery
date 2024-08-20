# Basic Image Gallery Elemental Block (Silverstripe)

## Introduction

A simple image gallery block for Silverstripe CMS's Elemental module. Uses [Basic Image Gallery Extension](https://github.com/purplespider/silverstripe-basic-gallery-extension) to provide bulk uploading, drag & drop reordering and inline caption editing.

The template displays the images as square thumbnails with a link to larger versions and works wirth the [Fancybox](https://fancyapps.com/fancybox/) lightbox module out of the box. The template can be easily overridden to work with the lightbox of your choice or to make a slideshow, etc.

![Screenshot](screenshot.png)

## Maintainer Contact

-   James Cocker (ssmodulesgithub@pswd.biz)

## Requirements

-   Silverstripe 5

## Installation Instructions

```

composer require purplespider/silverstripe-elemental-basic-gallery ^3

```

## Customising

You can easily customise the functionality using a [Silverstripe Extension](https://docs.silverstripe.org/en/5/developer_guides/extending/extensions/) and/or [overriding the template](https://docs.silverstripe.org/en/5/developer_guides/templates/template_inheritance/).

For example, say you wished to add the ability to also display the images in a slider, and your website uses Bootstrap.

First you would create an extension to add a checkbox to the block's CMS fields:

**app/src/Extensions/ImageGalleryBlockExtension.php**
```php
<?php

namespace PurpleSpider\MySite;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;

class ImageGalleryBlockExtension extends DataExtension
{

    private static $db = [
        'DisplayAsSlideshow' => 'Boolean',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.Main', CheckboxField::create('DisplayAsSlideshow', 'Display as Slideshow?'));
    }

}
```

Enable the extension:

**app/_config/extensions.yml**
```yml
PurpleSpider\ElementalBasicGallery\ImageGalleryBlock:
  extensions:
    - PurpleSpider\MySite\ImageGalleryBlockExtension
```

Then override the template:
**themes/[THEMENAME]/templates/PurpleSpider/ElementalBasicGallery/ImageGalleryBlock.ss**
```html
<% if $DisplayAsSlideshow %>
    <% if $Title && $ShowTitle %>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h2>$Title</h2>
                </div>
            </div>
        </div>
    <% end_if %>
    <% if PhotoGalleryImages %>
        <div id="carousel{$ID}" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <% loop PhotoGalleryImages %>
                    <div class="carousel-item <% if $IsFirst %>active<% end_if %>">
                        <img src="$Image.Fill(2000,1200).URL" class="d-block w-100" alt="$Title">
                        <% if $Title %>
                            <div class="text-light p-0 position-absolute bottom-0 end-0">
                                <h3 class="p-3 px-4 m-0 d-inline-block" style="background-color: rgba(0, 0, 0, 0.5)">$Title</h3>
                            </div>
                        <% end_if %>
                    </div>
                <% end_loop %>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{$ID}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel{$ID}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <% end_if %>
<% else %>
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <% if $Title && $ShowTitle %>
                    <h2>$Title</h2>
                <% end_if %>
                <% if PhotoGalleryImages %>
                    <div class="row justify-content-center">
                        <% loop PhotoGalleryImages %>
                            <div class="col-6 col-md-4 col-lg-3 p-2 m-0">
                                <a data-fancybox="gallery" data-caption="$Title" href="$Image.FitMax(2400,2400).URL"><img src="$Image.Fill(400,400).URL" /></a>
                            </div>
                        <% end_loop %>
                    </div>
                <% end_if %>
            </div>
        </div>
    </div>
<% end_if %>
```