
@include('partials.header')
@if(session('error'))
    <div class="error-alert">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="success-alert">
        {{ session('success') }}
    </div>
@endif
    <section>
        <div class="jumbotron">
            <div class="image-carousel">
                <div class="image"><img src="images/class.JPG" alt="Jumbotron Image 1"></div>
                <div class="image"><img src="images/grad.JPG" alt="Jumbotron Image 2"></div>
                <div class="image"><img src="images/teacher_class.JPG" alt="Jumbotron Image 3"></div>
            </div>
            <h1>Welcome to Heritage Model School!</h1>
        </div>

        <h2>Student Achievements</h2>
        <div class="feedback-container">
            <div class="feedback-card">
                <img src="https://via.placeholder.com/300" alt="Student of the Month">
                <h3>Student of the Month</h3>
                <p>Congratulations to [Student Name] for being the Student of the Month! Your hard work and dedication are truly commendable.</p>
            </div>
            <div class="feedback-card">
                <img src="https://via.placeholder.com/300" alt="Science Fair Winners">
                <h3>Science Fair Winners</h3>
                <p>Congratulations to our young scientists for their outstanding projects at the annual Science Fair. We are proud of your creativity and curiosity.</p>
            </div>
            <div class="feedback-card">
                <img src="https://via.placeholder.com/300" alt="Cultural Day">
                <h3>Cultural Day</h3>
                <p>Get ready for our upcoming Cultural Day event! Join us for a day of fun, diversity, and cultural exploration.</p>
            </div>
        </div>
    </section>

    <section>
        <h2>Upcoming Events</h2>
        <ul>
            <li>Open House - Date: [Insert Date]</li>
            <li>Field Trip to [Location] - Date: [Insert Date]</li>
            <li>Parent-Teacher Conference - Date: [Insert Date]</li>
        </ul>
    </section>
    @include('partials.footer');