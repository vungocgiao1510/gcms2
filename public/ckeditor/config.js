/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	config.uiColor = '#e7f6ff';
    // config.height = 420;
    config.skin = 'moonocolor';

    var gcmsurl = "http://vungocgiao.com/public/ckeditor";

    config.filebrowserBrowseUrl = gcmsurl+'/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = gcmsurl+'/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = gcmsurl+'/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = gcmsurl+'/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = gcmsurl+'/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = gcmsurl+'/kcfinder/upload.php?opener=ckeditor&type=flash';
// ...
};
