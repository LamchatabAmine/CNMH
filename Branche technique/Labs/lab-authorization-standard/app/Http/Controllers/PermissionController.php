<?php

namespace App\Http\Controllers;

use PermissionHelper;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {


    //app/Helpers/




    // public function index() {
    //     dd(PermissionHelper::generatePermissions());
    // }

    // function createPermissionsForController(array $permissions): void {
    //     // dd($permission);
    //     foreach($permissions as $permission) {
    //         if(Permission::where('name', $permission)->doesntExist()) {
    //             Permission::create(['name' => $permission]);
    //         }
    //     }
    // }




    /*
        public function generatePermissions(): array
        {
            $controllers = $this->getFilteredControllerNames();

            return array_map([$this, 'formatPermission'], $controllers);
        }

        protected function getFilteredControllerNames(): array
        {
            return array_filter($this->extractControllerNames(), [$this, 'isValidController']);
        }

        protected function extractControllerNames(): array
        {
            return array_map([$this, 'getControllerNameFromRoute'], Route::getRoutes()->getRoutes());
        }

        protected function getControllerNameFromRoute($route): ?string
        {
            $action = $route->getAction();

            return $action['controller'] ?? null;
        }

        protected function isValidController(?string $fullControllerName): bool
        {
            return $fullControllerName
                && strpos($fullControllerName, 'App\Http\Controllers\\') === 0
                && strpos($fullControllerName, 'App\Http\Controllers\Auth\\') !== 0;
        }

        protected function formatPermission(string $fullControllerName): string
        {
            $controllerName = class_basename($fullControllerName);
            $segments = explode('@', $controllerName);
            $segments = array_map('ucfirst', $segments);

            return implode('-', $segments);
        }

    */




























    /*

        public function GeneratePermissions(): array {
            $controllers = $this->extractControllerNames();

            $permissions = [];

            foreach($controllers as $controller) {
                //dd($controller); // output : PermissionController@GeneratePermissions
                $permission = str_replace(['Controller', '@'], ['', '-'], $controller);
                //dd($permission); // output : Permission-GeneratePermissions
                $permission = implode('-', array_reverse(explode('-', $permission)));
                //dd($permission); // output : GeneratePermissions-Permission
                $permissions[] = $permission;
            }


            foreach($permissions as $permission) {
                $this->createPermissionsForController($permission);
            }

            return $permissions;
        }




        function extractControllerNames(): array {
            $extractControllerNames = [];

            // Loop through all routes
            foreach(Route::getRoutes() as $route) {
                $action = $route->getAction();

                // Check if the route has a controller key in its action
                if(array_key_exists('controller', $action)) {
                    $fullControllerName = $action['controller'];

                    // Check if the controller is in the correct namespace and does not belong to Auth namespace
                    if(
                        strpos($fullControllerName, 'App\Http\Controllers\\') === 0 &&
                        strpos($fullControllerName, 'App\Http\Controllers\Auth\\') !== 0
                    ) {
                        // Extract the controller name without the namespace
                        $extractControllerNames[] = str_replace('App\Http\Controllers\\', '', $fullControllerName);
                    }
                }
            }

            return $extractControllerNames;
        }


        private function createPermissionsForController(string $permission): void {
            // dd($permission);
            if(Permission::where('name', $permission)->doesntExist()) {
                // dd($permission);
                Permission::create(['name' => $permission]);
            }
        }

    */
}
