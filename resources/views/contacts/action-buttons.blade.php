{{-- Action Buttons --}}



@if ($contact->deleted_at)
    <form class="flex gap-2" action="{{ route('contacts.forceDelete', $contact) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <button
            class=" px-2 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            type="submit" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Force Delete') }}</button>
    </form>
    <form class="flex gap-2" action="{{ route('contacts.restore', $contact) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <button
            class=" px-2 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            type="submit" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Restore') }}</button>
    </form>
@else
    <form class="flex gap-2" action="{{ route('contacts.destroy', $contact) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        @if ($show)
            <a class=" px-2 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ route('contacts.show', $contact) }}">{{ __('Show') }}</a>
        @endif
        <a class=" px-2 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ route('contacts.edit', $contact) }}">{{ __('Edit') }}</a>
        <button
            class=" px-2 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            type="submit" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
    </form>
@endif



{{-- Action Buttons --}}
