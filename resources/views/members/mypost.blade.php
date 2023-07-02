{{-- 自分の投稿一覧 --}}
{{-- {{ dd($members ) }} --}}
{{-- <p>全て🃏</p> --}}
{{-- <p>生活☘️</p> --}}
{{-- <p>恋愛❤</p> --}}
{{-- <p>趣味♠️</p> --}}
{{-- <p>仕事🔸</p> --}}




<style>
     .accordion {
      background-color: #f1f1f1;
      color: #333;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }
    
    .panel {
        display: none;
    }
</style>

<script>
    function togglePanel() {
        var panel = event.target.nextElementSibling;
        panel.style.display = panel.style.display === "none" ? "block" : "none";
    }
</script>

<x-members_header></x-members_header>

{{-- ナビゲーション部分 --}}
<div class="text-gray-600 body-font">
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
      <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto md:mr-auto">
        <a href="{{ route('member_mypost') }}" class="mr-5 hover:text-gray-900">全て</a>
        <a href="{{ route('mypost_genre', ['name' => '生活']) }}" class="mr-5 hover:text-gray-900">生活</a>
        <a href="{{ route('mypost_genre', ['name' => '恋愛']) }}" class="mr-5 hover:text-gray-900">恋愛</a>
        <a href="{{ route('mypost_genre', ['name' => '趣味']) }}" class="mr-5 hover:text-gray-900">趣味</a>
        <a href="{{ route('mypost_genre', ['name' => '仕事']) }}" class="mr-5 hover:text-gray-900">仕事</a>
      </nav>
    </div>
</div>

<section class="container px-4 mx-auto">
    <h2 class="text-lg font-medium text-gray-800 dark:text-white">自分の投稿一覧</h2>
    <div class="flex flex-col mt-6">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
@foreach($members as $member)
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>投稿日
                                            {{-- @if($member->genre == ) --}}
                                        </span>
                                    </button>
                                </th>

                                <th scope="col" class="text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                     タイトル
                                </th>

                                <th scope="col" class="text-sm font-normal text-center text-gray-500 rtl:text-right dark:text-gray-400">
                                    good数
                                </th>

                                {{-- <th scope="col" class="text-sm font-normal text-center text-gray-500 rtl:text-right dark:text-gray-400">
                                    bad
                                </th> --}}

                                <th scope="col" class="text-sm font-normal text-left text-gray-500 rtl:text-right dark:text-gray-400">                    
                                    削除
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">どこ</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium whitespace-normal" style="width: 200px;">
                                    <div>
                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{$member->created_at}}</h2>
                                    </div>
                                </td>
                                <td class="text-sm font-medium whitespace-normal" style="width: 200px;">
                                    <div class="inline text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                        {{$member->title}}
                                    </div>
                                </td>
                                <td class="text-sm whitespace-nowrap">
                                    <div style="margin-left: 10px;">
                                        <h4 class="text-center text-gray-700 dark:text-gray-200">{{ $member->likes_count }}</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="mt-3">
                                        <form action="{{ route('post_delete', $member->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </div>
                                </td>
                                
                                
                                {{-- <td>
                                    <div>
                                            <div class="mt-auto mb-auto">
                                                <form action="{{ route('post_delete', $member->id) }}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger">削除</button>
                                                </form>
                                            </div>
                                    </div>
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>


<button class="accordion" onclick="togglePanel()">投稿内容</button>
<div class="panel">
    {{-- <p>{{$member->article}}</p> --}}
    <p>{!! nl2br(htmlspecialchars($member->article)) !!}</p>
</div>      
@endforeach      




                    
{{-- ページングできた 場所はresources>views>vender>pagination>pagination --}}
{{ $members->links('pagination::pagination') }}

    
</section>

<x-members_footer></x-members_footer>