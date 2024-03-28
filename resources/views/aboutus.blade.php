@include('partials.header')
    <style>
   /*      body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        } */

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #3498db; /* Blue heading color */
        }

        p {
            margin-bottom: 20px;
        }
    </style>
   <div class="container">
        <h1>About Us</h1>

        <section>
            <h2>Vision</h2>
            <p>
                Our vision is to provide quality education that empowers students to become responsible and successful individuals in society.
            </p>
        </section>

        <section>
            <h2>Mission</h2>
            <p>
                Our mission is to foster a dynamic learning environment that nurtures creativity, critical thinking, and lifelong learning skills in our students.
            </p>
        </section>

        <section>
            <h2>Motto</h2>
            <p>
                "Inspiring Minds, Shaping Futures."
            </p>
        </section>

        <section>
            <h2>About the Curriculum</h2>
            <p>
                Our curriculum is designed to provide a well-rounded education, combining academic excellence with extracurricular activities to ensure the holistic development of each student.
            </p>
        </section>
    </div>
@include('partials.footer')
