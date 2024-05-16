<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Historique;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function fetchUsers()
    {
        $users = User::all();

        $currentWeek = Carbon::now()->week;

        foreach ($users as $user) {
            $userWeek = Carbon::parse($user->created_at)->week;

            if ($currentWeek === $userWeek) {
                $user->status = 'Nouveau';
            } elseif ($currentWeek - $userWeek === 1) {
                $user->status = 'Récent';
            } else {
                $user->status = 'Ancien';
            }

        }

        return response()->json(['users' => $users]);
    }

    public function deleteUser(Request $request, $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
        $name = $user->name;
        $email = $user->email;
        $adminId = auth()->user()->id;
        $user->delete();
        Historique::create([
            'action' => 'delete_user',
            'details' => "Admin a supprimé l'utilisateur $name qui a l'email $email avec l'ID: $id",
            'admins_id' => $adminsId,
        ]);
        return response()->json(['message' => 'Utilisateur supprimé avec succès.']);

    }
    public function create(Request $request,$id)
    {
        $user = User::find($id);
        $userStatus = $request->input('userStatus');

        $modalContent = view('includes.contente' ,['user' => $user,'userStatus' => $userStatus])->render();

        return response()->json([
            'status' => 'success',
            'modalContent' => $modalContent,
        ]);
    }
    public function filterUsers(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');

    // Debugging
    \Log::info('Name: ' . $name);
    \Log::info('Email: ' . $email);
    $query = User::query();

    if ($name) {
        $query->where('name', 'like', '%' . $name . '%');
    }

    if ($email) {
        $query->where('email', 'like', '%' . $email . '%');
    }
    $filteredUsers = $query->get();

    \Log::info('Filtered Users: ', $filteredUsers->toArray());

    return response()->json(['users' => $filteredUsers]);
    Historique::create([
        'action' => 'filter_users',
        'details' => 'Admin filtered users with name: ' . $name . ' and email: ' . $email,
    ]);

}

private function calculateUserStatus($userRegistrationDate, $currentWeekStart, $currentWeekEnd)
{
    $registrationDate = Carbon::parse($userRegistrationDate);

    if ($registrationDate->between($currentWeekStart, $currentWeekEnd)) {
        return 'Nouveau';
    } elseif ($registrationDate->greaterThan($currentWeekStart->subWeeks(2)) && $registrationDate->lessThanOrEqualTo($currentWeekStart)) {
        return 'Récent';
    } else {
        return 'Ancien';
    }
}
}
