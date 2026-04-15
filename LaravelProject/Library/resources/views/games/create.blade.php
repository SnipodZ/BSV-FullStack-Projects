 <div>
    <form action="{{route('games.store')}}" method="POST">
        @csrf
        <label for="name">Title:</label>
        <input class="@error('name') @enderror" type="text" id="name" name="name"><br><br>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="description">Description:</label>
        <input class="@error('description') @enderror" type="comment" id="description" name="description"><br><br>
         @error('description')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="length">Length:</label>
        <input class="@error('length') @enderror "type="number" step="any" id="length" name="length"><br><br>
         @error('length')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="release_date">Release Date:</label>
        <input class="@error('release_date') @enderror" type="date" id="release_date" name="release_date"><br><br>
         @error('release_date')
            <div class="error">{{ $message }}</div>
        @enderror
        <label class="@error('genre_id') @enderror"for="genre_id">Genre:</label>
        <select id="genre_id" name="genre_id">
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }} - {{ $genre->subgenre }}</option>
            @endforeach
        </select><br><br>
         @error('genre_id')
            <div class="error">{{ $message }}</div>
        @enderror
        <label class="@error('publisher_id') @enderror"for="publisher_id">Publisher:</label>
        <select id="publisher_id" name="publisher_id">
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select><br><br>
         @error('publisher_id')
            <div class="error">{{ $message }}</div>
        @enderror
        <button type="submit">Create Game</button>
    </form>
 </div>