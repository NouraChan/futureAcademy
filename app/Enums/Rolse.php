<?php

namespace App\Enums;
//   $table->enum('role', ['Admin', 'doctors', 'students'])->nullable();
//   $table->enum('academic_years', ['1', '2', '3', '4', 'graduated'])->nullable();
enum Role: string
{
    case ADMIN = 'Admin';
    case DOCTORS = 'doctors';
    case STUDENTS = 'students';
}

enum AcademicYear: string
{
    case YEAR_1 = '1';
    case YEAR_2 = '2';
    case YEAR_3 = '3';
    case YEAR_4 = '4';
    case GRADUATED = 'graduated';
}
?>