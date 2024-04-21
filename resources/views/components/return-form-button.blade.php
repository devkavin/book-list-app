@props(['can_return' => true, 'borrow' => null])

<form action="{{ route('return.book') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
    <x-secondary-button type="submit" :disabled="!$can_return">Return This Book</x-secondary-button>
</form>
