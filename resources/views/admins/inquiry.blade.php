
<x-admin_header></x-admin_header>

<main>
  <div class="p-6 bg-white rounded shadow-lg">
    <h3 class="mb-8 text-2xl font-bold">お問い合わせ一覧</h3>
    <div class="flex mb-5 space-x-2">
        <p class='px-3 py-1 '>絞り込み：</p>
        <a href="{{ route('admin_inquiry') }}" class="w-24 px-3 py-1 text-center text-white bg-black rounded-full">全て</a>
        <a href="{{ route('admin_genre', ['id' => '0']) }}" class="w-24 px-3 py-1 text-center text-white bg-blue-500 rounded-full">新着</a>
        <a href="{{ route('admin_genre', ['id' => '1']) }}" class="w-24 px-3 py-1 text-center text-white bg-green-500 rounded-full">対応中</a>
        <a href="{{ route('admin_genre', ['id' => '2']) }}" class="w-24 px-3 py-1 text-center text-white bg-gray-500 rounded-full">対応済</a>
    </div>
    @foreach($contacts as $contact)
    <div class="grid grid-cols-1 gap-4 mb-4">
        <div class="p-4 bg-gray-100 rounded-lg">
            <form action="{{ route('contacts_statsu', ['id' => $contact->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center mb-2 space-x-2">
                    <label for="status" class="font-bold">対応状況:</label>
                    @if($contact->status == 0)
                    <select name="status" id="status" class="px-3 py-1 text-white bg-blue-500 rounded-full">
                    @elseif($contact->status == 1)
                    <select name="status" id="status" class="px-3 py-1 text-white bg-green-500 rounded-full">
                    @elseif($contact->status == 2)
                    <select name="status" id="status" class="px-3 py-1 text-white bg-gray-500 rounded-full">
                    @endif
                        <option value="0" {{ $contact->status == 0 ? 'selected' : '' }}>新着</option>
                        <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>対応中</option>
                        <option value="2" {{ $contact->status == 2 ? 'selected' : '' }}>対応済</option>
                    </select>
                </div>
                <h6 class="mt-2 font-bold">アカウント名：{{ $contact->user->name  }}</h6>
                <h6 class="mt-2 font-bold">メールアドレス：{{ $contact->user->email  }}</h6>
                <h6 class="mt-2 font-bold">受信日：{{ $contact->created_at  }}</h6>
                <p class="mt-1 text-gray-600">{!! nl2br(htmlspecialchars($contact->message)) !!}</p>
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-black rounded ">更新</button>
            </form>
        </div> 
    </div>
    @endforeach
    {{ $contacts->links('pagination::pagination') }}
</div>
  {{-- ここまで --}}
</main>
<x-admin_footer></x-admin_footer>