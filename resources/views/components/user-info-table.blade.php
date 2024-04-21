<div class="grid gap-1 grid-cols-2">
    <div>
        <div>
            <label class="font-bold text-lg">User ID</label>
            <p class="mt-1">{{ $user->id }}</p>
        </div>
        <div class="mt-4">
            <label class="font-bold text-lg">User Name</label>
            <p class="mt-1">{{ $user->name }}</p>
        </div>
        <div class="mt-4">
            <label class="font-bold text-lg">User Email</label>
            <p class="mt-1">{{ $user->email }}</p>
        </div>
        <div class="mt-4">
            <label class="font-bold text-lg">Access Level</label>
            <p class="mt-1">{{ $user->role }}</p>
        </div>
        <div class="mt-4">
            <label class="font-bold text-lg">Created At</label>
            <p class="mt-1">{{ $user->created_at }}</p>
        </div>
        <div class="mt-4">
            <label class="font-bold text-lg">Updated At</label>
            <p class="mt-1">{{ $user->updated_at }}</p>
        </div>
    </div>
    <div>
        <div>
            <label class="font-bold text-lg">Total Borrows</label>
            <p class="mt-1">{{ $user->borrowedBooks->count() }}</p>
        </div>
        <div class="mt-4">
            <label class="font-bold text-lg">Pending Returns</label>
            <p class="mt-1">{{ $user->borrowedBooks->where('returned_at', null)->count() }}</p>
        </div>
    </div>
</div>
