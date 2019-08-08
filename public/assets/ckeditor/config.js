/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */


CKEDITOR.replace( 'editor', {
    extraPlugins: 'easyimage',
    removePlugins: 'image',
    
} );



CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserImageBrowseUrl = '/ckeditor/pictures';
    config.filebrowserImageUploadUrl = '/ckeditor/pictures';
 

};


CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.extraPlugins = "lineutils,widget,codesnippet,uploadimage";
    config.codeSnippet_theme = 'monokai_sublime';
};

