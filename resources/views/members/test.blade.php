<p>テストページ</p>
<button id="likeButton" data-post-id="1">いいね</button>

<script>
function toggleLike() {
    const button = document.getElementById('likeButton');
    const postId = button.getAttribute('data-post-id');
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/posts/' + postId + '/like', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // LaravelのCSRFトークンを設定
    
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          
          if (response.liked) {
            button.textContent = 'いいね済み';
          } else {
            button.textContent = 'いいね';
          }
        } else {
          console.error('Error:', xhr.status);
        }
      }
    };
    
    xhr.send();
  }
</script>