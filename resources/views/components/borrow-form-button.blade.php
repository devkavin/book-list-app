@props(['can_borrow' => true, 'book' => null])

<form action="{{ route('borrow.book') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="book_id" value="{{ $book->id }}">
    <x-primary-button type="submit" :disabled="!$can_borrow">Borrow This Book</x-primary-button>
</form>
