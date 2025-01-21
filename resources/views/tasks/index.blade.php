<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Görevler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Başarı Mesajı -->
                    @if (session('success'))
                        <div style="background-color: #d1fae5; border: 1px solid #10b981; color: #065f46; padding: 1rem; border-radius: 0.5rem;">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 1rem; border-radius: 0.5rem;">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <a href="{{ route('tasks.create') }}"
                       class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded mb-4 inline-block">
                        Yeni Görev
                    </a>
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <table class="min-w-full divide-y divide-gray-200 bg-white mx-auto">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Açıklama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durum</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($tasks as $task)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $task->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->status->label() }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                               class="text-blue-600 hover:text-blue-900">
                                                Düzenle
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Görevi silmek istediğinizden emin misiniz?')">
                                                    Sil
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            Henüz görev yok.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
