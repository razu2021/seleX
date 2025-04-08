<?php

namespace App\Exports\ExportData;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection , WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all();
    }

    // inlcuded heading 

    // Correct headings method
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Name',         // 2nd column heading
            'Title',        // 3rd column heading
            'Description',  // 4th column heading
            'Slug',         // 5th column heading
        ];
    }








}
