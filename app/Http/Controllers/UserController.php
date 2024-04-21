<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCrudResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $query = User::query();

            $sortField = request("sort_field", 'id');
            $sortDirection = request("sort_direction", 'desc');

            $users = $query->orderBy($sortField, $sortDirection)
                ->paginate(10)
                ->onEachSide(1);

            return view('user.index', [
                'users' => UserCrudResource::collection($users),
                'queryParams' => request()->query() ?: null,
            ]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            return view('user.create');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (Auth::user()->role == 'admin') {
            try {
                $data = $request->validated();

                $data['email_verified_at'] = time();
                $data['password'] = bcrypt($data['password']);

                User::create($data);

                return redirect()->route('user.index')->withSuccess('User stored successfully.');
            } catch (\Exception $e) {
                // Handle the error here
                return back()->withError('An error occurred while storing the user. error: ' . $e->getMessage());
            }
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => new UserCrudResource($user),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (Auth::user()->role == 'admin') {
            return view('user.edit', [
                'user' => new UserCrudResource($user),
            ]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (Auth::user()->role == 'admin') {
            try {
                $data = $request->validated();
                $password = $data['password'] ?? null;
                if ($password) {
                    $data['password'] = bcrypt($password);
                } else {
                    unset($data['password']);
                }
                $user->update($data);

                return redirect()->route('user.index')->withSuccess('User updated successfully.');
            } catch (\Exception $e) {
                // Handle the error here
                return back()->withError('An error occurred while updating the user. error: ' . $e->getMessage());
            }
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->role == 'admin') {
            $name = $user->name;
            $user->delete();

            return redirect()->route('user.index')->withSuccess('User ' . $name . ' deleted successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
