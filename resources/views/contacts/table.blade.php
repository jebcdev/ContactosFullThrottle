<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-1 text-left">
                    ID
                </th>
                <th scope="col" class="px-2 py-1 text-center">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="px-2 py-1 text-center">
                    {{ __('Surname') }}
                </th>
                <th scope="col" class="px-2 py-1 text-center">
                    {{ __('Email') }}
                </th>
                <th scope="col" class="px-2 py-1 text-center">
                    {{ __('Phone') }}
                </th>
                <th scope="col" class="px-2 py-1 text-center">
                    {{ __('Address') }}
                </th>
                <th scope="col" class="px-2 py-1 text-right">
                    {{ __('Actions') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                        {{ $contact->id }}
                    </th>
                    <td class="px-4 py-2 text-center">
                        {{ $contact->name }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        {{ $contact->surname }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        @if ($contact->deleted_at)
                            
                                <span class="bg-red-950 p-1 rounded-xl">{{ $contact->email }}</span>
                            @else
                            {{ $contact->email }}    
                            
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center">
                        {{ $contact->phone }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        {{ $contact->address }}
                    </td>
                    <td class="px-4 py-2 text-right">
                        @includeIf('contacts.action-buttons', ['show' => true])
                    </td>
                </tr>
            @empty

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left"
                        colspan="7">
                        {{ __('No contacts found') }}
                    </td>
                </tr>
            @endforelse


        </tbody>
    </table>

    <div class="mt-2 text-center">
        {{ $contacts->links() }}
    </div>
</div>
