{{-- マイページ画面 --}}
{{-- {{ $user->name }} --}}
{{ $user->id }}
{{ $user->name }}



<x-members_header></x-members_header> 

<x-app-layout>


    <div class="py-12 w-12/12">
        <div class="space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="flex">
                <div class="w-7/12 p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="w-3/12 p-4 ml-20 bg-white shadow sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        <a href="{{ 'member_mypost' }}">自分の投稿一覧</a>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-members_footer></x-members_footer>   
