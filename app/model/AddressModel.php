
<?php


require_once 'config/db.php';

class AddressModel {
    // address_id,	street,	city,	state	,country,	zipcode,	region	
    public function createAddress($street, $city, $state, $country, $zipcode, $region){
        $sql = "INSERT INTO address (street, city, state, country, zipcode, region) VALUES ('$street', '$city', '$state', '$country', '$zipcode', '$region')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //update address
    public function updateAddress($address_id, $street, $city, $state, $country, $zipcode, $region){
        $sql = "UPDATE address SET street = '$street', city = '$city', state = '$state', country = '$country', zipcode = '$zipcode', region = '$region' WHERE address_id = $address_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

}