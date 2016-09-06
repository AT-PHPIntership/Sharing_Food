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
const EXTNS = ["jpg", "jpeg", "png", "gif"];

$(document).ready(function() {
    var toggle_img = $('.toggle-img');
    var image_holder = $("#image-holder");
    var toggle_btn = $('#toggle-btn');
    $("#picture").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        image_holder.empty();

        if (extn == EXTNS[0] || extn == EXTNS[1] || extn == EXTNS[2] || extn == EXTNS[3]) {
            if (typeof(FileReader) != "undefined") {
                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "style": "width:136px; padding: 10px 10px 0px 0px;",
                        }).appendTo(image_holder);
                    }

                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                    // show the toggle button.
                    toggle_img.show();
                }
            } else {
                alert(not_support_thumbnail);
                toggle_img.hide();
            }
        } else {
            alert(select_only_img);
            toggle_img.hide();
        }
    });
    // toggle button
    toggle_img.click(function(){
        image_holder.toggle();
        $("i",this).toggleClass("fa-angle-double-down fa-angle-double-up");
    });
});