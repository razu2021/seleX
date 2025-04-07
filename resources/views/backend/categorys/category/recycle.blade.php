@extends('layouts.adminmaster')
@section('admin_contents')

<div>
    <div class="card">
        <div class="card-body">
        
            <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Category PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Category List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('d M, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

        </div>
    </div>
</div>






@endsection 