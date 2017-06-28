# Wordpress plugin to create Custom Post types




## Description
This is a wordpress custom post type plugin for the following post types.

* Awards
* Testimonials
* Specials
* Slideshows
* Galleries
* Announcements
* Media Clippings
* Newsletters
* Real Estate

## Settings.

### Settings -> CPT Settings
Custom Post type Enables

### Slideshows -> Settings
Add default slideshow dimensions.
Add default secondary slideshow dimensions.
Select Secondary defaults to Feature Image / Slideshow.

### Galleries -> Settings
Add Filters for galleries, specifically for feature gallery.

### Real Estate -> Settings
Price Units.
Area Units.
Custom menu.
Title for index.
Pre text for index.
Post text for index.
Call to action for display page.
Table Columns ( select columns, label and order).

##  Post Types

### Awards


### Testimonials

### Specials

### Slideshows

### Galleries

### Announcements

### Media Clippings

### Newsletters

### Real Estate



## Shortcodes

### [fgallery]

The **[fgallery]** shortcode accepts the following attribute.

| Attribute | Default | Description |
| --------- | ------- | ----------- |
| width     |  100px  | width of thumb |
| height    |  auto   | height of thumb |
| class     |         | adds class attribute |
| alt       |         | adds alt tag |
| thumb     |         | uses a different image as the thumb |
| group     |         | this adds group to gallery to link images to one group |

[fgallery alt="this is the alttext" thumb="absolute/path/to/image" width="150px" height="100%" class="my-class" ]<imc src="path/to/image" />[/fgallery]

### [page_gallery]

| Attribute | Description |
| --------- | ----------- |
| id        | The post id of the gallery post|
| feature   | This allows feature image or not default is false |
| filter    | This adds filters default is true |

[page_gallery id="344" feature="true" filter="false" ]
