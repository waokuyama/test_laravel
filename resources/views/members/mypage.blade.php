
<x-members_header></x-members_header>

<div class="mt-3 space-y-1">
    <x-responsive-nav-link :href="route('profile.edit')">
        {{ __('Profile') }}
    </x-responsive-nav-link>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
</div>

<x-members_footer></x-members_footer>