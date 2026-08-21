<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * StudentController
 *
 * Handles the student home page and the (middleware-protected)
 * student profile page.
 *
 * NOTE: Replace the placeholder values in $this->student below with
 * your own real information before submitting this activity.
 */
class StudentController extends Controller
{
    /**
     * Sample student record.
     * TODO: Replace with YOUR actual student information.
     */
    private $student = [
        'student_id'  => 'MCC2023-04207',
        'name'        => 'Nenita Magboo',
        'course'      => 'BSIT',
        'year'        => '3rd Year',
        'section'     => '3-f3',
        'email'       => 'nenita.magboo@student.edu.ph',
        'address'     => 'masipit',
        'contact'     => '0946 514 5821',
        'skills'      => 'Manggagi',
        'bio'         => 'I am a student of MCC and I am currently in my 3rd year of BSIT. I have a passion for technology and programming, and I enjoy learning new skills in the field. In my free time, I like to explore different areas of IT and work on personal projects to enhance my knowledge and experience.',
    ];

    /**
     * GET /student
     * Student home / landing page.
     * Visiting this page grants a temporary "access badge" (session flag)
     * required by StudentMiddleware to view the profile page.
     */
    public function index()
    {
        // Grant access badge for the profile page (Part E custom condition)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['profile_access'] = true;

        $data['name'] = $this->student['name'];
        $data['denied'] = isset($_GET['denied']);

        $this->call->view('student_home', $data);
    }

    /**
     * GET /student/profile
     * Student profile page. Protected by StudentMiddleware.
     */
    public function profile()
    {
        $this->call->view('student_profile', $this->student);
    }
}
