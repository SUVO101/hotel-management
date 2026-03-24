<x-filament-panels::page>
    {{-- Page content --}}
     <form wire:submit="save">
        {{ $this->form }}

        <x-filament::button type="submit" style="margin-top: 10px;">
            Save
        </x-filament::button>
    </form>
</x-filament-panels::page>
