<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('header.message.hey_teach') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form post :action="route('question.store')">
            <x-textarea label="Question" name="question"/>

            <x-btn.primary>{{ __('btn.action.save') }}</x-btn.primary>
            <x-btn.reset>{{ __('btn.action.cancel') }}</x-btn.reset>
        </x-form>
    </x-container>
</x-app-layout>
