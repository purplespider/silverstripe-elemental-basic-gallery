# Basic Image Gallery Elemental Block (Silverstripe)

## Introduction

A simple image gallery block for Silverstripe CMS's Elemental module. Uses [Basic Image Gallery Extension](https://github.com/purplespider/silverstripe-basic-gallery-extension) to provide bulk uploading, drag & drop reordering and inline caption editing.

![Screenshot](screenshot.png)

## Maintainer Contact

-   James Cocker (ssmodulesgithub@pswd.biz)

## Requirements

-   Silverstripe 5

## Installation Instructions

Until [this PR](https://github.com/colymba/GridFieldBulkEditingTools/pull/238) is merged:
Add to composer.json:

```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/purplespider/GridFieldBulkEditingTools"
        }
    ],
```

Add to `require`:

```
"colymba/gridfield-bulk-editing-tools": "dev-ss5-fix-json2array as 4.0",
```

Then install this module:

```

composer require purplespider/silverstripe-elemental-basic-gallery ^3

```
