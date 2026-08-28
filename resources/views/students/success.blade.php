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

<body class="bg-gray-100 min-h-screen py-10">

```
<div class="max-w-3xl mx-auto px-4">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- Success Banner -->
        <div class="bg-green-600 text-white text-center p-6">
            <h1 class="text-2xl font-bold">
                Student Registered Successfully!
            </h1>

            <p class="mt-2">
                The student's information has been saved successfully.
            </p>
        </div>

        <!-- Profile -->
        <div class="p-8">

            <div class="flex flex-col items-center mb-8">

                <img
                    src="{{ asset('storage/' . $student->profile_picture) }}"
                    alt="Student Profile Picture"
                    class="w-40 h-40 rounded-full object-cover border-4 border-gray-200 shadow"
                >

                <h2 class="text-2xl font-bold text-gray-800 mt-4">
                    {{ $student->first_name }}
                    {{ $student->middle_name }}
                    {{ $student->last_name }}
                </h2>

                <p class="text-gray-500">
                    {{ $student->student_id }}
                </p>

            </div>

            <!-- Student Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium">
                        {{ $student->email }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Mobile Number</p>
                    <p class="font-medium">
                        {{ $student->mobile_number }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Date of Birth</p>
                    <p class="font-medium">
                        {{ $student->date_of_birth }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Gender</p>
                    <p class="font-medium">
                        {{ $student->gender }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Program</p>
                    <p class="font-medium">
                        {{ $student->program }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Year Level</p>
                    <p class="font-medium">
                        {{ $student->year_level }}
                    </p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500">Address</p>
                    <p class="font-medium">
                        {{ $student->address }}
                    </p>
                </div>

            </div>

            <!-- Register Another Student -->
            <div class="mt-8 text-center">

                <a
                    href="{{ url('/') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg"
                >
                    Register Another Student
                </a>

            </div>

        </div>

    </div>

</div>
```

</body>
</html>
