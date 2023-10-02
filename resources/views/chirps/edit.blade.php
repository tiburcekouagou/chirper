<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <a href="{{ route('change.language', 'fr') }}" class="text-gray-700 dark:text-white">Français</a>
        <a href="{{ route('change.language', 'en') }}" class="text-gray-700 dark:text-white">Anglais</a>
        <br><br>

        <form action="{{ route('chirps.update', $chirp) }}" method="POST">
            @csrf
            @method('PATCH')
            {{-- <input type="hidden" name="_method" value="PATCH"> --}}
            <textarea name="message" placeholder="{{ __('util.msg') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message', $chirp->message) }}</textarea>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <x-primary-button class="mt-4">
                {{ __('Mettre à jour') }}
            </x-primary-button>
            <a href="{{ route('chirps.index') }}">
                {{ __('Annuler') }}
            </a>
        </form>
    </div>
</x-app-layout>
