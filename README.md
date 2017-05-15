# IronStrap
*A modern, flexible, and responsive WordPress framework built with the Bootstrap grid.*

**This is the IronStrap Parent theme.  It is intended to be used with the [IronStrap Child](https://github.com/aprivette/ironstrap-child) theme.**

## About
IronStrap is a WordPress framework I custom built for use at [Ironistic](http://ironistic.com). It serves as the foundation for our custom WordPress sites.

## Getting Started
### Setup
1. Make sure ACF Pro is installed as the options panel depends on it.
2. Open the terminal and cd to ironstrap-child.  Then, run `npm install` to install Bootstrap, FontAwesome, and other Gulp utilities.

### Working in IronStrap
- After setting up your installation, thoroughly look through the IronStrap Options page and populate relevant fields.

### Gulp
Gulp is a terminal utility for automating front-end tasks. Running gulp in the child theme directory will do the following tasks.

- **Sass:** Compiles site.scss to css/site.css. Minifies site.css to css/min/site.min.css
- **Javascript:** Concats and minifies all .js files in the js directory to site.min.js. global.js is given priority.

Running `gulp watch` will watch Sass and Javascript files for changes.

## Dependency Information
### Plugin Dependencies
- Advanced Custom Fields Pro

## What's Included
- **Visual Composer Elements**
    - IronStrap Retina Image // Uses javascript to situationally display retina images.
- **NPM Packages**
    - Gulp Sass and Javascript utilities
    - FontAwesome
    - Bootstrap 4 Alpha 6
- **Sass**
    - Bootstrap 4 grid and mixins only via NPM
    - FontAwesome via NPM
    - Sass mixins
        - font-size($size) // Font size converter to rem.
        - transition($property: all, $duration: 400ms, $easing: ease-in-out) // Transition prefixer
        - image-retina($file, $type, $width, $height) // Retina image generator for divs.

## What isn't Included
- **Javascript libraries**
    - Including sliders and other javascript libraries should be done on a per site basis via NPM if possible. Recommended slider is Slick Slider.

## Built in ACF Options
### Theme Options
- Global (Security and speed related toggles)
    - Defer Javascript // Speed
    - Disable Versioning // Speed
    - Hide Author Usernames // Security
    - Remove Meta from Head // Security
    - Disable XMLRPC // Security
- Header
    - Logo // Header logo
    - Logo Width // Width of the logo in pixels
    - Logo Height // Height of the logo in pixels
    - Retina Logo // Logo for retina screens with 2x resolution
    - Sticky Logo // Sticky header logo
    - Top Header Sidebars // Number of sidebars to enable above the header
- Footer
    - Top Footer Sidebars // Number of sidebars to enable in the footer
    - Bottom Footer Sidebars // Number of sidebars to enable below the footer
- Error
    - 404 Content // 404 editor for PMs
- Sidebars
    - Create Sidebars // Create sidebars for specific pages
    - Left Sidebar Width // Define width of left-aligned sidebars
    - Right Sidebar Width // Define width of right-aligned sidebars
- Text Editor Styles
    - Editor Styles // Create styles which hook into the WordPress text editor (TinyMCE) and assign CSS classes to them.
- Javascript
	- Header Javascript // Append JS to the header
	- Footer Javascript // Append JS to the footer
- Redirects
	- Page // Page to redirect
	- External // Specifies an external link
	- Redirect Type // HTTP redirect code
	- Redirect Page or Redirect URL // Where to redirect to
- Favicons
	- Favicon // Generates different sizes of favicons for different devices
	- Theme Color // Defines the primary color of the site - used largely for >= Windows 8 metro grid.
	- Facebook Share Image // Defines an Open Graph image for Facebook
	- LinkedIn Share Image // Defines an Open Graph image for LinkedIn
	- Twitter Share Image // Defines an image for Twitter shares
- Robots.txt
	- Additional Robots.txt Rules // Appends rules to the WordPress generated robots.txt
- WordPress REST API
    - Require Auth for WordPress REST API // Security
    - Expose ACF Fields // Exposes ACF data on specified post types

### Page Options
- Sidebar
	- Enable Sidebar // Enables a sidebar on the page and displays the following options
	- Sidebar Type // The name of a sidebar created in the options page
	- Sidebar Orientation // Right or left
	- Force Child Sidebars // Force the sidebar to display on all children. Can be overridden by children.

### Page and Post Options
- Social Options
	- Facebook Share Image // Defines an Open Graph image for Facebook. Overrides the global IronStrap option.
	- LinkedIn Share Image // Defines an Open Graph image for LinkedIn. Overrides the global IronStrap option.
	- Twitter Share Image // Defines an image for Twitter shares. Overrides the global IronStrap option.

## Potential Changes
- Add option to change default sidebar breakpoint.
- Add flex-flow reverse option for left-aligned sidebars, making them break to the bottom of the page after the main content.