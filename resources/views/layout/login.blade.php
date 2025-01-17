<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <section class="bg-[#4C8F8B] dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center justify-center px-6 pt-8">

                    <a href="#" class="flex items-center mb-6 text-2xl font-bold text-black dark:text-white">
                        {{-- <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo"> --}}
                        TA - TRPL
                    </a>
                </div>
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form id="login-form" class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                password?</a>
                        </div>
                        <div class="error-message" id="error-message"></div>
                        <button type="submit"
                            class="w-full text-white bg-[#4C8F8B] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    const errorMessageElement = document.getElementById('error-message');
    document.addEventListener("DOMContentLoaded", () => {
        const loginForm = document.getElementById("login-form");

        loginForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(loginForm);
            const data = {
                email: formData.get("email"),
                password: formData.get("password")
            };
            try {
                const response = await fetch('http://127.0.0.1:8001/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                if (response.ok) {
                    alert('Login successful!');
                    localStorage.setItem('token', result.token);
                    const userData = await getUserData(result.token);
                    if (userData.role === "Admin") {
                        window.location.href = "{{ route('akademik.dashboard') }}";
                    } else if (userData.role === "Dosen") {
                        window.location.href = "{{ route('dosen.dashboard') }}";
                    } else {
                        window.location.href = "{{ route('mahasiswa.dashboard') }}";
                    }
                } else {
                    alert(`Error: ${result.message}`);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        });
    });

    async function getUserData(token) {
        try {
            const response = await fetch('http://127.0.0.1:8001/api/user', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            if (response.ok) {
                const userData = await response.json();
                return userData;
            } else {
                errorMessageElement.textContent = 'Failed to fetch user data. Please try again.';
                return null;
            }
        } catch (error) {
            console.error('Error:', error);
            errorMessageElement.textContent = 'An error occurred. Please try again.';
            return null;
        }
    }
</script>

</html>
