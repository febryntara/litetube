// $(".nav-link").on("click", function () {
//   $(".nav-link").removeClass("active");
//   $(this).addClass("active");
// });

// $(".navbar-brand").on("click", function () {
//   $(".nav-link").removeClass("active");
//   $(".nav-link:first-child").addClass("active");
// });

$("#button-cari").on("click", function () {
  let keyword = $("#input-cari").val();
  let items = [];
  let content = "";
  $("#input-cari").val("");
  $.ajax({
    url:
      "https://youtube.googleapis.com/youtube/v3/search?key=AIzaSyC80pc3ObrREAlq56FOfa-ChzQwUHA_eDE&part=snippet&type=video&q=" +
      keyword,
    method: "GET",
    success: function (data) {
      items = data.items;
      $("#title-cari").html(`<h2>Hasil Pencarian ` + keyword + `</h2><hr>`);
      $.each(items, function (i, data) {
        content +=
          `<div class="row">
      <div class="col-md-4">
        <a href="https://www.youtube.com/watch?v=` +
          data.id.videoId +
          `" target="_BLANK" rel="noopener noreferrer">
          <img class="border border-5 border-dark rounded" src="` +
          data.snippet.thumbnails.medium.url +
          `" width="320" alt="">
        </a>
      </div>
      <div class="col-md">
        <a href="http://www.youtube.com/watch?v=` +
          data.id.videoId +
          `" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color:black">
          <h4>` +
          data.snippet.title +
          `</h4>
        </a>
        <p><strong>` +
          data.snippet.channelTitle +
          `</strong></p>
        <p>` +
          data.snippet.description +
          `</p>
        <p><small class="text-muted">` +
          data.snippet.publishTime +
          `</small></p>
      </div>
    </div><hr>`;
      });
      $("#result-cari").html(content);
    },
  });
  // alert(keyword);
});
