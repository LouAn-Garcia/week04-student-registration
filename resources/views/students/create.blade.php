<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Student Registration</title>

<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="min-h-screen bg-slate-100">

```
<!-- Header -->
<header class="bg-blue-500 text-white shadow-lg">
    <div class="max-w-6xl mx-auto px-6 py-5">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold mt-1">
                    Student Registration System
                </h1>
            </div>

            <a
                href="{{ url('/students') }}"
                class="hidden sm:inline-block bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg text-sm font-medium transition"
            >
                Registered Students
            </a>

        </div>

    </div>
</header>


<!-- Main -->
<main class="max-w-5xl mx-auto px-4 sm:px-6 py-10">

    <!-- Page Heading -->
    <div class="mb-8">

        <p class="text-blue-700 font-semibold text-sm uppercase tracking-wide">
            Student Portal
        </p>

        <h2 class="text-3xl font-bold text-slate-800 mt-1">
            Student Registration
        </h2>

        <p class="text-slate-500 mt-2">
            Please provide the required information to register a student.
        </p>

    </div>


    <!-- General Validation Error -->
    @if ($errors->any())

        <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-5">

            <div class="flex gap-3">

                <div class="text-red-600 text-xl">
                    ⚠
                </div>

                <div>

                    <h3 class="font-semibold text-red-800">
                        Please correct the following errors:
                    </h3>

                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    <!-- Form Card -->
    <form
        action="{{ route('students.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden"
    >

        @csrf


        <!-- Personal Information -->
        <div class="p-6 sm:p-8 border-b border-slate-200">

            <div class="mb-6">

                <h3 class="text-xl font-bold text-slate-800">
                    Personal Information
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Enter the student's basic information.
                </p>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Student ID -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Student ID <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="student_id"
                        value="{{ old('student_id') }}"
                        placeholder="e.g. 2026-00001"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('student_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- First Name -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        First Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="Enter first name"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Middle Name -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Middle Name
                        <span class="text-slate-400 font-normal">(Optional)</span>
                    </label>

                    <input
                        type="text"
                        name="middle_name"
                        value="{{ old('middle_name') }}"
                        placeholder="Enter middle name"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('middle_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Last Name -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Last Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="Enter last name"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('last_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

            </div>

        </div>


        <!-- Contact Information -->
        <div class="p-6 sm:p-8 border-b border-slate-200">

            <div class="mb-6">

                <h3 class="text-xl font-bold text-slate-800">
                    Contact Information
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Provide the student's contact details.
                </p>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Email -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="student@example.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Mobile -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Mobile Number <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="mobile_number"
                        value="{{ old('mobile_number') }}"
                        placeholder="09XXXXXXXXX"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('mobile_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

            </div>

        </div>


        <!-- Academic Information -->
        <div class="p-6 sm:p-8 border-b border-slate-200">

            <div class="mb-6">

                <h3 class="text-xl font-bold text-slate-800">
                    Academic Information
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Enter the student's academic details.
                </p>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Date of Birth -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Date of Birth <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="date"
                        name="date_of_birth"
                        value="{{ old('date_of_birth') }}"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    @error('date_of_birth')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Gender -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Gender <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="gender"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                        <option value="">Select gender</option>

                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                    </select>

                    @error('gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Program -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Program <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="program"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                    <option value="">Select program</option>

                    <option value="BS Information Technology"
                        {{ old('program') == 'BS Information Technology' ? 'selected' : '' }}>
                        BS Information Technology
                    </option>

                    <option value="BS Computer Science"
                        {{ old('program') == 'BS Computer Science' ? 'selected' : '' }}>
                        BS Computer Science
                    </option>

                    <option value="BS Information Systems"
                        {{ old('program') == 'BS Information Systems' ? 'selected' : '' }}>
                        BS Information Systems
                    </option>

                    </select>

                    @error('program')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Year Level -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Year Level <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="year_level"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >

                        <option value="">Select year level</option>

                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>

                    </select>

                    @error('year_level')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

            </div>

        </div>


        <!-- Address & Profile -->
        <div class="p-6 sm:p-8">

            <div class="mb-6">

                <h3 class="text-xl font-bold text-slate-800">
                    Additional Information
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Complete the student's address and profile picture.
                </p>

            </div>


            <div class="space-y-6">

                <!-- Address -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Address <span class="text-red-500">*</span>
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Enter complete address"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition"
                    >{{ old('address') }}</textarea>

                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Profile Picture -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Profile Picture <span class="text-red-500">*</span>
                    </label>

                    <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 bg-slate-50">

                        <input
                            type="file"
                            name="profile_picture"
                            accept=".jpg,.jpeg,.png"
                            class="w-full text-sm text-slate-600"
                        >

                        <p class="text-xs text-slate-500 mt-2">
                            Accepted formats: JPG, JPEG, PNG. Maximum size: 2MB.
                        </p>

                    </div>

                    @error('profile_picture')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

            </div>

        </div>


        <!-- Submit -->
        <div class="bg-slate-50 px-6 sm:px-8 py-5 flex flex-col sm:flex-row gap-3 justify-end">

            <a
                href="{{ url('/students') }}"
                class="text-center px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold hover:bg-white transition"
            >
                View Registered Students
            </a>

            <button
                type="submit"
                class="px-8 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 transition"
            >
                Register Student
            </button>

        </div>

    </form>

</main>


<!-- Footer -->
<footer class="text-center text-sm text-slate-500 py-6">
    Student Registration System &copy; {{ date('Y') }}
</footer>
```

</body>
</html>
