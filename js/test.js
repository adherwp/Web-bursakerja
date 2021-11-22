$(document).ready(function() {
  var i = 1;
  $('#add').click(function() {
    i++;
    console.log('hallo');
    
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input class="form-control skill_list" type="text" name="name[]" id="name" placeholder="Masukkan Keahlian Yang Dimilik"/></td><td><button class="btn btn-danger btn-remove" name="remove" id="'+i+'">X</button></td></tr>');
  });
  $(document).on('click', '#btn_remove', function() {
    var button_id = $(this).attr("id");
    $("#row"+button_id+"").remove()
  })
  $('#submit').click(function () {
    $.ajax({
      url: "skill.php",
      method:"POST",
      data:$('#add_skil').serialize(),
    }).done(function () {
      $('#add_skill')[0].reset();
    })
  })
});

var src = MSApp
      window.frames["print_frame"].document.title = document.title;
      window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
      window.frames["print_frame"].window.focus();
      window.frames["print_frame"].window.print();
      window.frames["print_frame"].document.rightMargin = 120;
      