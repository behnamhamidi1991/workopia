<?php 

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class ListingController {

    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
  
    public function index() {

        inspectAndDie((Validation::string('')));
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }
  
    public function create() {
        loadView('listings/create');
    }

    public function show() {
        $id = $_GET['id'] ?? '';

            $params = [
                'id' => $id
            ];
            
            $listing = $this->db->query("SELECT * FROM listings WHERE id = :id", $params)->fetch();

            loadView('listings/show', [
                'listing' => $listing
            ]);
        }
}