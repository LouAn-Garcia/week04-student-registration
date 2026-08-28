<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>

```
<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="bg-gray-100 min-h-screen py-10">

```
<div class="max-w-4xl mx-auto px-4">

    <!-- Header -->
    <div class="bg-white rounded-t-2xl shadow-lg p-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800">
            Student Registration System
        </h1>

        <p class="text-gray-500 mt-2">
            College of Information Technology
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('students.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-b-2xl shadow-lg p-8">

        @csrf

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 rounded-lg p-4">
                <h3 class="font-bold mb-2">
                    Please fix the following errors:
                </h3>

                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Student Information -->
        <h2 class="text-xl font-bold text-gray-800 mb-5 border-b pb-3">
            Student Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Student ID -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Student ID *
                </label>

                <input
                    type="text"
                    name="student_id"
                    value="{{ old('student_id') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="e.g. 2026-00001"

                >
                @error('student_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
                    <!-- First Name -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    First Name *
                </label>

                <input
                    type="text"
                    name="first_name"
                    value="{{ old('first_name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Enter first name"
                >
            </div>

            <!-- Middle Name -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Middle Name
                </label>

                <input
                    type="text"
                    name="middle_name"
                    value="{{ old('middle_name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Enter middle name"
                >
            </div>

            <!-- Last Name -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Last Name *
                </label>

                <input
                    type="text"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Enter last name"
                >
            </div>

        </div>

        <!-- Contact Information -->
        <h2 class="text-xl font-bold text-gray-800 mt-10 mb-5 border-b pb-3">
            Contact Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Email -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Email Address *
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="example@email.com"
                >
            </div>

            <!-- Mobile -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Mobile Number *
                </label>

                <input
                    type="text"
                    name="mobile_number"
                    value="{{ old('mobile_number') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="09XXXXXXXXX"
                >
            </div>

            <!-- Date of Birth -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Date of Birth *
                </label>

                <input
                    type="date"
                    name="date_of_birth"
                    value="{{ old('date_of_birth') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <!-- Gender -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Gender *
                </label>

                <select
                    name="gender"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>
                </select>
            </div>

        </div>

        <!-- Academic Information -->
        <h2 class="text-xl font-bold text-gray-800 mt-10 mb-5 border-b pb-3">
            Academic Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Program -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Program *
                </label>

                <select
                    name="program"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                    <option value="">Select Program</option>
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
            </div>

            <!-- Year Level -->
            <div>
                <label class="block font-medium text-gray-700 mb-2">
                    Year Level *
                </label>

                <select
                    name="year_level"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                    <option value="">Select Year Level</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                </select>
            </div>

        </div>

        <!-- Address -->
        <div class="mt-5">
            <label class="block font-medium text-gray-700 mb-2">
                Address *
            </label>

            <textarea
                name="address"
                rows="3"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Enter complete address"
            >{{ old('address') }}</textarea>
        </div>

        <!-- Profile Picture -->
        <h2 class="text-xl font-bold text-gray-800 mt-10 mb-5 border-b pb-3">
            Profile Picture
        </h2>

        <div>
            <label class="block font-medium text-gray-700 mb-2">
                Upload Profile Picture *
            </label>

            <input
                type="file"
                name="profile_picture"
                accept=".jpg,.jpeg,.png"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white"
            >

            <p class="text-sm text-gray-500 mt-2">
                JPG, JPEG, or PNG only. Maximum file size: 2MB.
            </p>
        </div>

        <!-- Submit -->
        <div class="mt-10">
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition"
            >
                Register Student
            </button>
        </div>

    </form>

</div>
```

</body>
</html>
