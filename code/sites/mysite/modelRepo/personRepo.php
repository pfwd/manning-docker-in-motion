<?php
/**
 * Insert Person
 * @param $db  mysqli
 * @param $person Person
 * @throws Exception Cannot insert record
 * @return Person
 */
function dbPersonInsert($db, Person $person){

    $sql = "INSERT INTO `person` ";
    $sql.= " (`first_name`,`last_name`, `description`, `age` ) VALUES ";
    $sql.= "(";
    $sql.= "'" . $person->getFirstName() . "',";
    $sql.= "'" . $person->getLastName() . "',";
    $sql.= "'" . $person->getDescription() . "',";
    $sql.= "'" . $person->getAge() . "'";
    $sql.=") ";
    $sql.=";";

    $result = $db->query($sql);

    if(!$result){
        throw new Exception('Cannot insert person');
    }

    $person->setId($db->insert_id);

    return $person;

}

/**
 * Find all person records
 * @param $db mysqli
 * @return array Array of results
 */
function dbPersonFindAll($db){
    $data = [
        'num_rows' => 0,
        'results' => []
    ];

    $sql = "SELECT * FROM person;";

    $result =  $db->query($sql);

    if($result) {
        $data['num_rows'] = $result->num_rows;
        while ($row = $result->fetch_assoc()) {
            $person = new Person();
            $person->setId($row['id'])
                ->setAge($row['age'])
                ->setLastName($row['last_name'])
                ->setFirstName($row['first_name'])
                ->setDescription($row['description'])
            ;
            $data['results'][] = $person;
        }
    }

    return $data;

}


/**
 * Deletes a person record
 * @param $db mysqli
 * @param $id int
 * @return array Array of results
 */
function dbPersonDelete($db, $id){


    $sql = "DELETE FROM `person` WHERE id ='". $id ."';";

    $result =  $db->query($sql);

    return $result;

}