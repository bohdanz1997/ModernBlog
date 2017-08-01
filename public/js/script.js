$('#publish-comment').click(function(e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var data = {
    post_id: $('#post_id').val(),
    author: $('#author').val(),
    content: $('#content').val()
  };

  e.preventDefault();

  if (!data.author || !data.content) {
    $('.errors').append('<li>Please fill up all fields!</li>');
    $('.alert-danger').removeClass('no-display');
    return;
  }

  var test = data.author.split(' ');

  if (test.length > 2
    || test[0][0] !== test[0][0].toUpperCase()
    || test[1][0] !== test[1][0].toUpperCase()) {
    $('.errors').append('<li>Uncorrect author data!</li>');
    $('.alert-danger').removeClass('no-display');
    return;
  }

  $.ajax({
    type: "POST",
    method: "POST",
    url: "/comments/store",
    data: data,
    success: function(data) {
      console.log(data);

      var comment = '<li class="list-group-item"><strong>'+data.author+'</strong>: '+data.content+'</li>';

      $('#comments-container').append(comment);
      $('.errors').html('');
      $('.alert-danger').addClass('no-display');

      $('#author').val('');
      $('#content').val('');
    },
    error: function (data) {
      console.log(data);
    }
  });
});
