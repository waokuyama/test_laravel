




<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('/js/sub.js') }}"></script>
  </head>



{{-- 練習 --}}
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

<main>


{{-- ナビゲーション部分 --}}
<div class="text-gray-600 body-font">
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
      <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto md:mr-auto">
        <a class="mr-5 hover:text-gray-900">全部</a>
        <a class="mr-5 hover:text-gray-900">生活</a>
        <a class="mr-5 hover:text-gray-900">恋愛</a>
        <a class="mr-5 hover:text-gray-900">趣味</a>
        <a class="mr-5 hover:text-gray-900">仕事</a>
      </nav>
    </div>
</div>

{{-- 投稿一覧 --}}
<section class="container px-4 mx-auto">
    <h2 class="text-lg font-medium text-gray-800 dark:text-white">お気に入り一覧</h2>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
@foreach ($likedPosts as $post)
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>投稿日</span>
                                    </button>
                                </th>

                                <th scope="col" class="text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                     タイトル
                                </th>

                                <th scope="col" class="text-sm font-normal text-center text-gray-500 rtl:text-right dark:text-gray-400">
                                    good
                                </th>

                                <th scope="col" class="text-sm font-normal text-center text-gray-500 rtl:text-right dark:text-gray-400">
                                    bad
                                </th>

                                <th scope="col" class="text-sm font-normal text-left text-gray-500 rtl:text-right dark:text-gray-400">                    
                                    投稿日
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
                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $post->created_at }}</h2>
                                    </div>
                                </td>
                                <td class="text-sm font-medium whitespace-normal" style="width: 200px;">
                                    <div class="inline text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                        {{ $post->title }}
                                    </div>
                                </td>
                                <td class="text-sm whitespace-nowrap">
                                    <div style="margin-left: 10px;">
                                        <h4 class="text-center text-gray-700 dark:text-gray-200">
                                            <button onclick="like({{ $post->id }})" id={{ $post->id}} >good済</button>
                                        </h4>
                                    </div>
                                </td>
                                <td class="text-sm whitespace-normal" style="width: 100px;">
                                    <div>
                                        <h4 class="text-center text-gray-700 dark:text-gray-200">bad合計</h4>
                                    </div>
                                </td>
                                <td class="text-sm whitespace-normal" style="width: 150px;">
                                    <div>
                                        <h4 class="text-gray-700 dark:text-gray-200">投稿日</h4>
                                        

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
    {{-- テスト表示 --}}
    {{-- 投稿内容の表示と非表示 --}}
    <button class="accordion" onclick="togglePanel()">投稿内容</button>
                <div class="panel">
                    {!! nl2br(htmlspecialchars($post->article)) !!}
                </div>
                
                <script>
                    document.getElementById("showFormBtn{{ $loop->index }}").addEventListener("click", function() {
                        var form = document.getElementById("contactForm{{ $loop->index }}");
                        form.style.display = form.style.display === "none" ? "block" : "none";
                    });
                
                    document.getElementById("hideFormBtn").addEventListener("click", function() {
                        var form = document.getElementById("contactForm{{ $loop->index }}");
                        form.style.display = "none";
                    });
                
                    document.getElementById("submitFormBtn").addEventListener("click", function() {
                        // フォームの送信処理を実装する
                        var form = document.getElementById("contactForm{{ $loop->index }}");
                        // フォームの入力値を取得して送信処理を行うなどの実装を行う
                    });
                </script>
@endforeach
{{ $likedPosts ->links('pagination::pagination') }}
    
</section>

</main>

<x-members_footer></x-members_footer>