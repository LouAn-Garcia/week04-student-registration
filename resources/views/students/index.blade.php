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

<body class="min-h-screen bg-slate-100">

```
<!-- Header -->
<header class="bg-blue-500 text-white shadow-lg">
    <div class="max-w-6xl mx-auto px-6 py-5">

        <div class="flex items-center justify-between">

            <h1 class="text-2xl font-bold">
                Student Registration System
            </h1>

            <a
                href="{{ url('/') }}"
                class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm font-medium transition"
            >
                Register Student
            </a>

        </div>

    </div>
</header>


<!-- Main -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 py-10">

    <!-- Heading -->
    <div class="mb-8">

        <p class="text-blue-500 font-semibold text-sm uppercase tracking-wide">
            Student Records
        </p>

        <h2 class="text-3xl font-bold text-slate-800 mt-1">
            Registered Students
        </h2>

        <p class="text-slate-500 mt-2">
            View all students registered in the system.
        </p>

    </div>


    <!-- Student Count -->
    <div class="mb-6">

        <div class="inline-flex items-center gap-2 bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-sm">

            <span class="text-sm text-slate-500">
                Total Registered Students:
            </span>

            <span class="font-bold text-blue-600">
                {{ $students->count() }}
            </span>

        </div>

    </div>


    <!-- Students -->
    @if ($students->count() > 0)

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Desktop Table -->
            <div class="hidden md:block overflow-x-auto">

                <table class="w-full">

                    <thead>
                        <tr class="bg-blue-50 border-b border-blue-100">

                            <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">
                                Student
                            </th>

                            <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">
                                Student ID
                            </th>

                            <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">
                                Email
                            </th>

                            <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">
                                Program
                            </th>

                            <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">
                                Year Level
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach ($students as $student)

                            <tr class="hover:bg-slate-50 transition">

                                <!-- Student -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <img
                                            src="{{ asset('storage/' . $student->profile_picture) }}"
                                            alt="Profile Picture"
                                            class="w-12 h-12 rounded-full object-cover border-2 border-blue-100"
                                        >

                                        <div>

                                            <p class="font-semibold text-slate-800">
                                                {{ $student->first_name }}
                                                {{ $student->middle_name }}
                                                {{ $student->last_name }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                {{ $student->gender }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Student ID -->
                                <td class="px-6 py-4">

                                    <span class="font-medium text-blue-600">
                                        {{ $student->student_id }}
                                    </span>

                                </td>


                                <!-- Email -->
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $student->email }}
                                </td>


                                <!-- Program -->
                                <td class="px-6 py-4">

                                    <span class="inline-block bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $student->program }}
                                    </span>

                                </td>


                                <!-- Year -->
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $student->year_level }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <!-- Mobile Cards -->
            <div class="md:hidden divide-y divide-slate-100">

                @foreach ($students as $student)

                    <div class="p-5">

                        <div class="flex items-center gap-4">

                            <img
                                src="{{ asset('storage/' . $student->profile_picture) }}"
                                alt="Profile Picture"
                                class="w-16 h-16 rounded-full object-cover border-2 border-blue-100"
                            >

                            <div>

                                <h3 class="font-bold text-slate-800">
                                    {{ $student->first_name }}
                                    {{ $student->middle_name }}
                                    {{ $student->last_name }}
                                </h3>

                                <p class="text-blue-600 text-sm font-semibold">
                                    {{ $student->student_id }}
                                </p>

                            </div>

                        </div>


                        <div class="mt-4 space-y-2 text-sm">

                            <p>
                                <span class="text-slate-400">Email:</span>
                                <span class="text-slate-700">
                                    {{ $student->email }}
                                </span>
                            </p>

                            <p>
                                <span class="text-slate-400">Program:</span>
                                <span class="text-slate-700">
                                    {{ $student->program }}
                                </span>
                            </p>

                            <p>
                                <span class="text-slate-400">Year:</span>
                                <span class="text-slate-700">
                                    {{ $student->year_level }}
                                </span>
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @else

        <!-- Empty State -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm text-center py-16 px-6">

            <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto text-2xl">
                👤
            </div>

            <h3 class="text-xl font-bold text-slate-800 mt-5">
                No Students Yet
            </h3>

            <p class="text-slate-500 mt-2">
                There are currently no registered students.
            </p>

            <a
                href="{{ url('/') }}"
                class="inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-xl transition"
            >
                Register First Student
            </a>

        </div>

    @endif

</main>


<!-- Footer -->
<footer class="text-center text-sm text-slate-500 py-6">
    Student Registration System &copy; {{ date('Y') }}
</footer>
```

</body>
</html>
