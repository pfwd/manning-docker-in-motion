<?php
session_start();
require_once 'config/dbConnect.php';
require_once 'model/Person.php';
require_once 'modelRepo/personRepo.php';

$showMarketing = getenv('marketing');

$errors = [];
if(isset($_POST['submit'])){

    $isValid = false;
    $firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    if(empty($firstName)){
        $errors['first_name'] = 'Please enter a first name';
    }

    $lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    if(empty($lastName)){
        $errors['last_name'] = 'Please enter a last name';
    }

    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    if(empty($lastName)){
        $errors['age'] = 'Please enter age';
    }

    $description = filter_input(INPUT_POST, 'description');

    if(count($errors) < 1){
        $isValid = true;
    }

    if($isValid){
        // Make a connection
        $db = dbConnect(DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST, DB_PORT);
        $person = new Person();
        $person->setAge($age)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setDescription($description)
            ;

        $person = dbPersonInsert($db, $person);
        if($person instanceof Person){
            $_SESSION['alert_message'] = 'Message saved';
            $_SESSION['alert_status'] = 'success';
            header("Location: /index.php");
            exit;
        }
    }

}

?>
<html>
<head>
    <title>Docker In Motion - Peter Fisher | List of records</title>
    <?php require_once 'templates/meta/meta.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php
if ($showMarketing):
    require_once 'templates/marketing/header.php';
endif;
?>
<div id="container">
    <header id="container-head">
        <h1>Docker In Motion</h1>
        <p>By <a href="http://peterfisher.me.uk">Peter Fisher</a</p>
    </header>

    <div class="row" id="container-content">
        <aside id="sidebar" class="col _25">
            <ul>
                <li><a class="btn" target="_blank"  href="http://bit.ly/2vvz2sA">Docker In Motion</a></li>
                <li><a class="btn" target="_blank" href="https://github.com/pfwd/manning-docker-in-motion">GitHub Repo</a></li>
                <li><a class="btn" target="_blank" href="https://hub.docker.com/r/howtocodewell/manning-webserver-01/">Docker Hub | Web server</a></li>
                <li><a class="btn" target="_blank" href="https://hub.docker.com/r/howtocodewell/manning-database-server-01/">Docker Hub | Database server</a></li>
                <li><a class="btn" target="_blank" href="https://forums.manning.com/forums/docker-in-motion">Docker In Motion Forum</a></li>
                <li><a class="btn" target="_blank"  href="https://www.youtube.com/user/howtocodewell">HowToCodeWell YouTube channel</a></li>
            </ul>
        </aside>
        <section id="main-content" class="col _55">
            <div class="row">
                <h1 class="col _55">Insert a person</h1>
                <a href="/" class="col btn btn-right">View List</a>
            </div>


            <form name="person-insert" action="/insert.php" method="post">
                <fieldset>
                    <?php
                    if(count($errors) > 0): ?>
                        <div class="alert-box alert-error">
                            <h3>Errors found</h3>
                            <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="row input-row">
                        <label for="first_name" class="col">First Name</label>
                        <input type="text" name="first_name" class="col _25 <?php echo (isset($errors['first_name'])) ? 'error' : ''; ?> " />
                    </div>

                    <div class="row input-row">
                        <label for="last_name" class="col">Last Name</label>
                        <input type="text" name="last_name"  class="col _25 <?php echo (isset($errors['last_name'])) ? 'error': ''; ?> "/>
                    </div>

                    <div class="row input-row">
                        <label for="age" class="col">Age</label>
                        <input type="number" name="age" class="col _25 <?php echo (isset($errors['age'])) ? 'error': ''; ?> " />
                    </div>
                    <div class="row input-row">
                        <label for="age" class="col">Description</label>
                        <textarea name="description" class="col _25"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-right">Save</button>

                </fieldset>
            </form>



        </section>
    </div>
    <hr />
    <p><a href="http://bit.ly/2vvz2sA">Docker In Motion</a> by <a href="http://peterfisher.me.uk">Peter Fisher</a></p>
</div>
</body>
</html>