<p>お問い合わせ一覧</p>
<x-admin_header></x-admin_header>

<main>
    <p>テスト</p>
    {{-- コード試し --}}
      <div class="p-6 bg-white rounded shadow-lg">
        <h3 class="mb-6 text-2xl font-bold">お問い合わせ一覧</h3>
        <div class="grid grid-cols-1 gap-4">
          <div class="p-4 bg-gray-100 rounded-lg">
            <span class="px-3 py-1 text-white bg-blue-500 rounded-full">新着</span>
            <h4 class="mt-2 font-bold">お問い合わせ件名1</h4>
            <p class="mt-1 text-gray-600">お問い合わせ内容1</p>
          </div>
          <div class="p-4 bg-gray-100 rounded-lg">
            <span class="px-3 py-1 text-white bg-green-500 rounded-full">対応中</span>
            <h4 class="mt-2 font-bold">お問い合わせ件名2</h4>
            <p class="mt-1 text-gray-600">お問い合わせ内容2</p>
          </div>
          <div class="p-4 bg-gray-100 rounded-lg">
            <span class="px-3 py-1 text-white bg-gray-500 rounded-full">完了</span>
            <h4 class="mt-2 font-bold">お問い合わせ件名3</h4>
            <p class="mt-1 text-gray-600">お問い合わせ内容3</p>
          </div>
        </div>
      </div>
    {{-- ここまで --}}
</main>
<x-admin_footer></x-admin_footer>