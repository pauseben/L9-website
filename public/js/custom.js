function removeSpecialCharacters(string){
    return string.split(' ').join('-').replace(/[&\/\\#, +()$~%.'":*?|ß;ˇ^˘°˛`()˙´˝¨¸Ä€Í÷×äđĐłŁ@¤<>{}]/g, '');
}

function removeAccent(string){
    return string.normalize("NFD").replace(/\p{Diacritic}/gu, "");
}

// TinyMCE betöltése
if (document.querySelectorAll('textarea.wysiwyg').length > 0) {
    tinymce.init({
        selector: 'textarea.wysiwyg',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern',
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
      language: 'hu_HU',  

      relative_urls: true,
      file_browser_callback: function(field_name, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
          file: '/file-manager/tinymce',
          title: 'Fájlkezelő',
          width: window.innerWidth * 0.8,
          height: window.innerHeight * 0.8,
          resizable: 'yes',
          close_previous: 'no',
        }, {
          setUrl: function(url) {
            win.document.getElementById(field_name).value = url;
          },
        });
      },

        /*image_title: true,
        image_class_list: [
          {title: 'img-responsive', value: 'img-responsive'},
          ],
          height: 500,
          setup: function (editor) {
              editor.on('init change', function () {
                  editor.save();
              });
          },
          image_title: true,
          automatic_uploads: true,
          images_upload_url: '/upload/image',

          relative_urls : true,

          file_picker_types: 'jpeg,png,jpg,gif,svg',
          block_unsupported_drop: false,
          file_picker_callback: function(cb, value, meta) {
              var input = document.createElement('input');
              input.setAttribute('type', 'file');
              input.setAttribute('accept', 'image/jpeg,png,jpg,gif,svg');
              input.onchange = function() {
                  var file = this.files[0];

                  var reader = new FileReader();
                  reader.readAsDataURL(file);
                  reader.onload = function () {
                      var id = 'blobid' + (new Date()).getTime();
                      var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                      var base64 = reader.result.split(',')[1];
                      var blobInfo = blobCache.create(id, file, base64);
                      blobCache.add(blobInfo);
                      cb(blobInfo.blobUri(), { title: file.name });
                  };
              };
              input.click();
          },
          link_list: [
            {title: 'Tiny Home Page', value: 'https://www.tiny.cloud'},
            {title: 'Tiny Blog', value: 'https://www.tiny.cloud/blog'},
            {title: 'TinyMCE Documentation', value: 'https://www.tiny.cloud/docs/'},
            {title: 'TinyMCE on Stack Overflow', value: 'https://stackoverflow.com/questions/tagged/tinymce'},
            
            {title: 'TinyMCE GitHub', value: 'https://github.com/tinymce/'}
          ]*/
    });
}

