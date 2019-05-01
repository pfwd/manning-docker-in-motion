<div id="overlay">
    <div id="overlay-content">
        <header>
            <a href="javascript:off()" class="close">Close</a>
        </header>

        <h1>Docker in Motion</h1>
        <p>Learn how to build, manage and run your application in Docker containers</p>
        <div class="">

        </div>
        <div class="copy">
            <p>With over 2 hours of hands-on, practical video lessons, you'll learn the ins and outs of Docker and discover how to apply what you've learned to your own day-to-day development. </p>
        </div>
        <div class="hide-mobile what-you-will-learn">
            <h2>What you will learn</h2>
            <ul>
                <li>An introduction to Docker and how it works</li>
                <li>Image management</li>
                <li>Creating Docker images</li>
                <li>Managing containers</li>
                <li>Storing and managing data in volumes</li>
                <li>Linking your Docker containers</li>
                <li>Running a web server which is connected to a database</li>
                <li>Configuring containers using docker-compose</li>
            </ul>
        </div>

            <div class="iframe-container">
                <iframe src="https://www.youtube.com/embed/hvSsG3yWrqc?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        <div class="img-thumb">
            <p>Use code: <strong>ytfisher</strong> to get <strong>40% off</strong></p>
            <div class="btn-row">
                <a href="http://bit.ly/2vvz2sA" class="btn">Get Docker in Motion</a>
            </div>
        </div>
    </div>
</div>

<script>

    function on() {

        if (typeof(Storage) !== "undefined") {
            var hasShown = localStorage.getItem("shown_overlay");
            if(hasShown !== 'yes'){
                document.getElementById("overlay").style.display = "block";
            }
        } else {

            document.getElementById("overlay").style.display = "block";
        }

    }

    function off() {
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem("shown_overlay", "yes");
        } else {
            // Sorry! No Web Storage support..
        }

        document.getElementById("overlay").style.display = "none";
    }

    on()
</script>