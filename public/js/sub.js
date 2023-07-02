// いいね一覧から取り外す


const like = (postId) => {
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      // dataType: "json",
      url: `/like/${postId}`,
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
          button.textContent = "good済";
        } else {
          button.classList.add("liked");
          button.textContent = "good";
        }
      })
      .fail(function (xhr, status, error) {
        console.log(error);
      });
  };
  
  