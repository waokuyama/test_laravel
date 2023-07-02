
<x-admin_header></x-admin_header>

<div class="w-full overflow-x-auto">
    <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">
      <tbody>
        <tr class="bg-green-200 ">
          <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 ">タイトル</th>
          <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 ">合計bad数</th>
          <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 ">削除</th>

        </tr>
@foreach($posts as $post)
    <tr>
        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
            <a href="#" class="post-title">{{ $post->title }}</a>
        </td>
        {{-- <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">{{ $post->bads_count }}</td>
        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 "> --}}
          <td class="w-40 h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">{{ $post->bad_count }}</td>
          <td class="w-40 h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
            <form action="{{ route('admin_delete', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </td>
    </tr>
    <tr class="article-row" style="display: none;">
        <td colspan="3">
            <div class="px-6 bg-gray-100 article-content " >
                {{ $post->article }}
            </div>
        </td>
    </tr>
@endforeach
      </tbody>
    </table>
  </div>
  {{ $posts->links('pagination::pagination') }}

  
 <script>
    const postTitles = document.querySelectorAll('.post-title');
    
    postTitles.forEach(title => {
        title.addEventListener('click', () => {
            const articleRow = title.parentNode.parentNode.nextElementSibling;
            const articleContent = articleRow.querySelector('.article-content');
            articleRow.style.display = articleRow.style.display === 'none' ? 'table-row' : 'none';
        });
    });
</script>

  <x-admin_footer></x-admin_footer>