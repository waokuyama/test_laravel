{{-- 会員トップページ --}}
{{-- {{ $user->id }} --}}

<p> {{ $test->user()->id }}</p>

<x-members_main>
  
    @section('member_top')
    <main>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                <div class="px-4 mb-10 sm:w-1/2">
                  <div class="h-64 overflow-hidden rounded-lg">
                    <img alt="コンテンツ" class="object-cover object-center w-full h-full" src="https://dummyimage.com/1201x501">
                  </div>
                  <h2 class="mt-6 mb-3 text-2xl font-medium text-gray-900 title-font">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">投稿する</font>
                    </font>
                  </h2>
                  <p class="text-base leading-relaxed">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">今まで経験してきたこと、共有したいことを投稿してみよう!<br></font>
                      <font style="vertical-align: inherit;">あなたの経験してきたことが他の誰かのためになる</font>
                    </font>
                  </p>
                </div>
                <div class="px-4 mb-10 sm:w-1/2">
                  <div class="h-64 overflow-hidden rounded-lg">
                    <img alt="コンテンツ" class="object-cover object-center w-full h-full" src="https://dummyimage.com/1202x502">
                  </div>
                  <h2 class="mt-6 mb-3 text-2xl font-medium text-gray-900 title-font">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">閲覧する</font>
                    </font>
                  </h2>
                  <p class="text-base leading-relaxed">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">学校では教えてくれない学びの共有の場<br></font>
                      <font style="vertical-align: inherit;">みんなで学び選択肢を広げていこう</font>
                    </font>
                  </p>
                </div>
              </div>
            </div>
          </section>
    </main>

    @endsection
   
</x-members_main>





 

