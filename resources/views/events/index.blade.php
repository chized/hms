<!-- resources/views/events/index.blade.php -->

@include('partials.header')

<style>
      /* body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 20px;
    }
 */
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    h1 {
        color: #3498db;
    }

    h2 {
        color: #3498db;
    }

    p {
        margin-bottom: 20px;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    /* Mobile-first responsive design */
    @media only screen and (max-width: 600px) {
        body {
            padding: 10px;
        }

        h1 {
            font-size: 24px;
        }

        h2 {
            font-size: 20px;
        }

        p {
            font-size: 16px;
        }

        .container {
            max-width: 100%;
        }
    }
    </style>
   <div class="container">
    <h1>Events</h1>

    @foreach($events as $event)
    <div>
            <h2>{{ $event->title }}</h2>
            <p>{{ $event->description }}</p>
            <p>Date and Time: {{ $event->date_and_time }}</p>
            <p>Location: {{ $event->location }}</p>

            {{-- Display the image or use a placeholder if image_url is not available --}}
            @if ($event->image_url)
                <img src="{{ $event->image_url }}" alt="{{ $event->title }}" style="max-width: 100%; height: auto;">
            @else
                <img src="{{ asset('images/placeholder.jpg') }}" alt="Placeholder Image" style="max-width: 100%; height: auto;">
            @endif

            {{-- Add a "Read More" link to the single event page --}}
            <a href="{{ route('events.show', $event->id) }}">Read More</a>
        </div>
    
    @endforeach
    </div>
@include('partials.footer')