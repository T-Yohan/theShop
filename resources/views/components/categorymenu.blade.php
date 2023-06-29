
    <section class="relative mx-auto">
        <!-- navbar -->
        <nav class="flex justify-between text-white w-screen">
            <div class="py-6 flex w-full">
                <a class="text-3xl font-bold font-heading" href="#">
                    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                    The Shop
                </a>
                <!-- Nav Links -->
                <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">

                    @forelse ($categories as $itemCategory )
                    <li><a class="hover:text-blue-900 text-gray-900" href=" {{route('category',$itemCategory->id)}} ">{{$itemCategory->name}}</a></li>
                    @empty

                    @endforelse

                </ul>
                <!-- Header Icons -->
        </nav>

    </section>


