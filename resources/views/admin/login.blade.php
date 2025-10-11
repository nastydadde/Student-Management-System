<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #ca2125;
            --primary-hover: #ff0000;
            --secondary: #777777;
            --light-bg: #fcfcfc;
        }
    </style>
</head>

<body class="bg-[#fcfcfc] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-500 w-full max-w-sm">
        <h2 class="text-2xl font-bold text-center text-black mb-6">Admin Login</h2>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-[#777777]">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 focus:border-[#ca2125] transition-colors">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-[#777777]">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 focus:border-[#ca2125] transition-colors">
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-[#777777]">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
                    Remember Me
                </label>
            </div>

            <div class="mb-4 text-sm text-[#777777] bg-[#fcfcfc] border border-[#ef6a57] p-3 rounded">
                <strong class="text-[#ca2125]">Note:</strong> If you are not sure about your credentials, kindly check your mail for credentials.
            </div>

            <button type="submit"
                class="w-full bg-[#ca2125] text-white font-semibold py-2 px-4 rounded-lg hover:bg-[#ff0000] transition-colors">
                Login
            </button>
        </form>
        <p class="text-gray-400 text-center mt-1.5 ">
            {{ date('Y') }} | Built by Team 818 |
            <a href="mailto:team.818x@gmail.com" class="text-red-500">Contact Us</a>
        </p>
        
    </div>

</body>

</html>