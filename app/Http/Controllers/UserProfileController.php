<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserProfileController
{
    public function show(Request $request): string
    {
        $profileName = '';

        // Check if the current request has a route
        if ($request->route()) {
            // Check if the route is named 'profile'
            if ($request->route()->named('profile')) {
                $profileName = 'John Doe';
            }
        }

        // Use the profileName variable to construct the response
        return 'This is the user profile for ' . $profileName;
    }


}
