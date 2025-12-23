<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tip;
use App\Models\Resource;
use App\Models\Feedback;

class DashboardAdminController extends Controller
{
    /**
     * Display the admin dashboard with quick links and counts.
     */
    public function index()
    {
        $tipsCount = Tip::count();
        $resourcesCount = Resource::count();
        $feedbackCount = Feedback::count();

        return view('admin.dashboard', compact('tipsCount', 'resourcesCount', 'feedbackCount'));
    }
}
