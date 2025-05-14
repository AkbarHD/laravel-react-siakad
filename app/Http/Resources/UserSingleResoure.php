<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSingleResoure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar ? Storage::url($this->avatar) : null,
            'roles' => $this->getRoleNames(),
            'roles_name' => $this->getRoleNames()->first(),

            'student' => $this->when($this->hasRole('Student'), [
                // ini relasi student dari user ke student
                'id' => $this->student?->id,
                'student_number' => $this->student?->student_number,
                'batch' => $this->student?->batch,
                'semester' => $this->student?->semester,
                // ini relasi student dari user ke student ke faculty
                'faculty' => [
                    'id' => $this->student?->faculty?->id,
                    'name' => $this->student?->faculty?->name,
                ],
                // ini relasi student dari user ke student ke departmen
                'department' => [
                    'id' => $this->student?->departmen?->id,
                    'name' => $this->student?->departmen?->name,
                ],
                // ini relasi student dari user ke student ke classroom
                'classroom' => [
                    'id' => $this->student?->classroom?->id,
                    'name' => $this->student?->classroom?->name,
                ],
                'fee_group' => [
                    'id' => $this->student?->feeGroup?->id, // pake fee_group juga bisa
                    'group' => $this->student?->feeGroup?->group,
                    'amount' => $this->student?->feeGroup?->amount,
                ],
            ]),
            // teacher
            'teacher' => $this->when($this->hasRole('Teacher'), [
                'id' => $this->teacher?->id,
                'teacher_number' => $this->teacher?->teacher_number,
                'academic_title' => $this->teacher?->academic_title,
                'faculty_id' => $this->teacher?->faculty_id,
                'departmen_id' => $this->teacher?->departmen_id
            ]),
            // operator
            'operator' => $this->when($this->hasRole('Operator'), [
                'id' => $this->operator?->id,
                'employee_number' => $this->operator?->employee_number,
                'faculty_id' => $this->operator?->faculty_id,
                'departmen_id' => $this->operator?->departmen_id
            ]),
        ];
    }
}
