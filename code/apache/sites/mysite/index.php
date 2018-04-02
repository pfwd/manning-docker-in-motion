<?php
session_start();

require_once 'config/dbConnect.php';
require_once 'model/Person.php';
require_once 'modelRepo/personRepo.php';

// Make a connection
$db = dbConnect(DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST, DB_PORT);

// Delete record
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if($id){
    $result = dbPersonDelete($db, $id);
    if($result){
        $_SESSION['alert_message'] = 'Record has been deleted';
        $_SESSION['alert_status'] = 'success';
    }
}

// Get the list of results
$result = dbPersonFindAll($db);

$showMarketing = getenv('marketing');

?>
<html>
    <head>
        <title>Docker In Motion - Peter Fisher | List of records</title>
        <?php require_once 'templates/meta/meta.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript">
            function deleteRecord(){
                var val = confirm('Are you sure you want to delete this record?');
                if(val){
                   return true;
                }else{
                    return false;
                }
            }
        </script>
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
                <?php
                $status = (isset($_SESSION['alert_status'])) ? $_SESSION['alert_status'] : '';
                $message = (isset($_SESSION['alert_message'])) ? $_SESSION['alert_message'] : '';
                unset($_SESSION['alert_message']);
                unset($_SESSION['alert_status']);

                if(!empty($status) && !empty($message) ): ?>
                    <div class="alert-box alert-<?php echo $status; ?>">
                        <h3><?php echo $message; ?></h3>
                    </div>
                <?php endif; ?>

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
                            <th>Action</th>
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
                                    <td>
                                        <a class="btn btn-delete" href="/index.php?id=<?php echo $person->getId(); ?>" onclick="return deleteRecord()">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="6">
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

    <?php
    if ($showMarketing):
        require_once 'templates/marketing/overlay.php';
    endif;
    ?>
    </body>
</html>
