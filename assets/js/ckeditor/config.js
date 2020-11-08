/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'id';
	config.uiColor = '#0C7FCC';
	config.height = 300;
	config.toolbarCanCollapse = true;
	config.enterMode = CKEDITOR.ENTER_BR; // <p></p> to <br />
	config.entities = false;
	config.basicEntities = false;
	config.filebrowserBrowseUrl = '../assets/kcfinder/browse.php?opener=ckeditor&type=files';
   	config.filebrowserImageBrowseUrl = '../assets/kcfinder/browse.php?opener=ckeditor&type=images';
   	config.filebrowserFlashBrowseUrl = '../assets/kcfinder/browse.php?opener=ckeditor&type=flash';
   	config.filebrowserUploadUrl = '../assets/kcfinder/upload.php?opener=ckeditor&type=files';
   	config.filebrowserImageUploadUrl = '../assets/kcfinder/upload.php?opener=ckeditor&type=images';
   	config.filebrowserFlashUploadUrl = '../assets/kcfinder/upload.php?opener=ckeditor&type=flash';
	config.allowedContent =
    'h1 h2 h3 blockquote strong em;' +
    'a[!href];' +
	'p{text-align}(*);' +
	'table tr th td caption;' +
	'span{!font-family};' +
	'span{!color};' +
	'span(!marker);' +
	'del ins;'+
	'img[alt,border,width,height,align,vspace,hspace,!src];';
	
	/*config.allowedContent = 'p{text-align}(*); strong(*); em(*); b(*); i(*); u(*); sup(*); sub(*); ul(*); ol(*); li(*); a[!href](*); br(*); hr(*); img{*}[*](*); iframe(*)';
	config.disallowedContent = '*[on*]';*/
};



