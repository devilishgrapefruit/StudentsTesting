<?php
require_once '../config/login.php';

include '../vendor/autoload.php';
use Nelmio\Alice\Loader\NativeLoader;

class Data {
    public $average_rating_students;
    public $activity_for_year;
    public $students_groups2018;
    public $students_groups2019;
    public $students_groups2020;
    public $students_groups2021;
    public $students_groups2022;
}

$loader = new Nelmio\Alice\Loader\NativeLoader();
$fixtures = $loader->loadFile('fixtures.yml');

?>