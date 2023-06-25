// function like(postId) {
//   $.ajax({
//     headers: {
//       "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
//     },
    
//     // url: "{{ route('m_store') }}",
//     url: `/like/${postId}`,
//     type: 'POST',
//     // data: formData,
//     dataType: 'json'
//   });
// }

// const like = (postId) => {
//   $.ajax({
//     headers: {
//       "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
//     // url: `/like/${postId}`,
//     // url: `/like/${postId}`,
//     url: `/like/24`,
//     type: "POST",
//   })
//     .done(function (data, status, xhr) {
//       console.log(data);

      
//     })
//     .fail(function (xhr, status, error) {
//       console.log();
//     });
// }

const like = (postId) => {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    // dataType: "json",
    url: `/like/24`,
    type: "POST",
    
  })

    .done(function (data, status, xhr) {
      console.log(postId);
      console.log(data.like);
      console.log('ここまではできてる');
      console.log(document.getElementById(postId));
      // いいねの状態に応じてボタンのテキストを変更
      var button = document.getElementById(postId);
      console.log(button);
      if (button.classList.contains("liked")) {
        button.classList.remove("liked");
        button.textContent = "いいね";
      } else {
        button.classList.add("liked");
        button.textContent = "いいね解除";
      }
    })
    .fail(function (xhr, status, error) {
      console.log(error);
    });
};

