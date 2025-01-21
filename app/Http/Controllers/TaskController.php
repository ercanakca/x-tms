<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        // Sadece giriş yapmış kullanıcının görevlerini getiriyoruz.
        $tasks = Task::where('user_id', auth()->id())->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // Enum seçeneklerini Blade'e gönderiyoruz.
        $statuses = TaskStatus::cases();

        return view('tasks.create', compact('statuses'));
    }

    public function store(StoreTaskRequest $request)
    {
        // Görev oluşturma işlemi
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->id(), // Giriş yapan kullanıcının ID'si
        ]);

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla oluşturuldu.');
    }

    public function edit(Task $task)
    {
        // Sadece görev sahibi düzenleyebilir
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $statuses = TaskStatus::cases();

        return view('tasks.edit', compact('task', 'statuses'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Sadece görev sahibi güncelleyebilir
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla güncellendi.');
    }

    public function destroy(Task $task)
    {
        // Sadece görev sahibi silebilir
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla silindi.');
    }

}
