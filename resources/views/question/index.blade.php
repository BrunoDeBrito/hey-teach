<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('My Questions') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form :action="route('question.store')">
            <x-textarea label="Question" name="question"/>

            <x-btn.primary>Save</x-btn.primary>
            <x-btn.reset>Cancel</x-btn.reset>
        </x-form>

        <hr class="border-gray-700 border-dashed my-4">

        <div class="dark:text-gray-400 uppercase font-bold mb-1">
            Drafts
        </div>

        <div class="dark:text-gray-400 space-y-4">
            @if($questions->where('draft', true)->count() > 0)
                <x-table>
                    <x-table.thead>
                        <tr>
                            <x-table.th>Question</x-table.th>
                            <x-table.th>Actions</x-table.th>
                        </tr>
                    </x-table.thead>
                    <tbody>
                    @foreach($questions->where('draft', true) as $item)
                        <x-table.tr>
                            <x-table.td>{{ $item->question }}</x-table.td>
                            <x-table.td>
                                <x-form :action="route('question.destroy', $item)" delete>
                                    <button type="submit" class="hover:underline text-blue-500" title="Delete">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-red-700" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16"
                                             stroke="red">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2
                                                  1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1
                                                  1 0 0 1 1-1Z"
                                            />
                                        </svg>
                                    </button>
                                </x-form>

                                <x-form :action="route('question.publish', $item)" put>
                                    <button type="submit" class="hover:underline text-blue-500" title="Publish">
                                        <svg class="w-6 h-6 dark:text-green-700" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2
                                                  2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0
                                                  1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0
                                                  1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2
                                                  2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0
                                                  2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2
                                                  2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z">
                                            </path>
                                        </svg>
                                    </button>
                                </x-form>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                    </tbody>
                </x-table>
            @else
                <div
                    class="flex flex-col items-center justify-center p-8 text-center bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1
                              1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400">No draft questions found</p>
                    <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">Create your first question above</p>
                </div>
            @endif
        </div>

        <hr class="border-gray-700 border-dashed my-4">

        <div class="dark:text-gray-400 uppercase font-bold mb-1">
            My Questions
        </div>

        <div class="dark:text-gray-400 space-y-4">
            @if($questions->where('draft', false)->count() > 0)
                <x-table>
                    <x-table.thead>
                        <tr>
                            <x-table.th>Question</x-table.th>
                            <x-table.th>Actions</x-table.th>
                        </tr>
                    </x-table.thead>
                    <tbody>
                    @foreach($questions->where('draft', false) as $question)
                        <x-table.tr>
                            <x-table.td>{{ $question->question }}</x-table.td>
                            <x-table.td>
                                <x-form :action="route('question.destroy', $question)" delete title="Delete">
                                    <button type="submit" class="hover:underline text-blue-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-red-700" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16"
                                             stroke="red">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2
                                                  1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1
                                                  1 0 0 1 1-1Z"
                                            />
                                        </svg>
                                    </button>
                                </x-form>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                    </tbody>
                </x-table>
            @else
                <div
                    class="flex flex-col items-center justify-center p-8 text-center
                        bg-gray-50 dark:bg-gray-800 rounded-lg border
                        border-gray-200 dark:border-gray-700"
                >
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278
                                2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21
                                12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400">No published questions yet</p>
                    <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">Publish a draft to see it here</p>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>
