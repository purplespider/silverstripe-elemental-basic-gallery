# Basic Image Gallery Elemental Block

## Introduction

A simple image gallery block. Uses [Basic Image Gallery Extension](https://github.com/purplespider/silverstripe-basic-gallery-extension) to provide bulk uploading, drag & drop reordering and inline caption editing.

![Screenshot](screenshot.png)

## Maintainer Contact ##
 * James Cocker (ssmodulesgithub@pswd.biz)
 
## Requirements
 * Silverstripe 4.1+
 
## Installation Instructions
````
composer require purplespider/silverstripe-elemental-basic-gallery ^2
````

## Upgrading Notes
* Upgrading to v2 will break existing galleries due to a change to a polymorphic relation in the extension.