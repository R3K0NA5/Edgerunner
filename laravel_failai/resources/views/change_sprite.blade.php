<form method="POST" action="{{ route('change.sprite') }}">
    @csrf
    <label for="sprite_id">Select your new sprite:</label>
    <select name="sprite_id" id="sprite_id">
        @foreach ($sprites as $sprite)
            <option value="{{ $sprite->id }}">{{ $sprite->description }}</option>
        @endforeach
    </select>
    <button type="submit">Change Sprite</button>
</form>
