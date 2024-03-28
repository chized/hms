<!-- resources/views/events/create.blade.php -->


@include('partials.header')
    <h1>Create Event</h1>

    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>

            <label for="date_and_time">Date and Time:</label>
            <input type="datetime-local" name="date_and_time" required>

            <label for="location">Location:</label>
            <input type="text" name="location" required>

            {{-- Image Uploads --}}
            <label for="images">Upload Images:</label>
            <input type="file" name="images[]" accept="image/*" multiple required>

            {{-- Designate Primary Image --}}
            <label for="primary_image">Select Primary Image:</label>
            <select name="primary_image">
                @foreach ($uploadedImages as $image)
                    <option value="{{ $image->id }}">{{ $image->name }}</option>
                @endforeach
            </select>

            <button type="submit">Create Event</button>
        </form>

    @include('partials.footer')
