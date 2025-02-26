<div class="flex">
    <div class="grid grid-cols-3 gap-2 mt-4 lg:space-x-4 lg:flex lg:mt-0" dimensions>
        <div class="px-3 py-2 transition-all duration-75 border rounded cursor-pointer hover:text-white hover:bg-green-500 hover:border-green-500" dimension="month">Mois</div>
        <div class="px-3 py-2 text-white transition-all duration-75 bg-green-500 border border-green-500 rounded cursor-pointer hover:text-white hover:bg-green-500 hover:border-green-500" dimension="date" active>Jours</div>
        <div class="px-3 py-2 text-white transition-all duration-75 bg-green-500 border border-green-500 rounded cursor-pointer hover:text-white hover:bg-green-500 hover:border-green-500" dimension="hour" active>Heures</div>
        <div class="px-3 py-2 transition-all duration-75 border rounded cursor-pointer hover:text-white hover:bg-green-500 hover:border-green-500" dimension="device">Appareils</div>
    </div>
    <div class="relative ml-auto" daterangepicker>
        <button class="flex items-center p-2 text-white whitespace-no-wrap transition-all bg-green-500 rounded hover:bg-green-400 focus:outline-none">
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-calendar-alt fa-w-14">
                <path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z" class=""></path>
            </svg>
            <div class="ml-2" daterangepicker-display></div>
        </button>
    </div>
</div>