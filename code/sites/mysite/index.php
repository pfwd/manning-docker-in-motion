<?php
require_once 'config/dbConnect.php';
require_once 'model/Person.php';
require_once 'modelRepo/personRepo.php';

// Make a connection
//$db = dbConnect(DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST);

// Get the list of results
//$result = dbPersonFindAll($db);

$person1 = new Person();
$person1->setFirstName('Peter')
    ->setLastName('Fisher')
    ->setAge(33)
    ->setDescription('Freelance Web Developer and Author of Docker In Motion')
    ;

$person2 = new Person();
$person2->setFirstName('Jane')
    ->setLastName('Fletcher')
    ->setAge(32)
    ->setDescription('Lead Web Developer')
;

$person3 = new Person();
$person3->setFirstName('Vince')
    ->setLastName('Smith')
    ->setAge(38)
    ->setDescription('Junior Frontend Web Developer')
;

$person4 = new Person();
$person4->setFirstName('Jessica')
    ->setLastName('Dingle')
    ->setAge(27)
    ->setDescription('Operations Manager')
;
$result['num_rows'] = 4;
$result['results'] = [$person1, $person2, $person3, $person4];
?>
<html>
    <head>
        <title>Docker In Motion - Peter Fisher | List of records</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
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
                    <h1>List of people</h1>
                </div>
                <a href="/insert.php" class="btn btn-right">Add a person</a>

                <?php
                $plural = 's';
                if($result['num_rows'] == 1){
                    $plural = '';
                }
                ?>
                <p><?php echo $result['num_rows'];?> record<?php echo $plural; ?> found</p>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Description</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($result['num_rows'] > 0):
                            $items = $result['results'];

                            /* @var $person Person */
                            foreach ($items as $person): ?>
                                <tr>
                                    <td><?php echo $person->getId(); ?></td>
                                    <td><?php echo $person->getFirstName(); ?></td>
                                    <td><?php echo $person->getLastName(); ?></td>
                                    <td><?php echo $person->getDescription(); ?></td>
                                    <td><?php echo $person->getAge(); ?></td>
                                </tr>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="5">
                                    No records found
                                </td>
                            </tr>

                            <?php endif; ?>
                    </tbody>
                </table>
                <a href="/insert.php" class="btn btn-right">Add a person</a>
            </section>
        </div>
        <hr />
        <p><a href="http://bit.ly/2vvz2sA">Docker In Motion</a> by <a href="http://peterfisher.me.uk">Peter Fisher</a></p>
    </div>
    </body>
</html>