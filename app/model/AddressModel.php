
<?php


require_once 'config/db.php';

class AddressModel {
    // address_id, address,	street,	city,	state	,country,	zipcode,	region	
    public function createAddressBlank(){
        $sql = "INSERT INTO address (address, street, city, state, country, zipcode, region) VALUES ('', '', '', '', '', '', '')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getAddressId($address){
        $sql = "SELECT address_id FROM address WHERE address = '$address'";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getAddress($address_id){
        $sql = "SELECT * FROM address WHERE address_id = $address_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function updateAddress($address_id, $address, $street, $city, $state, $country, $zipcode, $region){
        $sql = "UPDATE address SET address = '$address', street = '$street', city = '$city', state = '$state', country = '$country', zipcode = '$zipcode', region = '$region' WHERE address_id = $address_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function deleteAddress($address_id){
        $sql = "DELETE FROM address WHERE address_id = $address_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getAddressByUser($user_id){
        $sql = "SELECT * FROM address WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function updateAddressByUser($user_id, $address, $street, $city, $state, $country, $zipcode, $region){
        $sql = "UPDATE address SET address = '$address', street = '$street', city = '$city', state = '$state', country = '$country', zipcode = '$zipcode', region = '$region' WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //create address by user
    public function createAddress($address){
        $sql = "INSERT INTO address (address, street, city, state, country, zipcode, region) VALUES ('$address', '', '', '', '', 0, '')";
        $db = new DB;
        echo $sql;
        $db = $db->query($sql);
        return $db;
    }

    //get lasst address id
    public function getLastAddressId(){
        $sql = "SELECT * FROM address ORDER BY address_id DESC LIMIT 1";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db[0]['address_id'];
    }


}