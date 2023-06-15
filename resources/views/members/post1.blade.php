<p>投稿ページ</p>
{{-- {{ $user->id }} --}}
<x-members_header></x-members_header>

<section class="relative mt-10 text-gray-600 body-font">
    <div class="container w-8/12 py-5 mx-auto border-2 px-28">
      <div class="flex flex-col w-full mb-12 text-center">
        <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font">ジャンル</h1>
        <p class="mx-auto text-base leading-relaxed lg:w-2/3">生活/恋愛/趣味/仕事</p>
      </div>
      <div class="mx-auto lg:w-3/4 md:w-1/4">
        <div class="flex flex-wrap -m-2">
          <div class="w-full">
            <div class="relative">
              <label for="name" class="text-sm leading-7 text-gray-600">タイトル</label>
              <input type="text" id="name" name="name" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">
            </div>
          </div>
          {{-- <div class="w-1/2 p-2">
            <div class="relative">
              <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
              <input type="email" id="email" name="email" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">
            </div>
          </div> --}}
          <div class="w-full mt-3">
            <div class="relative">
              <div class="w-full">
                <div class="relative">
                  <label for="message" class="text-sm leading-7 text-gray-600">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">投稿内容</font>
                    </font>
                  </label>
                  <textarea id="message" name="message" class="w-full h-64 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full p-2 my-3">
            <button class="flex px-8 py-2 mx-auto text-lg text-white bg-blue-500 border-0 rounded focus:outline-none hover:bg-blue-600">投稿する</button>
          </div>
        </div>
      </div>
    </div>
  </section>

<x-members_footer></x-members_footer>