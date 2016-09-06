$(document).ready(function(){
  $('#list_users').DataTable();
  $('#list_foods').DataTable();
	$('#list_food_store').DataTable();
    //Confirm delete
  $('#confirmDelete').on('show.bs.modal', function (e) {
      // set message
      $message = $(e.relatedTarget).attr('data-message');
      $('.modal-body p').text($message);
      // set title for model
      $title = $(e.relatedTarget).attr('data-title');
      $('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $('.modal-footer #confirm').data('form', form);
  });
 
      //Form confirm (yes/ok) handler, submits form
  $('#confirmDelete .modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  }); 
  //countdown shutdown alert
  $("div.alert").delay(timeout).slideUp();

});
// one picture
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_no').show();
            $('#image_no').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image").on('change', function(){
    readURL(this);
});
// many many picture
var imageArray = [];
        $(document).on('click','.remove-item',function(){   

        $(this).closest('div').slideUp('slow', function(){$(this).remove();});
        });
        //event upload
        function handleFileSelect(evt) {
        var files = evt.target.files;

        for (var i = 0, f; f = files[i]; i++) {
        // Only process image files.
        if (!f.type.match('image.*')) {
        continue;
        }
        imageArray.push(f);
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
        return function(e) {
        // Render thumbnail.
        var span = document.createElement('span');
        span.innerHTML = ['<div class="col-md-3 thumb">'+'<img src="', e.target.result,
        '" title="', escape(theFile.name), '"/>' +'<a class="btn btn-danger close remove-item">X</a>' +'</div>'].join('');
        document.getElementById('listImage').insertBefore(span, null);
        };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
        }
        }
        document.getElementById('picture').addEventListener('change', handleFileSelect, false);