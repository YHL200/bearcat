
CKEDITOR.editorConfig = function( config ) {
    config.language = 'zh-cn'; //配置语言
    //config.skin = 'office2013';
    config.skin = 'moonocolor';
    //config.skin = 'Moono_blue';
    //config.uiColor = '#AADC6E'; //界面颜色
    config.width = 750; //宽度
    config.height = 350; //高度

    config.toolbar = 'MyToolbar';
    config.toolbar_MyToolbar =
        [
            { name: 'document', items : [ 'Source','-','Save' ] },
            { name: 'clipboard', items : [ 'PasteFromWord','-','Undo','Redo' ] },
            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
            { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
            '/',
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
            { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
            { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','CodeSnippet' ] },
            '/',
            { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
            { name: 'colors', items : [ 'TextColor','BGColor' ] },
            { name: 'tools', items : [ 'Maximize', 'ShowBlocks'] }
        ];
    config.filebrowserBrowseUrl = './Public/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = './Public/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = './Public/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = './Public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = './Public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = './Public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
