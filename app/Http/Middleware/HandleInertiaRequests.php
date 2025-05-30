<?php

namespace App\Http\Middleware;

use App\Enums\FeeStatus;
use App\Http\Resources\UserSingleResoure;
use App\Models\AcademicYear;
use App\Models\Fee;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                // ambil dari resource UserSingleResoure
                'user' => $request->user() ? new UserSingleResoure($request->user()) : null,
            ],
            // utk falsh message global. karena react tdk bisa baca .blade
            'flash_message' => fn() => [ // akan mengirim ke utils.js
                    'type' => $request->session()->get('type'),
                    'message' => $request->session()->get('message'),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],

            'academic_year' => fn() => AcademicYear::query()->where('is_active', true)->first(),

            'checkFee' => fn() => fn() => $request->user() && $request->user()->student // yang pasti dia sudah menjadi mahasiswa
            ? Fee::query()
                ->where('student_id', auth()->user()->student->id)
                ->where('academic_year_id', activeAcademicYear()->id)
                ->where('semester', auth()->user()->student->semester)
                ->where('status', FeeStatus::SUCCESS->value)
            :null
        ];
    }
}
