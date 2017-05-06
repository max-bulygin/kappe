$(document).ready(function () {
  // Like button
  var $likeButton = $('.btn-like');

  $likeButton.click(function (e) {
    e.preventDefault();

    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    $(this)
      .addClass('animated rollOut')
      .one(animationEnd, function () {
        $(this).parent().slideUp();
      });

    var post_id = $(this).attr('data-id');
    var nonce = $(this).attr('data-nonce');

    $.ajax({
      url: likeit.ajax_url,
      type: 'post',
      data: {
        action: 'kp_like_it',
        post_id: post_id,
        nonce: nonce
      },
      success: function (response) {
        $('#like-count-' + post_id).html(response);
      }
    });

    return false;
  });
});

console.log('test it baby');