// 記事一覧でいいね押した時

// const like = (postId) => {
//   $.ajax({
//     headers: {
//       "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
//     // dataType: "json",
//     url: `/like/${postId}`,
//     type: "POST",
    
//   })

//     .done(function (data, status, xhr) {
//       console.log(postId);
//       console.log(data.like);
//       console.log('ここまではできてる');
//       console.log(document.getElementById(postId));
//       // いいねの状態に応じてボタンのテキストを変更
//       var button = document.getElementById(postId);
//       console.log(button);
//       if (button.classList.contains("liked")) {
//         button.classList.remove("liked");
//         button.textContent = "good";
//       } else {
//         button.classList.add("liked");
//         button.textContent = "good済";
//       }
//     })
//     .fail(function (xhr, status, error) {
//       console.log(error);
//     });
// };


const like = (postId) => {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: `/like/${postId}`,
    type: "POST",
  })
    .done(function (data, status, xhr) {
      // いいねの状態に応じてボタンのテキストを変更
      var likeButton = document.getElementById(postId);
      console.log(likeButton);
      if (likeButton.textContent === "good") {
        likeButton.textContent = "good済";
      } else {
        likeButton.textContent = "good";
      }
    })
    .fail(function (xhr, status, error) {
      console.log(error);
    });
};


function changeText(button) {
  if (button.textContent === "bad") {
    button.textContent = "bad済";
  } else {
    button.textContent = "bad";
  }
  
  var buttonId = button.id; // ボタンのidを取得
  console.log(buttonId);
  fetch(`/bad/${buttonId}`,{

  })
  .then(response => response.json())
    .then(res => {
      console.log('成功');
    })

    .catch(error => {
      console.log('エラー');
    })
};

