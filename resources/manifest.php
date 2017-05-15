<?php
	// This file is called in inc/acf_favicon.php. It impersonates a json file in order to assign favicons to Android devices.
	require('../../../../wp-blog-header.php');
	header('Content-Type: application/json');
?>
{
 "name": "<?php echo get_bloginfo('name'); ?>",
 "icons": [
  {
   "src": "\/wp-content\/uploads\/favicons\/favicon-36.png",
   "sizes": "36x36",
   "type": "image\/png",
   "density": "0.75"
  },
  {
   "src": "\/wp-content\/uploads\/favicons\/favicon-48.png",
   "sizes": "48x48",
   "type": "image\/png",
   "density": "1.0"
  },
  {
   "src": "\/wp-content\/uploads\/favicons\/favicon-72.png",
   "sizes": "72x72",
   "type": "image\/png",
   "density": "1.5"
  },
  {
   "src": "\/wp-content\/uploads\/favicons\/favicon-96.png",
   "sizes": "96x96",
   "type": "image\/png",
   "density": "2.0"
  },
  {
   "src": "\/wp-content\/uploads\/favicons\/favicon-144.png",
   "sizes": "144x144",
   "type": "image\/png",
   "density": "3.0"
  },
  {
   "src": "\/wp-content\/uploads\/favicons\/favicon-192.png",
   "sizes": "192x192",
   "type": "image\/png",
   "density": "4.0"
  }
 ]
}