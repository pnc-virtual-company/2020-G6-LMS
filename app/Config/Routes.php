<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('UserController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// view all employee's leave requested.
// create and remove employee's leave request.
$routes->get('/', 'UserController::index', ['filter'=> 'noauth']);
$routes->add('yourLeave', 'YourLeaveController::showYourLeaveRequests', ['filter'=> 'auth']);
$routes->add('addYourLeave', 'YourLeaveController::createYourLeaveRequest');
$routes->add('removeYourLeave/(:num)', 'YourLeaveController::deleteYourLeave/$1');


// view all employee's position.
// create, monify and remove employee's position.
$routes->add('position', 'PositionController::showPosition',['filter'=> 'auth']);
$routes->add('addPosition', 'PositionController::addPosition');
$routes->add('remove/(:num)', 'PositionController::deletePosition/$1');
$routes->add('updatePosition', 'PositionController::updatePosition');


// view all employee's department.
// create, motify and remove empoyee's department.
$routes->add('department', 'DepartmentController::showDepartment',['filter'=> 'auth']);
$routes->add('addDepartment', 'DepartmentController::addDepartment');
$routes->add('removeDepartment/(:num)', 'DepartmentController::deleteDepartment/$1');
$routes->add('updatedDepartment', 'DepartmentController::updateDepartment');


// view all employees.
// create, monify and remove employee.
$routes->add('employee', 'UserController::showUser',['filter'=> 'auth']);
$routes->add('addUser', 'UserController::createUser');
$routes->add('removeUser/(:num)', 'UserController::deleteUser/$1');
$routes->add('updateUser', 'UserController::updateUser');

// view all leave requested.
$routes->add('leave', 'LeaveController::showLeaveView',['filter'=> 'auth']);
$routes->add('email','LeaveController::sendEmailAccept');
$routes->add('email/verify','LeaveController::verify');

// View employee's information.
$routes->add('profile','UserController::profile');

// singin to other employee's email.
$routes->add('logout','UserController::logout');





/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
