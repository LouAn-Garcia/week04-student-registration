<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Registration Successful</title>

<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="min-h-screen bg-slate-100">

```
<!-- Header -->
<header class="bg-blue-500 text-white shadow-lg">
    <div class="max-w-5xl mx-auto px-6 py-5">

        <div class="flex items-center justify-between">

            <h1 class="text-2xl font-bold">
                Student Registration System
            </h1>

            <a
                href="{{ url('/students') }}"
                class="hidden sm:inline-block bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm font-medium transition"
            >
                Registered Students
            </a>

        </div>

    </div>
</header>


<!-- Main -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 py-10">

    <!-- Success Banner -->
    @if (session('success'))

        <div class="mb-8 bg-green-50 border border-green-200 rounded-2xl p-5">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-xl">
                    ✓
                </div>

                <div>
                    <h2 class="font-bold text-green-800">
                        Registration Successful!
                    </h2>

                    <p class="text-sm text-green-700 mt-1">
                        {{ session('success') }}
                    </p>
                </div>

            </div>

        </div>

    @endif


    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Card Header -->
        <div class="bg-blue-50 px-6 sm:px-8 py-6 border-b border-blue-100">

            <h2 class="text-2xl font-bold text-slate-800">
                Student Profile
            </h2>

            <p class="text-slate-500 mt-1">
                Registered student information
            </p>

        </div>


        <!-- Profile -->
        <div class="p-6 sm:p-8">

            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8">

                <!-- Profile Picture -->
                <img
                    src="{{ asset('storage/' . $student->profile_picture) }}"
                    alt="Profile Picture"
                    class="w-32 h-32 rounded-2xl object-cover border-4 border-blue-100 shadow-sm"
                >

                <div class="text-center sm:text-left">

                    <h3 class="text-2xl font-bold text-slate-800">
                        {{ $student->first_name }}
                        {{ $student->middle_name }}
                        {{ $student->last_name }}
                    </h3>

                    <p class="text-blue-600 font-semibold mt-1">
                        {{ $student->student_id }}
                    </p>

                    <p class="text-slate-500 text-sm mt-2">
                        {{ $student->program }} · {{ $student->year_level }}
                    </p>

                </div>

            </div>


            <!-- Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Email -->
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Email Address
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->email }}
                    </p>
                </div>


                <!-- Mobile -->
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Mobile Number
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->mobile_number }}
                    </p>
                </div>


                <!-- Date of Birth -->
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Date of Birth
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->date_of_birth->format('F d, Y') }}
                    </p>
                </div>


                <!-- Gender -->
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Gender
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->gender }}
                    </p>
                </div>


                <!-- Program -->
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Program
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->program }}
                    </p>
                </div>


                <!-- Year Level -->
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Year Level
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->year_level }}
                    </p>
                </div>


                <!-- Address -->
                <div class="bg-slate-50 rounded-xl p-4 md:col-span-2">
                    <p class="text-xs font-semibold text-slate-400 uppercase">
                        Address
                    </p>

                    <p class="text-slate-800 font-medium mt-1">
                        {{ $student->address }}
                    </p>
                </div>

            </div>

        </div>


        <!-- Actions -->
        <div class="bg-slate-50 px-6 sm:px-8 py-5 flex flex-col sm:flex-row gap-3 justify-end">

            <a
                href="{{ url('/') }}"
                class="text-center px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold hover:bg-white transition"
            >
                Register Another Student
            </a>

            <a
                href="{{ url('/students') }}"
                class="text-center px-6 py-3 rounded-xl bg-blue-500 text-white font-semibold hover:bg-blue-600 transition"
            >
                View All Students
            </a>

        </div>

    </div>

</main>


<!-- Footer -->
<footer class="text-center text-sm text-slate-500 py-6">
    Student Registration System &copy; {{ date('Y') }}
</footer>
```

</body>
</html>
