<?php

require(ROOT . "model/StudentModel.php");

function index()
{
	render("student/index", array(
		'students' => getAllStudents()
	));
}

function create()
{
	//formulier tonen
	render("student/create");
}

function createSave()
{

	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['gender'])) {
		createStudent($_POST['firstname'], $_POST['lastname'], $_POST['gender']);
	}

	header("Location:" . URL . "student/index");
}

function edit()
{
	//$student = getStudent();

	// getStudent(1);

	render("student/edit");	
}

function editSave()
{
	
} 

function delete($id)
{
	if (isset($id)) {
		deleteStudent($id);
	}

	header("Location:" . URL . "student/index");
}