<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Registered Students</title>

<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="bg-gray-100 min-h-screen py-10">

```
<div class="max-w-6xl mx-auto px-4">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="bg-blue-600 text-white p-6">
            <h1 class="text-2xl font-bold">
                Registered Students
            </h1>

            <p class="mt-1">
                List of students registered in the system
            </p>
        </div>

        <div class="p-6">

            @if ($students->count() > 0)

                <div class="overflow-x-auto">

                    <table class="w-full border-collapse">

                        <thead>
                            <tr class="bg-gray-100 text-left">

                                <th class="p-3 border">
                                    Profile
                                </th>

                                <th class="p-3 border">
                                    Student ID
                                </th>

                                <th class="p-3 border">
                                    Name
                                </th>

                                <th class="p-3 border">
                                    Email
                                </th>

                                <th class="p-3 border">
                                    Program
                                </th>

                                <th class="p-3 border">
                                    Year Level
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($students as $student)

                                <tr class="hover:bg-gray-50">

                                    <td class="p-3 border">

                                        <img
                                            src="{{ asset('storage/' . $student->profile_picture) }}"
                                            alt="Profile Picture"
                                            class="w-12 h-12 rounded-full object-cover"
                                        >

                                    </td>

                                    <td class="p-3 border">
                                        {{ $student->student_id }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $student->first_name }}
                                        {{ $student->middle_name }}
                                        {{ $student->last_name }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $student->email }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $student->program }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $student->year_level }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-center py-10">

                    <p class="text-gray-500">
                        No students have been registered yet.
                    </p>

                </div>

            @endif

            <div class="mt-6">

                <a
                    href="{{ url('/') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg"
                >
                    Register New Student
                </a>

            </div>

        </div>

    </div>

</div>
```

</body>
</html>
