<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	
    selector: "#desc",
	/*document_base_url: "http://localhost/festievento/",
	/*file_browser_callback: "openmanager",
	open_manager_upload_path: 'uploads/',
	theme_advenced_buttons1: "openmanager",*/
    plugins: [
	"lists link charmap  anchor", "insertdatetime media table contextmenu paste textcolor "
    ],
    toolbar: " undo | fontselect fontsizeselect   | styleselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
	
	style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]

});
</script>


</script>