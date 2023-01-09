<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="table w-full">
                <div class="table-header-group">
                <div class="table-row">
                    <div class="table-cell text-left">#</div>
                    <div class="table-cell text-left">Name</div>
                    <div class="table-cell text-left">Email</div>
                    <div class="table-cell text-left">Operation</div>
                </div>
                    <div class="table-row-group">
                        @foreach ($users as $user)

                            <div class="table-row">
                                {{ $user->name }}
                            </div>
                            <div class="table-cell">
                                {{ $user->email }}
                            </div>
                            <div class="table-cell">
                                    <button class="cursor-pointer ml-6 text-sm text-blue-500 focus:outline-none">
                                        <a href="#">{{ __('Edit') }}</a>
                                    </button>
                                    <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none">
                                        <a href="#">{{ __('Remove') }}</a>
                                    </button>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
