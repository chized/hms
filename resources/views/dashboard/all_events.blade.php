@include('partials.header')
<!-- Admin Panel -->
<style>
       .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        @media only screen and (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
            }

            th {
                text-align: left;
            }
        }

        h1{
            margin:10px;
        }
        
        a {
            margin:10px;
        }
    </style>
<div>
    <h1>Events</h1>

    <!-- Add Event Button -->
    <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>

    <!-- Event Table -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date and Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->date_and_time }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                        
                        <!-- Delete Button (You should confirm the deletion via JavaScript or a confirmation page) -->
                        <form method="POST" action="{{ route('events.destroy', $event->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('partials.footer')
