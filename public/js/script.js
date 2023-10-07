$(function () {
  // ハンバーガー
  $('.bl_burgerBtn').on('click', function () {
    $('.bl_head_gloNav').toggleClass('active');
  });

  // 追従ヘッダー
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 200) {
      $(".ly_head").addClass("is_fixed");
    } else {
      $(".ly_head").removeClass("is_fixed");
    }
  });
});
