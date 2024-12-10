<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contact Details') }}
            </h2>
            <a class=" px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ route('contacts.index') }}">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="mx-auto sm:px-4 lg:px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">

                    {{-- Main Content --}}
                    <div>

                        <!-- Name -->
                        <div class="mt-2">
                            <x-input-label for="name" :value="__('Name')" />
                            <input
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                type="text" id="name" name="name" value="{{ old('name', $contact->name) }}"
                                required readonly />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Name -->

                        <!-- Surname -->
                        <div class="mt-2">
                            <x-input-label for="surname" :value="__('Surname')" />
                            <input
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                type="text" id="surname" name="surname"
                                value="{{ old('surname', $contact->surname) }}" required readonly />
                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>
                        <!-- Surname -->

                        <!-- Email -->
                        <div class="mt-2">
                            <x-input-label for="email" :value="__('Email')" />
                            <input
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                type="email" id="email" name="email" value="{{ old('email', $contact->email) }}"
                                required readonly />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Email -->

                        <!-- Phone -->
                        <div class="mt-2">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <input
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}"
                                required readonly />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <!-- Phone -->

                        <!-- Address -->
                        <div class="mt-2">
                            <x-input-label for="address" :value="__('Address')" />
                            <input
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                type="text" id="address" name="address"
                                value="{{ old('address', $contact->address) }}" required readonly />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <!-- Address -->
                        
                        {{-- Action Buttons --}}
                        <div class="mt-4">
                            @includeIf('contacts.action-buttons', ['show' => false])
                        </div>

                        {{-- Action Buttons --}}

                    </div>
                    {{-- Main Content --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
