<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yeni Görev Oluştur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Görev Adı</label>
                            <input type="text" id="name" name="name" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('name') }}" >
                            @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Açıklama</label>
                            <textarea id="description" name="description" rows="4" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Durum</label>
                            <select id="status" name="status" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                                @foreach($statuses as $status)
                                    <option value="{{ $status->value }}" {{ old('status') === $status->value ? 'selected' : '' }}>
                                        {{ $status->label() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                Kaydet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
