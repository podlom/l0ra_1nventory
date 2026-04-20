<div class="max-w-3xl mx-auto py-10">

    <div class="flex items-center space-x-4">
        <img src="{{ Vite::asset('resources/img/logo.png') }}"
             width="124"
             alt="Лого майстерні">

        <h1 class="text-3xl font-bold">
            База майна підрозділів 33 ОМБР РБПАК
        </h1>
    </div>

    <div class="space-y-6 mt-8">

        {{-- Блок Майно --}}
        <div class="p-6 border rounded-lg shadow-sm bg-white">
            <h2 class="text-xl font-semibold mb-3">Облік майна</h2>

            <a href="/ammunition" class="block text-blue-600 hover:underline mb-2">
                • База майна
            </a>

            <a href="/invoices" class="block text-blue-600 hover:underline mb-2">
                • Накладні вимоги
            </a>

            <a href="/units" class="block text-blue-600 hover:underline">
                • Одиниці виміру
            </a>
        </div>

        {{-- Блок Дрони --}}
        <div class="p-6 border rounded-lg shadow-sm bg-white">
            <h2 class="text-xl font-semibold mb-3">Облік дронів</h2>

            <a href="/drones" class="block text-blue-600 hover:underline">
                • Облік дронів та комплектів обладнання до них
            </a>
        </div>

    </div>
</div>
