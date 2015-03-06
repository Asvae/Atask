<?php namespace Laravel_test\Http\Controllers;

use Laravel_test\Http\Requests;
use Laravel_test\Http\Controllers\Controller;

use Laravel_test\Http\Requests\TaskRequest;
use Laravel_test\User;
use Request;
use Laravel_test\Task;

class TasksController extends Controller {


    /**
     *
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show all tasks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show a single article
     *
     * @param Task $task
     *
     * @return \Illuminate\View\View
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Save a new task
     *
     * @param TaskRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TaskRequest $request)
    {

        $task = new Task($request->all());

        \Auth::user()->tasks()->save($task);

        return redirect('tasks');
    }


    /**
     * Edit an existing task
     *
     * @param Task $task
     * @return \Illuminate\View\View
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Updates task
     *
     * @param Task        $task
     * @param TaskRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->all());

        return redirect('tasks');
    }

    /**
     * Destroys task
     *
     * @param Task $task
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('tasks/db');
    }

    /**
     * <TEMPORARY>
     * Shows users and tasks from db
     *
     * @return \Illuminate\View\View
     */
    public function showAll()
    {
        $data = [
            'tasks' => Task::all(),
            'users' => User::all()
        ];

        return view('tasks.showAll', compact('data'));
    }
}
