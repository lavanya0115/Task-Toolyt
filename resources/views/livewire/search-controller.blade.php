<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

    <div class="mb-6">
        <input type="text" placeholder="Search..." wire:model.live.debounce.150ms="search"
            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="overflow-x-auto">
        <table class="w-full bg-white dark:bg-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        User {{ $internalUser ? 'Name' : 'Id' ?? '--' }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email</th>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phone</th>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Address</th>
                    </th>
                </tr>
            </thead>
            <tbody>

                @if (empty($attendances) && count($attendances) == 0)
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">
                            No data available
                        </td>
                    </tr>
                @endif
                @foreach ($attendances as $key => $attendance)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $key + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ ($attendance?->internalUser ? $attendance?->internalUser?->user_name : ($attendance?->externalUser ? $attendance?->externalUser?->user_id : '--')) ?? '--' }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ ($attendance?->internalUser ? $attendance?->internalUser?->email : ($attendance?->externalUser ? $attendance?->externalUser?->email : '--')) ?? '--' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ ($attendance?->internalUser ? $attendance?->internalUser?->phone : ($attendance?->externalUser ? $attendance?->externalUser?->phone_2 : '--')) ?? '--' }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ ($attendance?->internalUser ? $attendance?->internalUser?->address : ($attendance?->externalUser ? $attendance?->externalUser?->address : '--')) ?? '--' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($attendances) > 0)
            <div class="p-3">
                {{ $attendances->links() }}
            </div>
        @endif
    </div>
</div>
