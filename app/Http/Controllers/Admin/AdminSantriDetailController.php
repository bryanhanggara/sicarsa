<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataSantri;
use Illuminate\View\View;

class AdminSantriDetailController extends Controller
{
    /**
     * Display detailed biodata for admin review.
     */
    public function show(BiodataSantri $biodataSantri): View
    {
        $biodataSantri->load('pendaftaran', 'user');

        return view('admin.santri.show', [
            'biodata' => $biodataSantri,
        ]);
    }
}
