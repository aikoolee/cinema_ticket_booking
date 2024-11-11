<footer class="bg-gray-100 dark:bg-gray-800 py-8 mt-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start">
            <div class="md:w-1/3">
                <h2 class="font-bold text-gray-800 dark:text-gray-100">Manage Ticket Bookings</h2>
                <p class="text-gray-500 dark:text-gray-300 mt-2">
                    Ensure a seamless ordering process for customers to deliver a wonderful experience.
                </p>
                <p class="mt-8 text-sm text-gray-500 dark:text-gray-400">
                    Your role is essential in ensuring customer satisfaction by offering quick assistance with their ticket bookings.
                </p>
            </div>

            <div class="hidden md:block md:w-2/3"></div>

            <div class="md:w-1/3 flex flex-col justify-end items-start mt-8 md:mt-0">
                <div>
                    <p class="font-semibold text-gray-700 dark:text-gray-100">Contact Our Head Office for Assistance</p>
                    <div class="mt-4 space-y-4">
                        <div class="relative flex items-center space-x-2">
                            <div class="absolute left-8 bg-white dark:bg-gray-700 w-full h-full rounded-md z-0"></div>
                            <div class="relative bg-orange-400 p-2 rounded-md text-white z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="relative text-gray-700 dark:text-gray-200 z-10">0807-1-563248</span>
                        </div>
                        <div class="relative flex items-center space-x-2">
                            <div class="absolute left-8 bg-white dark:bg-gray-700 w-full h-full rounded-md z-0"></div>
                            <div class="relative bg-orange-400 p-2 rounded-md text-white z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="relative text-gray-700 dark:text-gray-200 z-10">support@cinema.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center text-gray-500 dark:text-gray-400">
            <p>© <span id="currentYear"></span> Cinema. All rights reserved.</p>

            <script defer>
                document.getElementById("currentYear").textContent = new Date().getFullYear();
            </script>
        </div>
    </div>
</footer>
